<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });


        \App\Models\User::create([
            'name'=>'admin',
            'email'=>'admin@test.com',
            'password'=> (app()->environment() != 'production') ? bcrypt('secret') : bcrypt(config('auth.admin.password')),
        ]);

        \App\Models\User::create([
            'name'=>'miha',
            'email'=>'miha@test.com',
            'password'=> (app()->environment() != 'production') ? bcrypt('secret') : bcrypt(config('auth.admin.password_miha')),
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
};
