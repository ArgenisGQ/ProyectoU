<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPeriodIdToActivities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activities', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('period_id')->nullable();
            $table->foreign('period_id')->nullable()->references('id')->on('periods'); /* relacion con el periodo correspondiente que fue creada*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activities', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('period_id');
        });
    }
}
