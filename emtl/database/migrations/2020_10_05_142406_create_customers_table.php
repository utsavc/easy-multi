<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('customerid')->unique();
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->bigInteger('retailerid')->unsigned();
            $table->string('status')->default('active');
            $table->timestamps();
        });

        Schema::table('customers', function($table) {
            $table->foreign('retailerid')->references('id')->on('retailers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
