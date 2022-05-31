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
            $table->string('code')->unique();
            $table->string('section')->nullable();
            $table->decimal('unit01',2,2)->nullable(); //ponderacion total de la unidad
            $table->decimal('unit02',2,2)->nullable(); //ponderacion total de la unidad
            $table->decimal('unit03',2,2)->nullable(); //ponderacion total de la unidad
            $table->decimal('unit04',2,2)->nullable(); //ponderacion total de la unidad
            $table->string('slug')->nullable();
            $table->string('color')->nullable();
            $table->string('turma')->unique()->nullable();
            $table->string('id_dpto')->unique()->nullable();
            $table->string('id_faculty')->unique()->nullable();

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
