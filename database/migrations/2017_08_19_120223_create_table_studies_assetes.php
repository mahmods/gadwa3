<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStudiesAssetes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deprecations', function (Blueprint $table) {
            $table->increments('id');
            $table->double('percentage')->nullable();
            $table->timestamps();
        });
        Schema::create('deprecations_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('deprecation_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title')->nullable();
            //$table->unique(['deprecation_id', 'locale']);
            $table->foreign('deprecation_id')->references('id')->on('deprecations')->onDelete('cascade');
        });
        Schema::create('studies_assets', function (Blueprint $table) {
            $table->increments('id');
            $table->double('value')->nullable();
            $table->integer('space')->nullable();
            $table->integer('count')->nullable();
            $table->unsignedInteger('deprecation_id')->nullable();
            $table->unsignedInteger('study_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('deprecation_id')->references('id')->on('deprecations')->onDelete('cascade');
            $table->foreign('study_id')->references('id')->on('studies')->onDelete('cascade');
        });

        Schema::create('studies_assets_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('asset_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            //$table->unique(['asset_id', 'locale']);
            $table->foreign('asset_id')->references('id')->on('studies_assets')->onDelete('cascade');
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
        Schema::dropIfExists('deprecations_translations');
        Schema::dropIfExists('deprecations');

        Schema::dropIfExists('studies_assets_translations');
        Schema::dropIfExists('studies_assets');
    }
}
