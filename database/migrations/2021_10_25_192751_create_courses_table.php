<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('code');
            $table->string('section')->nullable();
            $table->Integer('unit01')->nullable(); //ponderacion total de la unidad
            $table->Integer('unit02')->nullable(); //ponderacion total de la unidad
            $table->Integer('unit03')->nullable(); //ponderacion total de la unidad
            $table->Integer('unit04')->nullable(); //ponderacion total de la unidad
            $table->Integer('unit05')->nullable(); //ponderacion total de la unidad
            $table->Integer('unit06')->nullable(); //ponderacion total de la unidad
            $table->Integer('unit07')->nullable(); //ponderacion total de la unidad
            $table->Integer('unit08')->nullable(); //ponderacion total de la unidad
            $table->Integer('unit09')->nullable(); //ponderacion total de la unidad
            $table->Integer('unit10')->nullable(); //ponderacion total de la unidad
            $table->Integer('unit11')->nullable(); //ponderacion total de la unidad
            $table->Integer('unit12')->nullable(); //ponderacion total de la unidad
            $table->Integer('unit13')->nullable(); //ponderacion total de la unidad
            $table->Integer('unit14')->nullable(); //ponderacion total de la unidad
            $table->Integer('unit15')->nullable(); //ponderacion total de la unidad
            $table->Integer('unit16')->nullable(); //ponderacion total de la unidad
            $table->integer('unitTotal')->nullable(); //total de unidades activas a usar
            $table->string('slug')->nullable();
            $table->string('color')->nullable();
            $table->string('turma')->unique()->nullable();
            $table->string('id_dpto')->unique()->nullable();
            $table->string('id_faculty')->unique()->nullable();

            /* $table->unsignedBigInteger('period_id')->nullable();
            $table->foreign('period_id')->references('id')->on('periods'); */

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
        Schema::dropIfExists('courses');
    }
}
