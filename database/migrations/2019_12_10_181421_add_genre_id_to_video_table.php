<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGenreIdToVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('video', function (Blueprint $table) {
            $table->unsignedBigInteger('genre_ID')->nullable();

            $table->foreign('genre_ID')
                ->references('genre_ID')->on('genre')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('video', function (Blueprint $table) {            
            $table->dropForeign(['genre_ID']);
            
            $table->dropColumn('genre_ID');
        });
    }
}
