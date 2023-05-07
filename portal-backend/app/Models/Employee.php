<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Employee extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    protected static $logName = 'employee';
    static $logFillable = true;

    protected $fillable = [
        'firstname_ar',
        'firstname_lt',
        'lastname_ar',
        'lastname_lt',
        'position',
        'department',
        'subdepartment',
        'office',
        'title',
        'address',
        'mobile',
        'email',
        'tel',
        'address_ar',
        'address_lt',
        'birthday',
        'gender',
        'city_id',
        'department_id',
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
