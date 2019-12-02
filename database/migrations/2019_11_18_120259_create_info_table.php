<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoTable extends Migration
{
    public function up()
    {
        Schema::create('info', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('info_school');
            $table->string('video');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
        });
    }

    public function down()
    {
        Schema::dropIfExists('info');
    }
}
