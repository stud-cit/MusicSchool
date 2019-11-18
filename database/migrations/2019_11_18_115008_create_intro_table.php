<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('intro');
    }
    public function up()
    {
        Schema::dropIfExists('intro');
        Schema::create('intro', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->text('block1');
            $table->text('block2');
            $table->text('block3');
            $table->string('bg', 50);
            $table->text('info');
            $table->string('photo', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
}
