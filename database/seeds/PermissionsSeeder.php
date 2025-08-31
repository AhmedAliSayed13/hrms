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
            'create-employee',
            'list-employee',
            'update-employee',
            'delete-employee',

            // 🔹 Teams
            'create-team',
            'team-listing',
            'update-team',
            'delete-team',

            // 🔹 Roles
            'create-role',
            'role-list',
            'update-role',
            'delete-role',

            // 🔹 Expenses
            'create-expense',
            'expense-list',
            'update-expense',
            'delete-expense',

            // 🔹 Leaves
            'create-leave',
            'leave-list',
            'update-leave',
            'delete-leave',

            // 🔹 Attendance
            'attendance',
            'mark-attendance',
            'update-attendance',
            'delete-attendance',

            // 🔹 Assets
            'create-asset',
            'asset-list',
            'update-asset',
            'delete-asset',

            // 🔹 Clients
            'create-client',
            'client-list',
            'update-client',
            'delete-client',

            // 🔹 Projects
            'create-project',
            'project-list',
            'update-project',
            'delete-project',

            // 🔹 Training
            'create-training',
            'training-list',
            'update-training',
            'delete-training',

            // 🔹 Trainers
            'create-trainer',
            'trainer-list',
            'update-trainer',
            'delete-trainer',

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

            // 🔹 Departments
            'create-department',
            'department-list',
            'update-department',
            'delete-department',

            // 🔹 Resignation استقالة
            'view-resignation',
            'approve-resignation',
            'reject-resignation',

            // 🔹 Promotion
            'view-promotion',
            'create-promotion',
            'update-promotion',
            'delete-promotion',

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

        foreach ($permissions as $perm) {
            DB::table('permissions')->insert(['name' => $perm]);
        }
    }
}
