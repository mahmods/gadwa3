<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!DB::table('users')->where('email','admin@mahacode.com')->first()) {
            DB::table('users')->insert([
                'name' => 'Super Admin',
                'email' => 'admin@mahacode.com',
                'password' => bcrypt('6060660'),
            ]);
        }
    }
}
