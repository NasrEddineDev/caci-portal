<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manager extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    protected static $logName = 'manager';
    static $logFillable = true;
    protected $dates = ['birthday'];

    protected $fillable = [
        'position',
        'title',
        'firstname_ar',
        'firstname_lt',
        'lastname_ar',
        'lastname_lt',
        'email',
        'mobile',
        'tel',
    ];

    public function getFirstnameAttribute()
    {
        return App::currentLocale() == 'ar' ? "{$this->firstname_ar}" : "{$this->firstname_lt}";
    }

    public function getLastnameAttribute()
    {
        return App::currentLocale() == 'ar' ? "{$this->lastname_ar}" : "{$this->lastname_lt}";
    }

    public function getNameAttribute()
    {
        return  "{$this->firstname} {$this->lastname}";
    }

    public function organization()
    {
        return $this->hasOne(Organization::class);
    }
}
