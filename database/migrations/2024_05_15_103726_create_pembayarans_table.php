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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->unsignedBigInteger('id_pemesanan');
            $table->unsignedBigInteger('id_payment');
            $table->foreign('id_payment')->references('id_payment')->on('payments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pemesanan')->references('id_pemesanan')->on('pemesanans')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('status')->default(1);
            $table->string('buktiBayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
