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
        Schema::table('orders', function (Blueprint $table) {
            // Add columns here
            $table->string('order_code', 6)->nullable()->unique();
            $table->string('full_name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('address');
            $table->string('city');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Drop columns if needed
            $table->dropColumn('order_code');
            $table->dropColumn('full_name');
            $table->dropColumn('phone_number');
            $table->dropColumn('email');
            $table->dropColumn('address');
            $table->dropColumn('city');
        });
    }
};
