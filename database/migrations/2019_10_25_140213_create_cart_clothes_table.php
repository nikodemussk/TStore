<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartClothesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_clothes', function (Blueprint $table) {
            // $table->bigIncrements('id');
            // $table->timestamps();
            $table->unsignedBigInteger('cart_id')->unsigned()->index();
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');

            $table->unsignedBigInteger('clothes_id')->unsigned()->index();
            $table->foreign('clothes_id')->references('id')->on('clothes')->onDelete('cascade');

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
        Schema::dropIfExists('cart_clothes');
    }
}
