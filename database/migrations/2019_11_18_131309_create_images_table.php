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
            $table->integer('nas_id')->unsigned();
            $table->string('file');
            $table->timestamps();
        });

        Schema::table('images', function (Blueprint $table) {
            $table->index('nas_id');
            $table->foreign('nas_id')->references('nas_id')->on('news_achieve_story')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

}
