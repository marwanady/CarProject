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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->integer('luggage');
            $table->integer('doors');
            $table->integer('passengers');
            $table->decimal('price', 8, 2);
            $table->enum('active', ['yes', 'no'])->default('no');
            $table->binary('image');
            $table->foreignId('category_id')->constrained(table: 'categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
