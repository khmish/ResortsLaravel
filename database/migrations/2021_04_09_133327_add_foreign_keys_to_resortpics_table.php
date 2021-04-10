<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToResortpicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resortpics', function (Blueprint $table) {
            $table->foreign('Resort_id', 'fk_ResortPics_Resort1')->references('id')->on('resort')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resortpics', function (Blueprint $table) {
            $table->dropForeign('fk_ResortPics_Resort1');
        });
    }
}
