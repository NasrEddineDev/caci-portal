<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    function __construct($attributes = array())
    {
        parent::__construct($attributes);
        $this->user_id = Auth::Id();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    static $logFillable = true;

    protected $fillable = [
        'value',
        'note',
        'description',
        'type',
        'user_id',
        'payment_id',
        'enterprise_id',
        'certificate_id',
    ];

    public function certificate()
    {
        return $this->belongsTo(Certificate::class);
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
