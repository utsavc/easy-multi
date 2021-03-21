<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealerComissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_comissions', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->integer('purchase_id')->unsigned();
            $table->foreign('purchase_id')->references('id')->on('customer_purchases');
            $table->integer('dealer_id')->unsigned();
            $table->foreign('dealer_id')->references('id')->on('dealers');   
            $table->integer('comission_amount');
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
        Schema::dropIfExists('dealer_comissions');
    }
}
