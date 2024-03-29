<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//C:\ComProgProject\gantsilyoSYSTEM\laravelProject\laravel\database\migrations\2024_03_29_095121_add_customer_id_and_status_id_to_order_lists_item_table.php
class AddCustomerIdAndStatusIdToOrderListsItemTable extends Migration
{
    public function up()
    {
        Schema::table('order_lists_item', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('order_lists_item', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
            $table->dropColumn('customer_id');

            $table->dropForeign(['status_id']);
            $table->dropColumn('status_id');
        });
    }
}
