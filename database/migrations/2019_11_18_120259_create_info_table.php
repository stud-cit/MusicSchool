<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info');
    }
    public function up()
    {
        Schema::dropIfExists('info');
        Schema::create('info', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->text('info_school');
            $table->string('video');
            $table->string('phone', 12);
            $table->string('email', 50);
            $table->string('address', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
}
