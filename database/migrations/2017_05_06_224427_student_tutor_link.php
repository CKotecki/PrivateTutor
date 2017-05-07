<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StudentTutorLink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('student_tutor_link', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('isTutor')->unsigned();
        $table->integer('tutorID')->unsigned();
        $table->integer('studentID')->unsigned();
        $table->foreign('tutorID')->references('id')->on('users');
        $table->foreign('studentID')->references('id')->on('users');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_tutor_link');
    }
}
