<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up()
 {
     Schema::create('conductores', function (Blueprint $table) {
         $table->id();
         $table->string('nia')->unique();
         $table->string('dni')->unique();
         $table->string('name');
         $table->string('phone');
         $table->string('location');
         $table->string('email')->unique();
         $table->timestamps();
     });
 }

/**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conductores');
    }
};
