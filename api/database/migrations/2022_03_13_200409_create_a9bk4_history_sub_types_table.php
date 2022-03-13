<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateA9bk4HistorySubTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a9bk4_history_sub_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->text('description');
            $table->integer('id_historyTypes')->unsigned();
            $table->timestamps();
        });
        Schema::table('a9bk4_history_sub_types', function($table) {
            $table->foreign('id_historyTypes')->references('id')->on('a9bk4_history_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('a9bk4_history_sub_types');
    }
}
