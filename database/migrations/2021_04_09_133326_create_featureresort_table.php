<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeatureresortTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('featureresort', function (Blueprint $table) {
            $table->integer('number')->nullable();
            $table->string('Feature_id')->index('fk_FeatureResort_Feature_idx');
            $table->string('Resort_id')->index('fk_FeatureResort_Resort1_idx');
            $table->text('description')->nullable();
            $table->longText('media')->nullable();
            $table->primary(['Feature_id', 'Resort_id']);
            $table->timestamps();
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
        Schema::dropIfExists('featureresort');
    }
}
