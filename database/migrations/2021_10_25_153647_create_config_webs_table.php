<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigWebsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_webs', function (Blueprint $table) {
            $table->id();
            $table->string('nameweb');
            $table->string('logo');
            $table->string('icon');
            $table->text('keywords');
            $table->text('description');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('twitter');
            $table->text('google_maps');
            $table->text('hero');
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
        Schema::dropIfExists('config_webs');
    }
}
