<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
    public function up()
    {
        Schema::dropIfExists('teachers');
        Schema::create('teachers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('teachers_id');
            $table->integer('departments_id')->unsigned();
            $table->string('teacher_surname');
            $table->string('teacher_name');
            $table->string('teacher_patronymic');
            $table->text('teacher_info');
            $table->string('photo');
            $table->timestamps();
        });

        Schema::table('teachers', function (Blueprint $table) {
            $table->index('departments_id');
            $table->foreign('departments_id')->references('departments_id')->on('departments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
}
