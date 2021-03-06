<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
    public function up()
    {
        Schema::dropIfExists('departments');
        Schema::create('departments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('departments_id');
            $table->string('name_department');
            $table->text('departments_info');
            $table->string('img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
}
