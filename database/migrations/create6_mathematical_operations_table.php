<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mathematical_operation', function (Blueprint $table) {
            $table->increments('Code');
            $table->string('Operation',20);
            $table->integer('Answer');
            $table->string('UrlImageOperation',60);

            $table->integer('CodeTypeOperation')->unsigned();
            $table->foreign('CodeTypeOperation')->references('Code')->on('type_operation');

            $table->boolean('Vigente')->default(true);
        });
    }

    public function down()
    {
        Schema::dropIfExists('mathematical_operation');
    }
};
