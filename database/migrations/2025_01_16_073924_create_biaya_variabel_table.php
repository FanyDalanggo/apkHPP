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
        Schema::create('biaya_variabel', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_biaya');
            $table->integer('jumlah');
            $table->decimal('harga', 15, 2);
            $table->string('satuan');
            $table->string('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biaya_variabel');
    }
};
