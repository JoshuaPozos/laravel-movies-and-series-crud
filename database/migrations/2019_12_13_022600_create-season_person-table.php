<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeasonPersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasonPerson', function (Blueprint $table) {

            $table->unSignedBigInteger('season_ID');
            $table->foreign('season_ID')->references('season_ID')->on('season')->onDelete('cascade');

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
        Schema::dropIfExists('seasonPerson');
    }
}
