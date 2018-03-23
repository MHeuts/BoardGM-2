<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCatagoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_catagory', function (Blueprint $table) {
            $table->integer('product_id');
            $table->integer('catagory_id');
            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('catagory_id')->references('id')->on('catagory');
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
        Schema::dropIfExists('product_catagory');
    }
}
