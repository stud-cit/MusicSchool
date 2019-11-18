<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsArchieveStoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_archieve_story');
    }
    public function up()
    {
        Schema::dropIfExists('news_archieve_story');
        Schema::create('news_archieve_story', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('nas_id');
            $table->string('title', 30);
            $table->string('text', 50);
            $table->string('date', 8);
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
