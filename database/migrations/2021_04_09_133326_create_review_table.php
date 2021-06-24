<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('totalStars')->nullable();
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('writtenBy')->index('fk_Review_User1_idx');
            $table->unsignedBigInteger('Resort_id')->index('fk_Review_Resort1_idx');
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
        Schema::dropIfExists('review');
    }
}
