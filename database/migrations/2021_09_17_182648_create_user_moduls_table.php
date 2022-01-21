<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserModulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_moduls', function (Blueprint $table) {
            $table->id();
            $table->integer('role_id');
            $table->integer('modul_id');
            $table->integer('view');
            $table->integer('input');
            $table->integer('update');
            $table->integer('delete');
            $table->integer('posting');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_moduls');
    }
}
