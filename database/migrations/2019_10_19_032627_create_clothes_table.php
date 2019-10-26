<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClothesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clothes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->string('image');
            $table->string('description');
            $table->bigInteger('price');
            $table->bigInteger('stock');
            $table->unsignedBigInteger('store_id');

            // $table->foreign('store_id')->references('id')->on('stores');
            $table->index('store_id')->onDelete('cascade');
            $table->index('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clothes');
    }
}
