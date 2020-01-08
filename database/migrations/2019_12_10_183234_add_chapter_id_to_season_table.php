<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddChapterIdToSeasonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('season', function (Blueprint $table) {
            $table->unSignedBigInteger('chapter_ID');

            $table->foreign('chapter_ID')
                ->references('chapter_ID')->on('chapter')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('season', function (Blueprint $table) {
            //
            $table->dropForeign(['chapter_ID']);
            $table->dropColumn('chapter_ID');
        });
    }
}
