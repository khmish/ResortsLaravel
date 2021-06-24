<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvailabletimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('availabletime', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('availableDate')->nullable();
            $table->unsignedBigInteger('createdBy');
            $table->time('startTime')->nullable();
            $table->time('endTime')->nullable();
            $table->unsignedBigInteger('Resort_id');
            $table->integer('cost')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('availabletime');
    }
}
