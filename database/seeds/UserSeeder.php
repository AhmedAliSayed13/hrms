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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        \DB::table('users')->insert([
            'id'=>1,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'),
        ]);
        \DB::table('users')->insert([
            'id'=>2,
            'name' => 'HR Manager',
            'email' => 'hr@gmail.com',
            'password' => bcrypt('123456789'),
        ]);
    }
}
