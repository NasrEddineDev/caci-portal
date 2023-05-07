<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    protected static $logName = 'department';
    static $logFillable = true;
    protected $fillable = [
        'name_ar',
        'name_fr',
        'name_en',
        'legal_form',
        'type',
        'status',
        'email',
        'mobile',
        'tel',
        'website',
        'fax',
        'organization_id',
    ];

    public function getNameAttribute()
    {
        return App::currentLocale() == 'ar' ? "{$this->name_ar}" : (App::currentLocale() == 'en' ? "{$this->name_en}" : "{$this->name_fr}");
    }

    public function getAddressAttribute()
    {
        return App::currentLocale() == 'ar' ? "{$this->address_ar}" : (App::currentLocale() == 'en' ? "{$this->address_en}" : "{$this->address_fr}");
    }

    public function name($certificateName)
    {
        return $certificateName == 'form-a-en' ? "{$this->name_en}" : ($certificateName == 'formule-a-fr' ? "{$this->name_fr}" : "{$this->name_ar}");
    }

    public function address($certificateName)
    {
        return $certificateName == 'form-a-en' ? "{$this->address_en}" : ($certificateName == 'formule-a-fr' ? "{$this->address_fr}" : "{$this->address_ar}");
    }

    public function user()
    {
        $firstUser = User::where('enterprise_id', $this->id)->orderBy('created_at','DESC')->first();
        return $firstUser ? $firstUser : null;
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

}
