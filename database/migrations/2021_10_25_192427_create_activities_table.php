<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug');
            $table->text('activity_type')->nullable();
            $table->text('extract')->nullable();
            $table->text('extract01')->nullable();
            $table->longText('body')->nullable();
            $table->dateTime('academic_start')->nullable();
            $table->dateTime('academic_finish')->nullable();
            $table->dateTime('lapse_in')->nullable();
            $table->dateTime('lapse_out')->nullable();
            /* $table->enum('type',[1,2])->default(1); */ //tip de evaluacion
            $table->unsignedBigInteger('type')->default(1); //tip de evaluacion
            $table->enum('status',[1,2,3])->default(1); //status para imprimir o no pdf
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('faculty_id');
            /* $table->unsignedBigInteger('course_id'); */
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); /* opcion 'cascade' borra todos los posts del usuario si se va de baja*/
            $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade'); /* opcion 'cascade' borra todos los posts del usuario si se va de baja*/
            /* $table->foreign('course_id')->nullable()->references('id')->on('courses'); */ /* opcion 'cascade' borra todos los posts del usuario si se va de baja*/
            /* $table->foreignId('course_id')->nullable()->constrained('courses')->cascadeOnUpdate()->nullOnDelete(); */
            /* $table->foreignId('course_id')->nullable()->constrained('courses'); */
            /* $table->foreign('type')->references('id')->on('evaluations')->onDelete('cascade'); */ /* opcion 'cascade' borra todos los posts del usuario si se va de baja*/

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
        Schema::dropIfExists('activities');
    }
}
