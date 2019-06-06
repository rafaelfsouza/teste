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
            $table->rememberToken();
            $table->timestamps();
        });

        \App\User::create([
            'name' => 'Rafael Souza',
            'email' => 'rafael@impacto.online',
            'password' => bcrypt('123456')
        ]);

        \App\User::create([
            'name' => 'Dev Impacto',
            'email' => 'dev@impacto.online',
            'password' => bcrypt('123456')
        ]);

        \App\User::create([
            'name' => 'Teste Impacto',
            'email' => 'teste@impacto.online',
            'password' => bcrypt('123456')
        ]);

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
