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
            $table->date('tgl_mulai');
            $table->date('tgl_akhir');
            $table->date('tgl_diterbitkai')->nullable();
            $table->enum('status', ['Draft', 'Terbit']);

            // Foreign keys
            $table->unsignedBigInteger('sektor_id');
            $table->foreign('sektor_id')->references('id')->on('sektors')->onDelete('cascade');

            // Uncomment if you have a relationship with reports
            // $table->unsignedBigInteger('report_id')->nullable();
            // $table->foreign('report_id')->references('id')->on('reports')->onDelete('set null');

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
