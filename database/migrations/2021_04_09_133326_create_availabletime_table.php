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
            $table->string('id')->primary();
            $table->dateTime('availableDate')->nullable();
            $table->string('createdBy')->index('fk_AvailableTime_User1_idx');
            $table->integer('startTime')->nullable();
            $table->integer('endTime')->nullable();
            $table->string('Resort_id')->index('fk_AvailableTime_Resort1_idx');
            $table->integer('cost')->nullable();
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
