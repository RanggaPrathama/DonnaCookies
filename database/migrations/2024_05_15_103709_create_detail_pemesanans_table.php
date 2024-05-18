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
        Schema::create('detail_pemesanans', function (Blueprint $table) {
            $table->id('idDetail_pemesanan');
            $table->unsignedBigInteger('id_pemesanan');
            $table->unsignedBigInteger('idDetail_cookies');
            $table->foreign('idDetail_cookies')->references('idDetail_cookies')->on('detail_cookies')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pemesanan')->references('id_pemesanan')->on('pemesanans')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('jumlah');
            $table->integer('harga_cookies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pemesanans');
    }
};
