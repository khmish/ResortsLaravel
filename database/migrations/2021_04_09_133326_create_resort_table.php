<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResortTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resort', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 80)->nullable();
            $table->text('description')->nullable();
            $table->string('longitude', 45)->nullable();
            $table->string('latitude', 45)->nullable();
            $table->string('media')->nullable();
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
        Schema::dropIfExists('resort');
    }
}
