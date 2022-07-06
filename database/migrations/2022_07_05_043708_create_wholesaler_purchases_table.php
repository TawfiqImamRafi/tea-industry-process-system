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
            $table->unsignedBigInteger('wholesaler_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('category_id');
            $table->integer('amount');
            $table->integer('price');
            $table->integer('total');
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('wholesaler_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('tea_categories')->onDelete('cascade');
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
