<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStudiesFinanceInvesments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('studies_finance_investments', function (Blueprint $table) {
            $table->increments('id');
            $table->double('personal_investment')->nullable();
            $table->double('loan')->nullable();
            $table->double('other')->nullable();
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
        Schema::dropIfExists('studies_finance_investments');
    }
}
