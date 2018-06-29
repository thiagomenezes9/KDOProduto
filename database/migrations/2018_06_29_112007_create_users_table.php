<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->dateTime('dt_nasc')->nullable();
            $table->binary('foto')->nullable();
            $table->string('cpf');
            $table->string('telefone');
            $table->boolean('ativo');
            $table->string('tipo');
            $table->integer('cidade_id')->unsigned();
            $table->foreign('cidade_id')->references('id')->on('cidades');

            $table->integer('supermercado_id')->unsigned();
            $table->foreign('supermercado_id')->references('id')->on('supermercados');

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function(Blueprint $table){
            DB::statement('ALTER TABLE users MODIFY foto LONGBLOB');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
