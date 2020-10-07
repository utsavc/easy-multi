<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealerCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_commissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('productname');
            $table->string('quantity');
            $table->string('commission');
            $table->bigInteger('dealerid')->unsigned();
            $table->timestamps();
        });
        
        Schema::table('dealer_commissions', function($table) {
            $table->foreign('dealerid')->references('id')->on('dealers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dealer_commissions');
    }
}
