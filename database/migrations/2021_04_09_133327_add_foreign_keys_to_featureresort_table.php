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
            $table->foreign('Feature_id', 'fk_FeatureResort_Feature')->references('id')->on('feature')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('Resort_id', 'fk_FeatureResort_Resort1')->references('id')->on('resort')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
            $table->dropForeign('fk_FeatureResort_Feature');
            $table->dropForeign('fk_FeatureResort_Resort1');
        });
    }
}
