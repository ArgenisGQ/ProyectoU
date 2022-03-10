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

            $table->string('id_sima')->unique()->nullable();
            $table->string('id_continua')->unique()->nullable();
            $table->string('id_sima_doc')->unique()->nullable();
            $table->string('id_continua_doc')->unique()->nullable();
            $table->string('id_dpto')->unique()->nullable();
            $table->string('id_faculty')->unique()->nullable();

            $table->string('name');
            $table->string('code')->unique();
            $table->string('section')->nullable();
            $table->string('slug')->nullable();
            $table->string('color')->nullable();

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
