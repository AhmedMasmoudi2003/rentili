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
        Schema::create('appartments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('appartment_name');
            $table->string('location');
            $table->integer('price');
            $table->string('client_id');
            $table->string('client_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appartments');
    }
};
