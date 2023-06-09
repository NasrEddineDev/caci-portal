<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    protected static $logName = 'organization';
    static $logFillable = true;
    protected $fillable = [
        'name_ar',
        'name_fr',
        'name_en',
        'legal_form',
        'type',
        'status',
        'address_ar',
        'address_fr',
        'address_en',
        'email',
        'mobile',
        'tel',
        'website',
        'fax',
        'balance',
        'manager_id',
        'city_id',
    ];

    public function getNameAttribute()
    {
        return App::currentLocale() == 'ar' ? "{$this->name_ar}" : (App::currentLocale() == 'en' ? "{$this->name_en}" : "{$this->name_fr}");
    }

    public function getAddressAttribute()
    {
        return App::currentLocale() == 'ar' ? "{$this->address_ar}" : (App::currentLocale() == 'en' ? "{$this->address_en}" : "{$this->address_fr}");
    }

    public function name($certificateName)
    {
        return $certificateName == 'form-a-en' ? "{$this->name_en}" : ($certificateName == 'formule-a-fr' ? "{$this->name_fr}" : "{$this->name_ar}");
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function trainings()
    {
        return $this->hasMany(Training::class);
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'enterprises_activities')
        // return $this->belongsToMany(Activity::class, 'enterprises_activities', 'enterprise_id', 'activity_id')
        // ->using(EnterpriseActivity::class)
        ->withTimestamps();
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function getStatusAttribute()
    {
        //last status
        $lastStatus = Status::where('enterprise_id', $this->id)->orderBy('created_at','DESC')->first();
        return $lastStatus ? $lastStatus->value : "Draft";
    }
    public function statuses()
    {
        return $this->hasMany(Status::class);
    }
}
