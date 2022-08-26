<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('food', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->after('id')->nullable();

            $table->foreign('category_id')
                                    ->references('id')
                                    ->on('categories')
                                    ->onDelete('set null');


            $table->unsignedBigInteger('user_id')->after('category_id')->nullable();

            $table->foreign('user_id')
                                    ->references('id')
                                    ->on('users')
                                    ->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('food', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');

            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

        });
    }
}
