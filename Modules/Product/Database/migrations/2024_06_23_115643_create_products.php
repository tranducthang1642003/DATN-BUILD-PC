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
            $table->string('product_name');
            $table->string('slug');
            $table->string('product_code');
            $table->string('color');
            $table->integer('quantity');
            $table->boolean('sale')->default(0);
            $table->boolean('featured')->default(0);
            $table->boolean('status')->default(0);
            $table->integer('view')->default(0);
            $table->decimal('price', 10, 2);
            $table->integer('stock');
            $table->text('description')->nullable();
            $table->text('specifications')->nullable();
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('brand_id')->constrained('brands');
            $table->foreignId('product_images_id')->constrained('product_images')->nullable();
            $table->foreignId('promotion_id')->constrained('promotions')->nullable();
            $table->foreignId('reviews_id')->constrained('reviews')->nullable();
            $table->foreignId('wishlists_id')->constrained('wishlists')->nullable();
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
