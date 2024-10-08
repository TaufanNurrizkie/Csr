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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('lokasi');
            $table->integer('jumlah_mitra')->nullable();
            $table->date('tgl_mulai');
            $table->date('tgl_akhir');
            $table->date('tgl_diterbitkai')->nullable();
            $table->enum('status', ['Draft', 'Terbit']);
// Menggunakan enum untuk status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
