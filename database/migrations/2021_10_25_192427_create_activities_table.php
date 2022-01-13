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
            $table->text('extract')->nullable();
            $table->text('extract01')->nullable();
            $table->longText('body')->nullable();
            $table->dateTime('lapse_in')->nullable();
            $table->dateTime('lapse_out')->nullable();
            $table->enum('type',[1,2])->default(1);
            $table->enum('status',[1,2])->default(1);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('faculty_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); /* opcion 'cascade' borra todos los posts del usuario si se va de baja*/
            $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade'); /* opcion 'cascade' borra todos los posts del usuario si se va de baja*/

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
