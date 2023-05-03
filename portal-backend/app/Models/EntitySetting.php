<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntitySetting extends MorphPivot
{
    // use HasFactory;
    use SoftDeletes, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    protected static $logName = 'entity_settings';
    static $logFillable = true;
    public $incrementing = true;
    protected $fillable = [
        'value',
        'setting_id',
        'entity_id',
        'entity_type'
    ];
}
