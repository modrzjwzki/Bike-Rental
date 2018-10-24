<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentedBikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rented_bikes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('whoRented');
            $table->integer('whatBike');
            $table->date('whenRented');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rented_bikes');
    }
}
