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
        Schema::create('catgori_sups', function (Blueprint $table) {
            $table->id();
            $table->string('category_name');
            $table->string('image');
            $table->foreignId('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catgori_sups');
    }
};
