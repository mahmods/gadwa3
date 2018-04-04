<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStudiesIncreasesRate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('studies_increases_rate', function (Blueprint $table) {
            $table->increments('id');
            $table->string('years',50)->nullable();
            $table->double('percentage')->nullable();
            $table->unsignedInteger('study_id');

            $table->timestamps();
            $table->foreign('study_id')->references('id')->on('studies')->onDelete('cascade');
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
        Schema::dropIfExists('studies_increases_rate');
    }
}
