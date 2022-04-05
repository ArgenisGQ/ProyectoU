<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_courses', function (Blueprint $table) {
            $table->id();

            $table->string('code')->nullable();
            /* $table->string('code')->unique()->nullable(); */

            $table->string('section')->nullable();
            $table->string('course')->nullable();

            /* $table->unsignedBigInteger('ced')->nullable(); */
            $table->unsignedBigInteger('ced');
            $table->string('name')->nullable();

            /* $table->unsignedBigInteger('id_course')->nullable();
            $table->foreign('id_course')->references('id')->on('courses'); */

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
        Schema::dropIfExists('user_courses');
    }
}
