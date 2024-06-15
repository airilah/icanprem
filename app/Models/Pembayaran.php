<?php

namespace App\Models;

use App\Models\Pemesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayarans';
    protected $guards = [];
    protected $fillable=['id',
    'nama_metode',
    'rek_tujuan',
    'an'
    ];


    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }
}
