<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStudiesSectors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('studies_sectors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('study_id')->nullable();

            $table->timestamps();

            $table->foreign('study_id')->references('id')->on('studies')->onDelete('cascade');
        });

        Schema::create('studies_sectors_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sector_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            //$table->unique(['sector_id', 'locale']);
            $table->foreign('sector_id')->references('id')->on('studies_sectors')->onDelete('cascade');
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
        Schema::dropIfExists('studies_sectors_translations');
        Schema::dropIfExists('studies_sectors');
    }
}
