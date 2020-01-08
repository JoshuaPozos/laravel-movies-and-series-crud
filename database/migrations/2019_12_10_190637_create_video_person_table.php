<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoPersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videoPerson', function (Blueprint $table) {

            $table->unSignedBigInteger('video_ID');
            $table->foreign('video_ID')->references('video_ID')->on('video')->onDelete('cascade');

            $table->unSignedBigInteger('person_ID');
            $table->foreign('person_ID')->references('person_ID')->on('person')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videoPerson');
    }
}
