<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    protected static $logName = 'notification';
    static $logFillable = true;
    protected $fillable = [
        'type',
        'notifiable',
        'data',
    ];

    // public function users()
    // {
    //     return $this->belongsToMany(User::class, 'users_notifications', 'user_id', 'notification_id')
    //     ->using(UserNotification::class)
    //     ->withTimestamps();
    // }
}
