<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;
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
            $table->string('id')->primary()->default(new Expression("uuid_generate_v4()"));
            $table->string('media')->nullable();
            $table->string('Resort_id')->index('fk_ResortPics_Resort1_idx');
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
        Schema::dropIfExists('resortpics');
    }
}
