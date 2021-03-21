<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_purchases', function (Blueprint $table) {
            $table->bigIncrements('id');      
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('dealers');
            $table->integer('retailer_id')->unsigned();
            $table->foreign('retailer_id')->references('id')->on('retailers');   
            $table->integer('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('user_groups');         
            $table->integer('qty');
            $table->integer('group_amount');
            $table->integer('customer_amount');
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
        Schema::dropIfExists('customer_purchases');
    }
}
