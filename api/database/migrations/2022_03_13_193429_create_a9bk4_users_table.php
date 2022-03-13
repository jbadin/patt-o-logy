<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateA9bk4UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a9bk4_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',30);
            $table->string('mail',150)->unique();
            $table->string('password',60);
            //doit être en unsigned sinon une erreur d'incompatibilité va survenir
            $table->integer('id_cities')->unsigned();
            $table->timestamps();
        });
        //Permet de créer une clé étrangère
        Schema::table('a9bk4_users', function($table) {
            $table->foreign('id_cities')->references('id')->on('a9bk4_cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('a9bk4_users');
    }
}
