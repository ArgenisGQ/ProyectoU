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
            $table->decimal('unit01',2,2)->nullable(); //ponderacion total de la unidad
            $table->decimal('unit02',2,2)->nullable(); //ponderacion total de la unidad
            $table->decimal('unit03',2,2)->nullable(); //ponderacion total de la unidad
            $table->decimal('unit04',2,2)->nullable(); //ponderacion total de la unidad
            $table->decimal('unit05',2,2)->nullable(); //ponderacion total de la unidad
            $table->decimal('unit06',2,2)->nullable(); //ponderacion total de la unidad
            $table->decimal('unit07',2,2)->nullable(); //ponderacion total de la unidad
            $table->decimal('unit08',2,2)->nullable(); //ponderacion total de la unidad
            $table->decimal('unit09',2,2)->nullable(); //ponderacion total de la unidad
            $table->decimal('unit10',2,2)->nullable(); //ponderacion total de la unidad
            $table->decimal('unit11',2,2)->nullable(); //ponderacion total de la unidad
            $table->decimal('unit12',2,2)->nullable(); //ponderacion total de la unidad
            $table->decimal('unit13',2,2)->nullable(); //ponderacion total de la unidad
            $table->decimal('unit14',2,2)->nullable(); //ponderacion total de la unidad
            $table->decimal('unit15',2,2)->nullable(); //ponderacion total de la unidad
            $table->decimal('unit16',2,2)->nullable(); //ponderacion total de la unidad
            $table->integer('unitTotal')->nullable(); //
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
