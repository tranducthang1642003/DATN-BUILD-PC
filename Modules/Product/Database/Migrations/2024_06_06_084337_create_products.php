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
            $table->id(); // Primary Key
            $table->string('name');
            $table->string('slug')->unique();
            $table->decimal('price', 8, 2);
            $table->integer('quantity');
            $table->text('long_description')->nullable();
            $table->string('short_description', 255)->nullable();
            $table->integer('view')->default(0);
            $table->string('product_code')->unique();
            $table->decimal('discount', 5, 2)->nullable();
            $table->string('color')->nullable();
            $table->boolean('sale')->default(false);
            $table->boolean('featured')->default(false);
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('id_category'); // Foreign Key
            $table->unsignedBigInteger('id_brand'); // Foreign Key
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('id_category')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('id_brand')->references('id')->on('brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};