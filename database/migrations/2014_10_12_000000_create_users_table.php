<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            /* $table->string('id_sima')->nullable(); */
            /* $table->string('id_continua')->nullable(); */

            $table->string('name');
            $table->string('lastName');
            $table->string('userName');

            $table->unsignedBigInteger('ced')->unique();
            /* $table->unsignedBigInteger('ced_user')->unique();
            $table->foreign('ced_user')->references('ced')->on('user_courses'); */
            /* $table->string('ced')->unique(); */

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
}
