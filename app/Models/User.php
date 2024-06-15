<?php

namespace App\Models;

use App\Models\Pesan;
use App\Models\Keranjang;
use App\Models\Pemesanan;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }
    public function keranjang()
    {
        return $this->hasMany(Keranjang::class);
    }
    public function pesan()
    {
        return $this->hasMany(Pesan::class);
    }

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
        'password' => 'hashed',
    ];
}
