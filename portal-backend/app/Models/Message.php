<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    protected static $logName = 'message';
    static $logFillable = true;

    protected $fillable = [
        'from',
        'to',
        'subject',
        'body',
        'type',
        'status',
        'read_at',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_messages', 'user_id', 'message_id')
        ->using(UserMessage::class)
        ->withTimestamps();
    }
}
