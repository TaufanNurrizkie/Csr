<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->unsignedBigInteger('reviewed_by')->nullable(); // Reviewer ID (nullable)
            $table->string('title'); // Report title
            $table->string('mitra')->nullable(); // Partner (nullable)
            $table->string('lokasi')->nullable(); // Location (nullable)
            $table->decimal('realisasi', 15, 2)->nullable(); // Realization amount (nullable)
            $table->date('tgl_realisasi')->nullable(); // Realization date (nullable)
            $table->date('laporan_dikirim')->nullable(); // Report sent date (nullable)
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Status
            $table->timestamps(); // Created at and updated at timestamps
            $table->text('suggestion')->nullable(); // Suggestions (nullable)

            // If you want to create a foreign key for reviewed_by
            // $table->foreign('reviewed_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports'); // Drop the reports table
    }
}
