<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductIdAndCustomerIdToCartsTable extends Migration
{
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            // Add the product_id column
            $table->unsignedBigInteger('product_id');
            
            // Define foreign key constraint
            $table->foreign('product_id')
                  ->references('id')
                  ->on('products')
                  ->onDelete('cascade'); // This line ensures cascading delete if the referenced product is deleted
            
            // Add the customer_id column
            $table->unsignedBigInteger('customer_id');
            
            // Define foreign key constraint
            $table->foreign('customer_id')
                  ->references('id')
                  ->on('customers')
                  ->onDelete('cascade'); // This line ensures cascading delete if the referenced customer is deleted
        });
    }
    
    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            // Drop foreign key constraints and columns
            $table->dropForeign(['product_id']);
            $table->dropColumn('product_id');
    
            $table->dropForeign(['customer_id']);
            $table->dropColumn('customer_id');
        });
    }
}
