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

            $table->string('foto')->nullable();


            $table->unsignedBigInteger('reviewed_by')->nullable(); // Reviewer ID (nullable)
            $table->string('title'); // Report title
            $table->string('nama_mitra')->nullable(); // Partner (nullable)
            $table->string('lokasi')->nullable(); // Location (nullable)
            $table->decimal('realisasi', 15, 2)->nullable(); // Realization amount (nullable)

            $table->text('deskripsi')->nullable();


            $table->date('tgl_realisasi')->nullable(); // Realization date (nullable)
            $table->date('laporan_dikirim')->nullable(); // Report sent date (nullable)
            $table->enum('status', ['pending', 'approved', 'rejected', 'revisi'])->default('pending'); // Status
            $table->timestamps(); // Created at and updated at timestamps
            $table->text('suggestion')->nullable(); // Suggestions (nullable)


              // Foreign key untuk user_id
              $table->unsignedBigInteger('user_id')->nullable();
              $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Foreign key untuk mitra_id
            $table->unsignedBigInteger('mitra_id')->nullable();
            $table->foreign('mitra_id')->references('id')->on('mitras')->onDelete('set null');

            // Foreign key untuk sektor_id
            $table->unsignedBigInteger('sektor_id')->nullable();
            $table->foreign('sektor_id')->references('id')->on('sektors')->onDelete('set null');

              // Foreign key untuk project_id
              $table->unsignedBigInteger('project_id')->nullable(); 
              $table->foreign('project_id')->references('id')->on('projects')->onDelete('set null');





         // If you want to create a foreign key for reviewed_by
            // Uncomment if you have a users table
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
