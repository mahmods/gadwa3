<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStudiesCompetition extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('studies_competition', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('study_id')->nullable();

            $table->timestamps();

            $table->foreign('study_id')->references('id')->on('studies')->onDelete('cascade');
        });

        Schema::create('studies_competition_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('s_competition_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            //$table->unique(['s_competition_id', 'locale']);
            $table->foreign('s_competition_id')->references('id')->on('studies_competition')->onDelete('cascade');
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
        Schema::dropIfExists('studies_competition_translations');
        Schema::dropIfExists('studies_competition');
    }
}
