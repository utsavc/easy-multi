<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetailersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retailers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('retailerid')->unique();
            $table->string('address');
            $table->string('phone');
            $table->string('email');
<<<<<<< Updated upstream
            $table->string('dealer_id');
            $table->foreign('dealer_id')->references('id')->on('dealers')->onDelete('cascade');
            $table->string('status')->default('active');
            $table->timestamps();
        });
=======
            $table->bigInteger('dealer_id')->unsigned();
            $table->string('status')->default('active');
            $table->timestamps();
        });

        Schema::table('retailers', function($table) {
            $table->foreign('dealer_id')->references('id')->on('dealers')->onDelete('cascade');
        });
>>>>>>> Stashed changes
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retailers');
    }
}
