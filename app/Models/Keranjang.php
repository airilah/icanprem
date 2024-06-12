<?php

namespace App\Models;

use App\Models\User;
use App\Models\Paket;
use App\Models\Pemesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keranjang extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'paket_id',
        'jumlah_paket',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function paket() {
        return $this->belongsTo(Paket::class);
    }
    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }
}
