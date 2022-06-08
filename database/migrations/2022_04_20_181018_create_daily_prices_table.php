<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_prices', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->unsignedBigInteger('category_id');
            $table->date('date');
            $table->integer('tea_price');
            $table->integer('amount');
            $table->boolean('pickup')->default(false);
            $table->integer('purchase')->default(1);
            $table->timestamps();
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
        Schema::dropIfExists('daily_prices');
    }
}
