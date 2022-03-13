<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a9bk4_history', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->date('date');
            $table->text('commentary');
            $table->integer('id_pets')->unsigned();
            $table->integer('id_historySubTypes')->unsigned();
            $table->timestamps();
        });

        Schema::table('a9bk4_history', function($table) {
            $table->foreign('id_pets')->references('id')->on('a9bk4_pets');
            $table->foreign('id_historySubTypes')->references('id')->on('a9bk4_history_sub_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('a9bk4_history');
    }
}
