<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDiscountTypeInPromotionsTable extends Migration
{
    public function up()
    {
        Schema::table('promotions', function (Blueprint $table) {
            $table->double('discount', 8, 2)->change();
        });
    }

    public function down()
    {
        Schema::table('promotions', function (Blueprint $table) {
            $table->decimal('discount', 8, 2)->change();
        });
    }
}
