<?php

namespace App\Models;

use App\Models\Paket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produks';
    protected $guards = [];
    protected $fillable=['id','nama_produk','deskripsi'];

    public function paket()
    {
        return $this->hasMany(Paket::class);
    }
}
