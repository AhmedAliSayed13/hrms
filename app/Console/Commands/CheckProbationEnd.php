<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProbationEndNotify;
class CheckProbationEnd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:probation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "check if a user's probation period has ended";

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

        $employees = Employee::where('is_probation_over', false)->get();
        // $this->info(count($users));
        foreach ($employees as $employee) {
            $this->info($employee->code);
            if(!$employee->probation_period){
                $employee->is_probation_over = true;
                $employee->save();
                continue;
            }

            $probation_period=$employee->probation_period;
            $probation_end_date = Carbon::parse($employee->date_of_joining)->addDays($probation_period);

            if ($probation_end_date > Carbon::now()) {

                $employee->is_probation_over = true;
                $employee->save();
                Mail::to(['ahmedali@uaebarq.ae'])->send(new ProbationEndNotify($employee));

            }

        }
    }
}
