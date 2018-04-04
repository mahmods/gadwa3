<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSectors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('sectors', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('sectors_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sector_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->text('description');
            //$table->unique(['sector_id','locale']);
            $table->foreign('sector_id')->references('id')->on('sectors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('sectors_translations');
        Schema::dropIfExists('sectors');
    }
}
