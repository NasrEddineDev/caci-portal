<?php

namespace App\Models;

use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\CausesActivity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Laravel\Sanctum\HasApiTokens;
use Mail;

class User extends Authenticatable implements MustVerifyEmail, JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, LogsActivity, CausesActivity;

    // protected static function booted()
    // {
    //     static::creating(function ($user) {
    //         //
    //     Log::channel('users_activities')->info('Creating User', [
    //         'causedBy' => Auth::user()->id,
    //         'causedByUserEmail' => Auth::user()->email,
    //         'performedOn' => $user->id,
    //         'performedOnUserEmail' => $user->email,
    //         'subject' => Route::getCurrentRoute()->uri(),
    //         'action' => Route::getCurrentRoute()->getActionMethod(),
    //     ]);
    //     });

    //     static::created(function ($user) {
    //         //
    //     Log::channel('users_activities')->info('Created User', [
    //         'causedBy' => Auth::user()->id,
    //         'causedByUserEmail' => Auth::user()->email,
    //         'performedOn' => $user->id,
    //         'performedOnUserEmail' => $user->email,
    //         'subject' => Route::getCurrentRoute()->uri(),
    //         'action' => Route::getCurrentRoute()->getActionMethod(),
    //     ]);
    //     });
    // }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    static $logFillable = true;
    protected static $logName = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'profile_id',
        'organization_id',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function settings(): MorphToMany
    {
        return $this->morphToMany(Settings::class, 'entity_settings');
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }


    public function getRightsAttribute()
    {
        return ['can_view_articles'];
        // return App::currentLocale() == 'ar' ? "{$this->name_ar}" : "{$this->name_lt}";
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    // public function notifications()
    // {
    //     return Notification::all()->where('notifiable_id', 10);
    //     // return $this->belongsToMany(Notification::class, 'users_notifications', 'user_id', 'notification_id')
    //     // ->using(UserNotification::class)
    //     // ->withTimestamps();
    // }

    public function messages()
    {
        return $this->belongsToMany(Message::class, 'users_messages', 'user_id', 'message_id')
            ->using(UserMessage::class)
            ->withTimestamps();
    }

    public function statuses()
    {
        return $this->hasMany(Status::class);
    }

    // public function conversations()
    // {
    //     return $this->belongsToMany(Conversation::class, 'participants', 'user_id', 'conversation_id')
    //     ->withPivot('title', 'type')->using(Participant::class)
    //     ->withTimestamps();
    // }

    // public function chatMessages()
    // {
    //     return $this->hasMany(ChatMessage::class);
    // }

    public function getActivationCode()
    {
        return $generatedKey = random_int(100000, 999999);
    }

    public function saveActivationCode($activationCode)
    {
        session()->put('activation_code_' . $this->id, $activationCode);
        session()->put('activation_time_' . $this->id, date('i')*60+date('s'));
    }

    public function sendEmailActivationCode($activationCode)
    {
        $to_name = $this->username;
        $to_email = $this->email;
        // Mail::send('emails.email-activation', $user, function($message) use ($user) {
        //     $message->to($user->email);
        //     $message->subject('Site - Activation Code');
        // });

        $data = array(
            'name' => $to_name,
            'activation_code' => $activationCode,
            'body' => __('To verify your email address use the next verification code:')
        );
        Mail::send(
            'emails.email-activation',
            $data,
            function ($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)->subject(__('Email address verification'));
                $message->from('certification@caci.dz', __('Authentication service for certificates of origin'));
            }
        );
    }

    public function checkActivationCode($activationCode, $otpExpiry)
    {
        if (session()->has('activation_code_' . $this->id)) {
            return (session()->get('activation_code_' . $this->id) == $activationCode) &&
                   (session()->get('activation_time_' . $this->id) + $otpExpiry*60 >= date('i')*60+date('s'));
        }
    }

    public function removeActivationCode()
    {
        session()->forget('activation_code_' . $this->id);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }
}
