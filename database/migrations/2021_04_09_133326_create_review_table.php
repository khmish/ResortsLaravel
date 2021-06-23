<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;
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
            $table->string('id')->primary()->default(new Expression("uuid_generate_v4()"));
            $table->integer('totalStars')->nullable();
            $table->text('comment')->nullable();
            $table->string('writtenBy')->index('fk_Review_User1_idx');
            $table->string('Resort_id')->index('fk_Review_Resort1_idx');
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
        Schema::dropIfExists('review');
    }
}
