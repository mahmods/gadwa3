<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStudiesExpences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('expenses_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
        Schema::create('expenses_categories_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            //$table->unique(['category_id', 'locale']);
            $table->foreign('category_id')->references('id')->on('expenses_categories')->onDelete('cascade');
        });

        Schema::create('studies_expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->double('value')->nullable();
            $table->double('space')->nullable();
            $table->integer('count')->nullable();

            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('study_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('expenses_categories')->onDelete('cascade');
            $table->foreign('study_id')->references('id')->on('studies')->onDelete('cascade');

        });

        Schema::create('studies_expenses_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('studies_expense_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->string('item')->nullable();
            $table->string('type')->nullable();
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            //$table->unique(['studies_expense_id', 'locale']);
            $table->foreign('studies_expense_id')->references('id')->on('studies_expenses')->onDelete('cascade');
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
        Schema::dropIfExists('studies_expenses_translations');
        Schema::dropIfExists('studies_expenses');

        Schema::dropIfExists('expenses_categories_translations');
        Schema::dropIfExists('expenses_categories');


    }
}
