<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participent extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    protected static $logName = 'participent';
    static $logFillable = true;
    protected $dates = ['birthday'];

    protected $fillable = [
        'name_ar',
        'name_lt',
        'type',
        'legal_form',
        'address_ar',
        'address_lt',
        'email',
        'mobile',
        'website',
        'tel',
        'fax',
        'city_id',
        'user_id',
    ];

    public function getNameAttribute()
    {
        return App::currentLocale() == 'ar' ? "{$this->name_ar}" : "{$this->name_lt}";
    }

    public function getAddressAttribute()
    {
        return App::currentLocale() == 'ar' ? "{$this->address_ar}" : "{$this->address_lt}";
    }

    public function user()
    {
        return $this->belongsTo(Organization::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function events()
    {
        return $this->morphedByMany(Event::class, 'statuses_associations');
    }

    public function activities()
    {
        return $this->morphedByMany(Activity::class, 'statuses_associations');
    }

    public function trainings()
    {
        return $this->morphedByMany(Training::class, 'statuses_associations');
    }

}
