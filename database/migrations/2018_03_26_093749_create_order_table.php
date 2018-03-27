<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('user_id');
            $table->unsignedInteger('product_id');
			$table->unsignedInteger('order_state_id');
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('product_id')->references('id')->on('product');
			$table->foreign('order_state_id')->references('id')->on('order_state');
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
        Schema::dropIfExists('order');
    }
}
