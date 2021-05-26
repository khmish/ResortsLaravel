<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('rentedBy', 45)->index('fk_Rent_User1_idx');
            $table->dateTime('rentedDate')->nullable();
            $table->integer('state')->nullable();
            $table->string('AvailableTime_id')->index('fk_Rent_AvailableTime1_idx');
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
        Schema::dropIfExists('rent');
    }
}
