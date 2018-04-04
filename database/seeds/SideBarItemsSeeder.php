<?php

use Illuminate\Database\Seeder;

class SideBarItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sidebar_items')->insert([
            [
                'menu_id' => '2',
                'name' => 'allUsers',
                'route' => 'getAllUsers',
                'roles_access' => '1',
                'icon' => 'fa fa-users',
                'ordering' => '1',
                'active' => '1',
            ], [
                'menu_id' => '2',
                'name' => 'addUser',
                'route' => 'getAddUser',
                'roles_access' => '1',
                'icon' => 'fa fa-users',
                'ordering' => '1',
                'active' => '1',
            ],
            [
                'menu_id' => '3',
                'name' => 'deprecations',
                'route' => 'getAllDeprecations',
                'roles_access' => '1',
                'icon' => 'fa fa-level-down',
                'ordering' => '1',
                'active' => '1',
            ],
            [
                'menu_id' => '3',
                'name' => 'sectors',
                'route' => 'getAllSectors',
                'roles_access' => '1',
                'icon' => 'fa fa-level-down',
                'ordering' => '1',
                'active' => '1',
            ],
            [
                'menu_id' => '3',
                'name' => 'currencies',
                'route' => 'getAllCurrencies',
                'roles_access' => '1',
                'icon' => 'fa fa-level-down',
                'ordering' => '1',
                'active' => '1',
            ],
            [
                'menu_id' => '3',
                'name' => 'Countries',
                'route' => 'getAllCountries',
                'roles_access' => '1',
                'icon' => 'fa fa-level-down',
                'ordering' => '1',
                'active' => '1',
            ],
            [
                'menu_id' => '3',
                'name' => 'unites',
                'route' => 'getAllUnites',
                'roles_access' => '1',
                'icon' => 'fa fa-level-down',
                'ordering' => '1',
                'active' => '1',
            ],
            [
                'menu_id' => '3',
                'name' => 'expense_categories',
                'route' => 'getAllExpenseCategories',
                'roles_access' => '1',
                'icon' => 'fa fa-level-down',
                'ordering' => '1',
                'active' => '1',
            ],
            [
                'menu_id' => '4',
                'name' => 'allStudies',
                'route' => 'getAllStudies',
                'roles_access' => '1',
                'icon' => 'fa fa-level-down',
                'ordering' => '1',
                'active' => '1',
            ],
            [
                'menu_id' => '4',
                'name' => 'addStudy',
                'route' => 'getAddStudy',
                'roles_access' => '1',
                'icon' => 'fa fa-level-down',
                'ordering' => '1',
                'active' => '1',
            ],
            [
                'menu_id' => '5',
                'name' => 'allStudiesMarketing',
                'route' => 'getAllMarketings',
                'roles_access' => '1',
                'icon' => 'fa fa-level-down',
                'ordering' => '2',
                'active' => '1',
            ]
            ,
            [
                'menu_id' => '5',
                'name' => 'addMarketing',
                'route' => 'getAddMarketing',
                'roles_access' => '1',
                'icon' => 'fa fa-level-down',
                'ordering' => '1',
                'active' => '1',
            ]
            ,
            [
                'menu_id' => '6',
                'name' => 'allAssets',
                'route' => 'getAllAssets',
                'roles_access' => '1',
                'icon' => 'fa fa-level-down',
                'ordering' => '1',
                'active' => '1',
            ]
            ,
            [
                'menu_id' => '6',
                'name' => 'addAsset',
                'route' => 'getAddAsset',
                'roles_access' => '1',
                'icon' => 'fa fa-level-down',
                'ordering' => '1',
                'active' => '1',
            ],
            [
                'menu_id' => '7',
                'name' => 'addStudyProducts',
                'route' => 'getAllProducts',
                'roles_access' => '1',
                'icon' => 'fa fa-level-down',
                'ordering' => '1',
                'active' => '1',
            ],
            [
                'menu_id' => '8',
                'name' => 'studySectors',
                'route' => 'getAllStudiesSectors',
                'roles_access' => '1',
                'icon' => 'fa fa-level-down',
                'ordering' => '1',
                'active' => '1',
            ],
            [
                'menu_id' => '9',
                'name' => 'all_expenses',
                'route' => 'getAllExpenses',
                'roles_access' => '1',
                'icon' => 'fa fa-level-down',
                'ordering' => '1',
                'active' => '1',
            ]
            ,
            [
                'menu_id' => '9',
                'name' => 'add_expense',
                'route' => 'getAddExpense',
                'roles_access' => '1',
                'icon' => 'fa fa-level-down',
                'ordering' => '1',
                'active' => '1',
            ]
            ,
            [
                'menu_id' => '10',
                'name' => 'studyCompetitor',
                'route' => 'getAllCompetitors',
                'roles_access' => '1',
                'icon' => 'fa fa-level-down',
                'ordering' => '1',
                'active' => '1',
            ],
            [
                'menu_id' => '11',
                'name' => 'studyRawMaterial',
                'route' => 'getAllRawMaterials',
                'roles_access' => '1',
                'icon' => 'fa fa-level-down',
                'ordering' => '1',
                'active' => '1',
            ],
            [
                'menu_id' => '12',
                'name' => 'studyFinanceInvestments',
                'route' => 'getAllFinanceInvestments',
                'roles_access' => '1',
                'icon' => 'fa fa-level-down',
                'ordering' => '1',
                'active' => '1',
            ]
            ,
            [
                'menu_id' => '13',
                'name' => 'all_increase_rates',
                'route' => 'getAllIncreaseRates',
                'roles_access' => '1',
                'icon' => 'fa fa-level-down',
                'ordering' => '1',
                'active' => '1',
            ]
            ,
            [
                'menu_id' => '13',
                'name' => 'add_increase_rate',
                'route' => 'getAddIncreaseRate',
                'roles_access' => '1',
                'icon' => 'fa fa-level-down',
                'ordering' => '1',
                'active' => '1',
            ]
            ,
            [
                'menu_id' => '14',
                'name' => 'all_contents',
                'route' => 'getAllContents',
                'roles_access' => '1',
                'icon' => 'fa fa-level-down',
                'ordering' => '1',
                'active' => '1',
            ]
            ,
            [
                'menu_id' => '14',
                'name' => 'add_content',
                'route' => 'getAddContent',
                'roles_access' => '1',
                'icon' => 'fa fa-level-down',
                'ordering' => '1',
                'active' => '1',
            ]
        ]);
    }
}