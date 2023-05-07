<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Setting extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected static $logName = 'setting';
    static $logFillable = true;
    protected $fillable = [
        'name',
        'value',
        'description',
    ];

    public function users(): MorphToMany
    {
        return $this->morphedByMany(User::class, 'entity_settings');
    }

    public function organization(): MorphToMany
    {
        return $this->morphedByMany(Organization::class, 'entity_settings');
    }
}
