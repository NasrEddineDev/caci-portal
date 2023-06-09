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
        'entity_id',
        'entity_type'
    ];


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
