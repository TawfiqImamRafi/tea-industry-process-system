<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWholesalerPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wholesaler_purchases', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('tea_category');
            $table->integer('amount');
            $table->integer('price');
            $table->integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wholesaler_purchases');
    }
}
