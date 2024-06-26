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
        Schema::create('productp_pomotions', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('products');
            $table->foreignId('promotion_id')->constrained('promotions');
            $table->primary(['product_id', 'promotion_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productp_pomotions');
    }
};
