<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rent', function (Blueprint $table) {
            $table->foreign('AvailableTime_id', 'fk_Rent_AvailableTime1')->references('id')->on('availabletime')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('rentedBy', 'fk_Rent_User1')->references('id')->on('user')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rent', function (Blueprint $table) {
            $table->dropForeign('fk_Rent_AvailableTime1');
            $table->dropForeign('fk_Rent_User1');
        });
    }
}
