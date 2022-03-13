<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateA9bk4WeightHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a9bk4_weight_history', function (Blueprint $table) {
            $table->increments('id');
            $table->string('weight',6);
            $table->date('date');
            $table->integer('id_pets')->unsigned();
            $table->timestamps();
        });
        Schema::table('a9bk4_weight_history', function($table) {
            $table->foreign('id_pets')->references('id')->on('a9bk4_pets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('a9bk4_weight_history');
    }
}
