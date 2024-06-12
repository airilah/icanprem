<?php

namespace App\Models;

use App\Models\Produk;
use App\Models\Pemesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'pakets';
    protected $guards = [];
    protected $fillable=['id','produk_id','nama_paket','catatan','stok','harga'];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }
    public function produk() {
        return $this->belongsTo(Produk::class);
    }
}
