<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    protected static $logName = 'city';
    static $logFillable = true;
    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function getNameAttribute()
    {
        return (App::currentLocale() == 'ar' && !empty($this->name_ar)) ?
               "{$this->name_ar}" : (App::currentLocale() == 'en' || App::currentLocale() == 'ar' ? "{$this->name_en}" : "{$this->name_fr}");
    }
    public function enterprises()
    {
        return $this->hasMany(Enterprise::class);
    }
}
