<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name_en',
        'name_ar',
        'name_fr'
    ];

    public function getNameAttribute()
    {
        return App::currentLocale() == 'ar' ? "{$this->name_ar}" : (App::currentLocale() == 'en' ? "{$this->name_en}" : "{$this->name_fr}");
    }

    public function organizations()
    {
        return $this->belongsToMany(Enterprise::class, 'organizations_activities')
        // return $this->belongsToMany(Enterprise::class, 'enterprises_activities', 'enterprise_id', 'activity_id')
        // ->using(EnterpriseActivity::class)
        ->withTimestamps();
    }


    // public function statuses(): MorphToMany
    // {
    //     return $this->morphToMany(Status::class, 'statuses_associations');
    // }

    // public function participents(): MorphToMany
    // {
    //     return $this->morphToMany(Participent::class, 'participents_associations');
    // }
}
