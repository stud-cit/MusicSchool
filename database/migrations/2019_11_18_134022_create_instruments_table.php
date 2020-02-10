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
            $table->string('name_instruments');
            $table->text('instruments_info');
            $table->string('photo');
            $table->timestamps();
        });

        Schema::table('instruments', function (Blueprint $table) {
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
