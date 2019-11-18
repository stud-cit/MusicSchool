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
            $table->string('title', 30);
            $table->string('text', 50);
            $table->string('photo', 50);
            $table->timestamps();
        });

        Schema::table('teachers', function (Blueprint $table) {
            $table->index('departments_id');
            $table->foreign('departments_id')->references('departments_id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
}
