<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateA9bk4PetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a9bk4_pets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference',7)->unique();
            $table->string('fullName',150);
            $table->string('nickname',50);
            $table->date('birthdate');
            $table->date('deceaseDate');
            $table->string('identificationNumber',20);
            $table->string('picture',255);
            $table->integer('id_users')->unsigned();
            $table->integer('id_bloodTypes')->unsigned();
            $table->integer('id_petsCategories')->unsigned();
            $table->integer('id_countries')->unsigned();
            $table->integer('id_sexes')->unsigned();
            $table->integer('id_breeds')->unsigned();
            $table->timestamps();
        });
        Schema::table('a9bk4_pets', function($table) {
            $table->foreign('id_users')->references('id')->on('a9bk4_users');
            $table->foreign('id_bloodTypes')->references('id')->on('a9bk4_blood_types');
            $table->foreign('id_petsCategories')->references('id')->on('a9bk4_pets_categories');
            $table->foreign('id_countries')->references('id')->on('a9bk4_countries');
            $table->foreign('id_sexes')->references('id')->on('a9bk4_sexes');
            $table->foreign('id_breeds')->references('id')->on('a9bk4_breeds');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('a9bk4_pets');
    }
}
