<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;

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
            $table->string('id')->primary()->default(new Expression("uuid_generate_v4()"));
            $table->dateTime('availableDate')->nullable();
            $table->string('createdBy')->index('fk_AvailableTime_User1_idx');
            $table->integer('startTime')->nullable();
            $table->integer('endTime')->nullable();
            $table->string('Resort_id')->index('fk_AvailableTime_Resort1_idx');
            $table->integer('cost')->nullable();
            $table->softDeletes();
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
