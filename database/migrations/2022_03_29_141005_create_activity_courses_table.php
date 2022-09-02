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
            $table->string('id_period')->nullable();
            $table->enum('unit',[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16])->nullable();  //unidad de materia
            $table->integer('evaluation')->nullable(); //valor de las NOTAS de la actividad
            $table->unsignedBigInteger('id_course');
            $table->foreign('id_course')->references('id')->on('user_courses');
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
