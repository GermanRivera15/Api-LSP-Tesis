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
        Schema::create('category', function (Blueprint $table) {
            $table->increments('Code');
            $table->string('Type',40);
            $table->string('UrlImage',60);

            $table->integer('CodeDictionary')->unsigned();
            $table->foreign('CodeDictionary')->references('Code')->on('dictionary');
            
            $table->boolean('Vigente')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');
    }
};
