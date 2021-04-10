<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAvailabletimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('availabletime', function (Blueprint $table) {
            $table->foreign('Resort_id', 'fk_AvailableTime_Resort1')->references('id')->on('resort')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('createdBy', 'fk_AvailableTime_User1')->references('id')->on('user')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('availabletime', function (Blueprint $table) {
            $table->dropForeign('fk_AvailableTime_Resort1');
            $table->dropForeign('fk_AvailableTime_User1');
        });
    }
}
