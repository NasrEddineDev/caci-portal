<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Training extends MorphPivot
{
    // use HasFactory;
    use SoftDeletes, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    protected static $logName = 'training';
    static $logFillable = true;
    public $incrementing = true;
    protected $fillable = [
        'name_lt',
        'name_ar',
        'description',
        'type',
        'total_costs',
        'total_profits',
        'teacher_name',
        'session',
        'started_at',
        'ended_at',
        'user_id',
        'city_id',
        'organization_id'
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function statuses(): MorphToMany
    {
        return $this->morphToMany(Status::class, 'statuses_associations');
    }

    public function participents(): MorphToMany
    {
        return $this->morphToMany(Participent::class, 'participents_associations');
    }
}
