<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
    public function up()
    {
        Schema::dropIfExists('images');
        Schema::create('images', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('images_id');
            $table->integer('id')->unsigned();
            $table->string('file');
            $table->timestamps();
        });

        Schema::table('images', function (Blueprint $table) {
            $table->index('id');
            $table->foreign('id')->references('id')->on('news_story')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

}
