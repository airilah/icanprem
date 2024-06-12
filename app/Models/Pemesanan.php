<?php

namespace App\Models;

use App\Models\User;
use App\Models\Paket;
use App\Models\Keranjang;
use App\Models\Pembayaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'paket_id',
        'pembayaran_id',
        'total_harga',
        'bukti_pembarayan'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function paket() {
        return $this->belongsTo(Paket::class);
    }
    public function keranjang() {
        return $this->belongsTo(Keranjang::class);
    }
    public function pembayaran() {
        return $this->belongsTo(Pembayaran::class);
    }
}
