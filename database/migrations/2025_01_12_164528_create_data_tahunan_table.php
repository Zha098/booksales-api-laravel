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
        Schema::create('data_tahunan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_daftar_data');
            $table->integer('id_skpd');
            $table->integer('tahun');
            $table->string('keterangan');
            $table->string('satuan');
            $table->integer('nilai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_tahunan');
    }
};
