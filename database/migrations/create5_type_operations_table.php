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
        Schema::create('type_operation', function (Blueprint $table) {
            $table->increments('Code');
            $table->string('Type',40);
            $table->string('UrlImage',60);

            $table->integer('CodeCategory')->unsigned();
            $table->foreign('CodeCategory')->references('Code')->on('category');

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
        Schema::dropIfExists('type_operation');
    }
};
