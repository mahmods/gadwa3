<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTableCompetionsToCompetitors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::dropIfExists('studies_competition_translations');
        Schema::dropIfExists('studies_competition');

        Schema::create('studies_competitors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('study_id')->nullable();

            $table->timestamps();

            $table->foreign('study_id')->references('id')->on('studies')->onDelete('cascade');
        });

        Schema::create('studies_competitors_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('competitor_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            //$table->unique(['competitor_id', 'locale']);
            $table->foreign('competitor_id')->references('id')->on('studies_competitors')->onDelete('cascade');
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
        Schema::dropIfExists('studies_competitors_translations');
        Schema::dropIfExists('studies_competitors');
    }
}
