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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->decimal('price', 15, 2);
            $table->bigInteger('quatity')->nullable();
            $table->string('image')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('sub_category_id')->constrained('sub_categories');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
