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
        Schema::create('kapasitas_produksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produks_id')->nullable();
            $table->string('kapasitas_perhari');
            $table->string('kapasitas_perbulan');
            $table->string('jumlah_hari_kerja');
            $table->timestamps();

            $table->foreign('produks_id')->references('id')->on('produks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kapasitas_produksi');
    }
};
