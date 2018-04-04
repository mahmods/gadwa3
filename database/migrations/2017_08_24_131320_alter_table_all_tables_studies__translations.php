<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableAllTablesStudiesTranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('studies_products_translations', function (Blueprint $table) {
            if (!Schema::hasColumn('studies_products_translations', 'product_id')) {
                $table->renameColumn('studies_products_id', 'product_id');
                //$table->unique(['product_id']);
                //$table->dropUnique(['studies_products_translations_studies_products_id_locale_unique']);
            }
        });
        Schema::table('expenses_categories_translations', function (Blueprint $table) {
            if (!Schema::hasColumn('expenses_categories_translations', 'expense_categories_id')) {
                $table->renameColumn('category_id', 'expense_categories_id');
                //$table->unique(['expense_categories_id']);
                //$table->dropUnique(['expenses_categories_translations_category_id_locale_unique']);
            }
        });
        Schema::table('studies_expenses_translations', function (Blueprint $table) {
            if (!Schema::hasColumn('studies_expenses_translations', 'expense_id')) {
                $table->renameColumn('studies_expense_id', 'expense_id');
                //$table->unique(['expense_id']);
                //$table->dropUnique(['studies_expenses_translations_studies_expense_id_locale_unique']);
            }
        });
        Schema::table('studies_marketing_translations', function (Blueprint $table) {
            if (!Schema::hasColumn('studies_marketing_translations', 'marketing_id')) {
                //$table->unique(['marketing_id']);
                //$table->dropUnique(['studies_assets_translations_studies_assets_id_locale_unique']);
            }
        });
        Schema::table('studies_sectors_translations', function (Blueprint $table) {
            if (!Schema::hasColumn('studies_sectors_translations', 'studies_sector_id')) {
                $table->renameColumn('sector_id', 'studies_sector_id');
                //$table->unique(['studies_sector_id']);
                //$table->dropUnique(['studies_sectors_translations_sector_id_locale_unique']);
            }
        });
        Schema::table('studies_competition_translations', function (Blueprint $table) {
            if (!Schema::hasColumn('studies_competition_translations', 'competition_id')) {
                $table->renameColumn('s_competition_id', 'competition_id');
                //$table->unique(['competition_id']);
                //$table->dropUnique(['studies_competition_translations_s_competition_id_locale_unique']);
            }
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
