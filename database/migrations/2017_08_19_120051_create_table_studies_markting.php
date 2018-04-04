<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStudiesMarkting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('studies_marketing', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('study_id')->nullable();

            $table->timestamps();

            $table->foreign('study_id')->references('id')->on('studies')->onDelete('cascade');
        });
        Schema::create('studies_marketing_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('marketing_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            //$table->unique(['marketing_id', 'locale']);
            $table->foreign('marketing_id')->references('id')->on('studies_marketing')->onDelete('cascade');
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
        Schema::dropIfExists('studies_marketing_translations');
        Schema::dropIfExists('studies_marketing');
    }
}
