<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('user_roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        \DB::table('user_roles')->insert([
            [
                'user_id'=>1,
                'role_id' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'user_id'=>2,
                'role_id' => 2,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}
