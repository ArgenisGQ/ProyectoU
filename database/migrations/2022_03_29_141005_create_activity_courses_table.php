<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_courses', function (Blueprint $table) {
            $table->id();
            /* $table->string('id_activity')->nullable(); */
            $table->string('id_course')->nullable();
            $table->string('id_period')->nullable();
            $table->unsignedBigInteger('id_activity');
            $table->foreign('id_activity')->references('id')->on('activities')->onDelete('cascade');
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
        Schema::dropIfExists('activity_courses');
    }
}
