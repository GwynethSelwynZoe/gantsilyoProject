<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//C:\ComProgProject\gantsilyoSYSTEM\laravelProject\laravel\database\migrations\2024_03_29_094647_add_order_list_id_and_product_id_to_order_items_table.php

class AddOrderListIdAndProductIdToOrderItemsTable extends Migration
{
    public function up()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->unsignedBigInteger('order_list_id');
            $table->foreign('order_list_id')->references('id')->on('order_lists')->onDelete('cascade');

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign(['order_list_id']);
            $table->dropColumn('order_list_id');

            $table->dropForeign(['product_id']);
            $table->dropColumn('product_id');
        });
    }
}
