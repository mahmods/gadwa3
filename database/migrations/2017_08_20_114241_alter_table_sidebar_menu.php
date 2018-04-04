<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableSidebarMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('sidebar_menus',function(Blueprint $table){
            $table->string('class',255)->nullable()->default('')->change();
            $table->string('icon',255)->nullable()->default('')->change();
        });
        Schema::table('sidebar_items',function(Blueprint $table){
            $table->string('class',255)->nullable()->default('')->change();
            $table->string('icon',255)->nullable()->default('')->change();
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
