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
    Schema::create('activities', function (Blueprint $table) {
    $table->id();
    $table->string('photo')->nullable();
    $table->string('title');
    $table->text('description');
    $table->date('published_date')->nullable();
    $table->enum('status', ['Terbit', 'Draf']);
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
