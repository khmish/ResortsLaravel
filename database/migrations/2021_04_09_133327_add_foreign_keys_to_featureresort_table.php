<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToFeatureresortTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('featureresort', function (Blueprint $table) {
            $table->foreign('Feature_id')->references('id')->on('feature');
            $table->foreign('Resort_id')->references('id')->on('resort');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('featureresort', function (Blueprint $table) {
        });
    }
}
