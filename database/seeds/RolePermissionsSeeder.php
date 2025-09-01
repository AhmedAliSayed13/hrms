<?php

use Illuminate\Database\Seeder;
use App\Permission;
use Illuminate\Support\Facades\DB;
class RolePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('role_permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $permissions=Permission::all();
        // Admin
        foreach($permissions as $permission)
        {
                DB::table('role_permissions')->insert([
                    'role_id'=>1,
                    'permission_id'=>$permission->id,
                ]);
            
        }
        // HR Manager
        $hr_permissions=[
            // Employees
            'employee-management',
            // Teams
            'team-management',
            // Roles
            'role-management',
            // Assets
            'asset-management',
            // Clients
            'client-management',
            // Projects
            'project-management',
            // Expenses
            'expense-management',
            // Departments
            'department-management',
            // Training
            'training-management',
            // Trainers
            'trainer-management'
        ];
        foreach($hr_permissions as $permission_name)
        {
            $permission=Permission::where('name',$permission_name)->first();
            if($permission)
            {
                DB::table('role_permissions')->insert([
                    'role_id'=>2,
                    'permission_id'=>$permission->id,
                ]);
            }
        }
        
    }
}
