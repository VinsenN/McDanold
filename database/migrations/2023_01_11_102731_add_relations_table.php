<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('order_details', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('menu_id')->references('id')->on('menus');
        });
        Schema::table('transaction_details', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('menu_id')->references('id')->on('menus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->dropForeign('category_id');
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('user_id');
        });
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropForeign('order_id');
            $table->dropForeign('menu_id');
        });
        Schema::table('transaction_details', function (Blueprint $table) {
            $table->dropForeign('order_id');
            $table->dropForeign('menu_id');
        });
    }
}
