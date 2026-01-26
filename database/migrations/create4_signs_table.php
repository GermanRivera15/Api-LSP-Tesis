<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sign', function (Blueprint $table) {
            $table->increments('Code');
            $table->string('Title',40);
            $table->text('Description');
            $table->string('UrlImage',60);
            
            $table->integer('CodeCategory')->unsigned();
            $table->foreign('CodeCategory')->references('Code')->on('category');
            
            $table->boolean('Vigente')->default(true);
        });
    }

    public function down()
    {
        Schema::dropIfExists('sign');
    }
};
