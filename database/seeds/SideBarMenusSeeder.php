<?php

use Illuminate\Database\Seeder;

class SideBarMenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sidebar_menus')->insert([
            [
                'menu_id' => 1,
                'name' => 'home',
                'roles_access' => '1',
                'icon' => 'icon-home',
                'ordering' => '1',
                'active' => '1',
                'have_header' => '1',
            ],
            [
                'menu_id' => 2,
                'name' => 'users',
                'roles_access' => '1',
                'icon' => 'fa fa-users',
                'ordering' => '1',
                'active' => '1',
                'have_header' => '1',
            ],
            [
                'menu_id' => 3,
                'name' => 'components',
                'roles_access' => '1',
                'icon' => 'icon-puzzle',
                'ordering' => '1',
                'active' => '1',
                'have_header' => '1',
            ],
            [
                'menu_id' => 4,
                'name' => 'studies',
                'roles_access' => '1',
                'icon' => 'icon-docs',
                'ordering' => '1',
                'active' => '1',
                'have_header' => '1',
            ],
            [
                'menu_id' => 5,
                'name' => 'studiesMarketing',
                'roles_access' => '1',
                'icon' => 'icon-docs',
                'ordering' => '1',
                'active' => '1',
                'have_header' => '1',
            ],
            [
                'menu_id' => 6,
                'name' => 'studyAssets',
                'roles_access' => '1',
                'icon' => 'icon-docs',
                'ordering' => '1',
                'active' => '1',
                'have_header' => '1',
            ],
            [
                'menu_id' => 7,
                'name' => 'studyProducts',
                'roles_access' => '1',
                'icon' => 'fa fa-cubes',
                'ordering' => '1',
                'active' => '1',
                'have_header' => '1',
            ],
            [
                'menu_id' => 8,
                'name' => 'studySectors',
                'roles_access' => '1',
                'icon' => 'icon-docs',
                'ordering' => '1',
                'active' => '1',
                'have_header' => '1',
            ],
            [
                'menu_id' => 9,
                'name' => 'studyExpenses',
                'roles_access' => '1',
                'icon' => 'icon-docs',
                'ordering' => '1',
                'active' => '1',
                'have_header' => '1',
            ],
            [
                'menu_id' => 10,
                'name' => 'studyCompetitor',
                'roles_access' => '1',
                'icon' => 'fa fa-cubes',
                'ordering' => '1',
                'active' => '1',
                'have_header' => '1',
            ],
            [
                'menu_id' => 11,
                'name' => 'studyRawMaterial',
                'roles_access' => '1',
                'icon' => 'fa fa-cubes',
                'ordering' => '1',
                'active' => '1',
                'have_header' => '1',
            ],
            [
                'menu_id' => 12,
                'name' => 'studyFinanceInvestments',
                'roles_access' => '1',
                'icon' => 'fa fa-cubes',
                'ordering' => '1',
                'active' => '1',
                'have_header' => '1',
            ],
            [
                'menu_id' => 13,
                'name' => 'studyIncreaseRates',
                'roles_access' => '1',
                'icon' => 'fa fa-cubes',
                'ordering' => '1',
                'active' => '1',
                'have_header' => '1',
            ]
            ,
            [
                'menu_id' => 14,
                'name' => 'contents',
                'roles_access' => '1',
                'icon' => 'fa fa-cubes',
                'ordering' => '1',
                'active' => '1',
                'have_header' => '1',
            ]
        ]);
    }
}