<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Employee;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProbationEndNotify;

class SendReminderEmployeeConfrimationDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employee:reminder-confirmation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder emails to employees before confirmation date';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Get employees whose confirmation date is today
        $employees = Employee::with('user')
        ->whereDate('date_of_confirmation', Carbon::today()->format('Y-m-d'))
        ->get();
        // Get HR emails (roles: 1, 7)
        $hrEmails = User::whereHas('roles', function ($q) {
            $q->whereIn('roles.id', [1, 7]);
        })->pluck('email')->toArray();

        

        foreach ($employees as $employee) {
            // Merge HR emails with the employee’s email
            $recipients = array_merge($hrEmails, [$employee->user->email]);

            // Send mail
            Mail::to($recipients)->send(new ProbationEndNotify($employee));
        }

    $this->info('Reminder emails sent successfully to HR and employees.');
    }
}
