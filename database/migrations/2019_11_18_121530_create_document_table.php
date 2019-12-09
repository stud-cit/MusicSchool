<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
    public function up()
    {
        Schema::dropIfExists('documents');
        Schema::create('documents', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('documents_id');
            $table->string('text', 50);
            $table->string('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
}
