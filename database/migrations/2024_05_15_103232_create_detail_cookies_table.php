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
        Schema::create('detail_cookies', function (Blueprint $table) {
            $table->id('idDetail_cookies');
            $table->unsignedBigInteger('id_cookies');
            $table->unsignedBigInteger('id_berat');
            $table->foreign('id_cookies')->references('id_cookies')->on('cookies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_berat')->references('id_berat')->on('berats')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('harga_cookies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_cookies');
    }
};
