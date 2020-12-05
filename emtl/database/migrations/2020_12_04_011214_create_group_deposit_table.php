<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupDepositTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_deposit', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');    
            $table->integer('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('user_groups');           
            $table->integer('amount');
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
        Schema::dropIfExists('group_deposit');
    }
}
