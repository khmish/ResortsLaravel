<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('review', function (Blueprint $table) {
            $table->foreign('Resort_id', 'fk_Review_Resort1')->references('id')->on('resort')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('writtenBy', 'fk_Review_User1')->references('id')->on('user')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('review', function (Blueprint $table) {
            $table->dropForeign('fk_Review_Resort1');
            $table->dropForeign('fk_Review_User1');
        });
    }
}
