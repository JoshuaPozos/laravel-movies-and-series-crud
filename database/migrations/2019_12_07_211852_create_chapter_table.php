<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter', function (Blueprint $table) {
            $table->bigIncrements('chapter_ID');
            $table->integer('chapter_Number');
            $table->string('chapter_Image', 255);
            $table->longText('chapter_Description');
            $table->timestamp('chapter_CreatedAt')->useCurrent();
            $table->timestamp('chapter_UpdatedAt')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapter');
    }
}
