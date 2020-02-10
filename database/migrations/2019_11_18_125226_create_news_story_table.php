<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsStoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_story');
    }
    public function up()
    {
        Schema::dropIfExists('news_story');
        Schema::create('news_story', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('title');
            $table->text('text');
            $table->string('date');
            $table->string('type', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
}
