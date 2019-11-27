<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsAchieveStoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_achieve_story');
    }
    public function up()
    {
        Schema::dropIfExists('news_achieve_story');
        Schema::create('news_achieve_story', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('nas_id');
            $table->string('title', 30);
            $table->string('text', 50);
            $table->date('date');
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
