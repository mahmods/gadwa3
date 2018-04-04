<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCurrencies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('symbol')->nullable();
            $table->string('code')->nullable();
            $table->double('rate');
            $table->timestamps();
        });

        Schema::create('currencies_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('currency_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            //$table->unique(['currency_id','locale']);
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade');
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
        Schema::dropIfExists('currencies_translations');
        Schema::dropIfExists('currencies');
    }
}
