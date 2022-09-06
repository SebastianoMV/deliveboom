<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodOrderTable extends Migration
{
    public function up()
    {
        Schema::create('food_order', function (Blueprint $table) {

            $table->unsignedBigInteger('food_id');
            $table->foreign('food_id')
                ->references('id')
                ->on('food')
                ->onDelete('cascade');

            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');

            $table->unsignedSmallInteger('quantity')->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('food_order');
    }
}