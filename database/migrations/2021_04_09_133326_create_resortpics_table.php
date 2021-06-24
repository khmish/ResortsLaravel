<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResortpicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resortpics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('media')->nullable();
            $table->unsignedBigInteger('Resort_id')->index('fk_ResortPics_Resort1_idx');
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
        Schema::dropIfExists('resortpics');
    }
}
