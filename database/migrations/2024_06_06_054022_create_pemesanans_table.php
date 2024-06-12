<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('paket_id')->constrained('pakets');
            $table->foreignId('keranjang_id')->nullable()->constrained('keranjangs');
            $table->foreignId('pembayaran_id')->constrained('pembayarans');
            $table->integer('jumlah_paket');
            $table->string('metode_asal');
            $table->string('rek_asal');
            $table->string('total_harga');
            $table->string('bukti_pembayaran');
            $table->string('status')->default('Proses');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
