<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitras', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();
            $table->string('nama');
            $table->string('nama_pt');
            $table->string('email')->nullable();
            $table->string('no_telp')->nullable();
            $table->text('alamat')->nullable();
            $table->text('deskripsi')->nullable();
            $table->date('tgl_terdaftar')->nullable();
            $table->enum('status', ['Aktif', 'Non-Aktif']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mitras');
    }
};
