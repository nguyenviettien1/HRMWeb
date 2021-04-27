<?php

namespace App\Console\Commands;
use App\Models\Work;
use App\Models\BAccount;
use App\Models\PositionDetail;
use App\Models\DepartmentDetail;
use App\Models\CheckIn;
use App\Models\Mistake;
use Illuminate\Console\Command;

class SalaryOfTheMonth extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'salary:month';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Salary calculation for employees per month';

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
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}
