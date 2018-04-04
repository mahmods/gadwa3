<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStudiesRawMaterials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('studies_raw_materials', function (Blueprint $table) {
            $table->increments('id');
            $table->double('price')->nullable();
            $table->double('production')->nullable();
            $table->double('sales')->nullable();

            $table->unsignedInteger('unit_id')->nullable();
            $table->unsignedInteger('study_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('unit_id')->references('id')->on('unites')->onDelete('cascade');
            $table->foreign('study_id')->references('id')->on('studies')->onDelete('cascade');

        });

        Schema::create('studies_rw_mat_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('raw_material_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            //$table->unique(['raw_material_id', 'locale']);
            $table->foreign('raw_material_id')->references('id')->on('studies_raw_materials')->onDelete('cascade');
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
        Schema::dropIfExists('studies_rw_mat_translations');
        Schema::dropIfExists('studies_raw_materials');
    }
}
