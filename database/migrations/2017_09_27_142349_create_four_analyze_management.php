<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFourAnalyzeManagement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('studies_four_analyze', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('study_id')->nullable();

            $table->timestamps();

            $table->foreign('study_id')->references('id')->on('studies')->onDelete('cascade');
        });

        Schema::create('studies_four_analyze_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('four_analyze_id')->unsigned();
            $table->string('locale')->index();
            $table->text('power')->nullable();
            $table->text('athreat')->nullable();
            $table->text('chance')->nullable();
            $table->text('challenge')->nullable();
            //$table->unique(['sector_id', 'locale']);
            $table->foreign('four_analyze_id')->references('id')->on('studies_four_analyze')->onDelete('cascade');
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
        Schema::dropIfExists('studies_four_analyze_translations');
        Schema::dropIfExists('studies_four_analyze');
    }
}
