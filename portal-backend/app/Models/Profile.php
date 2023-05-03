<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Profile extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    protected static $logName = 'profile';
    static $logFillable = true;

    protected $fillable = [
        'firstname',
        'lastname',
        'birthday',
        'gender',
        'position',
        'address',
        'mobile',
        'signature',
        'signatory_person_stamp_ar',
        'signatory_person_stamp_en',
        'signatory_person_stamp_fr',
        'company_stamp',
        'agce_user_id',
        'city_id',
        'picture',
        'language',
        'theme',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
