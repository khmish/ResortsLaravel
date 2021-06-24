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
            $table->unsignedBigInteger('Feature_id')->index('fk_FeatureResort_Feature_idx');
            $table->unsignedBigInteger('Resort_id')->index('fk_FeatureResort_Resort1_idx');
            $table->text('description')->nullable();
            $table->longText('media')->nullable();
            $table->primary(['Feature_id', 'Resort_id']);
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
        Schema::dropIfExists('featureresort');
    }
}
