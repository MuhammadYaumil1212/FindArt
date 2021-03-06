<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'province_id',
        'city_id',
        'district_id',
        'sub_district_id',
        'photo_id',
        'username',
        'password',
        'contact_number',
        'address',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ArtFinder() : HasOne{
        return $this->hasOne(ArtFinder::class);
    }
    public function Art() : HasOne{
        return $this->hasOne(Art::class);
    }
    public function Province() :BelongsTo{
        return $this->belongsTo(Provincy::class);
    }
    public function City() :BelongsTo{
        return $this->belongsTo(City::class);
    }
    public function District() :BelongsTo{
        return $this->belongsTo(District::class);
    }

    public function SubDistrict() :BelongsTo{
        return $this->belongsTo(SubDistrict::class);
    }
}
