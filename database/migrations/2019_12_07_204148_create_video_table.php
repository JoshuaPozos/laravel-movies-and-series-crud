<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video', function (Blueprint $table) {
            $table->bigIncrements('video_ID');
            $table->string('video_Name',    255);
            $table->time('video_Duration')->nullable();
            $table->string('video_Image',   255)->nullable();
            $table->longText('video_Description')->nullable();
            $table->year('video_Year')->nullable();
            $table->string('video_Type',    255)->nullable();
            $table->timestamp('video_CreatedAt')->useCurrent();
            $table->timestamp('video_UpdatedAt')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *+
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video');
    }
}
