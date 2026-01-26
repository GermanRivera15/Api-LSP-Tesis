<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dictionary', function (Blueprint $table) {
            $table->increments('Code');
            $table->string('Country',20);
            
            $table->integer('CodeUser')->unsigned();
            $table->foreign('CodeUser')->references('Code')->on('user');
            
            $table->boolean('Vigente')->default(true);
        });
    }

    public function down()
    {
        Schema::dropIfExists('dictionary');
    }
};
