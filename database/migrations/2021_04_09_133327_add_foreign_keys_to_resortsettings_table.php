<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToResortsettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resortsettings', function (Blueprint $table) {
            $table->foreign('Resort_id', 'fk_ResortSettings_Resort1')->references('id')->on('resort')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resortsettings', function (Blueprint $table) {
            $table->dropForeign('fk_ResortSettings_Resort1');
        });
    }
}
