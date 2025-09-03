<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            // 🔹 Employees
            'employee-management',
            // 🔹 Teams
            'team-management',

            // 🔹 Roles
            'role-management',

            // 🔹 Assets
            'asset-management',

            // 🔹 Clients
            'client-management',

            // 🔹 Projects
            'project-management',

            // 🔹 Expenses
            'expense-management',
            // 🔹 Departments
            'department-management',

            // 🔹 Training
            'training-management',

            // 🔹 Trainers
            'trainer-management',
            // 🔹 meeting
            'meeting-management',
            // 🔹 Events
            'event-management',

            // 🔹 Leaves
            'leave-management',
            // 🔹 Awards
            'award-management',

            // 🔹 Attendance
            'attendance',
            'mark-attendance',
            'update-attendance',
            'delete-attendance',

            

            

            // 🔹 Holidays
            'create-holiday',
            'holiday-list',
            'update-holiday',
            'delete-holiday',


            // 🔹 Reports
            'attendance-report',
            'expense-report',
            'leave-report',

            // // 🔹 Settings
            // 'view-settings',
            // 'update-settings',

            // 🔹 Payroll  رواتب
            'view-payroll',
            'generate-payroll',
            'delete-payroll',

            

            // 🔹 Resignation استقالة
            'view-resignation',
            'approve-resignation',
            'reject-resignation',

            // 🔹 Promotion
            'promotion-management',
            'promotion-confirm',

            // 🔹 Complaints
            'view-complaint',
            'create-complaint',
            'update-complaint',
            'delete-complaint',

            // 🔹 Warnings
            'view-warning',
            'create-warning',
            'update-warning',
            'delete-warning',

            // 🔹 Termination إنهاء الخدمة
            'view-termination',
            'create-termination',
            'update-termination',
            'delete-termination',
        ];
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        foreach ($permissions as $perm) {
            DB::table('permissions')->insert(['name' => $perm]);
        }
    }
}
