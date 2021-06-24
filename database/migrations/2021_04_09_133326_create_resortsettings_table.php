<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResortsettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resortsettings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cost')->nullable();
            $table->integer('costWeekend')->nullable();
            $table->integer('startTime')->nullable();
            $table->integer('endTime')->nullable();
            $table->integer('defaultRentHours')->nullable();
            $table->unsignedBigInteger('Resort_id')->index('fk_ResortSettings_Resort1_idx');
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
        Schema::dropIfExists('resortsettings');
    }
}
