<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableCompetitorsTranslation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('studies_competitors_translations',function(Blueprint $table){
            if (!Schema::hasColumn('studies_competitors_translations', 'product')) {
                $table->string('product', 255)->nullable();
                $table->string('place', 255)->nullable();
            }
        });
        Schema::table('studies_competitors',function(Blueprint $table){
            if (!Schema::hasColumn('studies_competitors', 'product_id'))
                $table->unsignedInteger('product_id')->nullable();

            $table->foreign('product_id')->references('id')->on('studies_products')->onDelete('cascade');

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
    }
}
