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
            $table->string('id')->primary();
            $table->integer('totalStars')->nullable();
            $table->text('comment')->nullable();
            $table->string('writtenBy')->index('fk_Review_User1_idx');
            $table->string('Resort_id')->index('fk_Review_Resort1_idx');
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
