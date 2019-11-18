<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstrumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instruments');
    }
    public function up()
    {
        Schema::dropIfExists('instruments');
        Schema::create('instruments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('instruments_id');
            $table->integer('departments_id')->unsigned();
            $table->string('title', 30);
            $table->string('text', 50);
            $table->string('photo', 50);
            $table->timestamps();
        });

        Schema::table('instruments', function (Blueprint $table) {
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
