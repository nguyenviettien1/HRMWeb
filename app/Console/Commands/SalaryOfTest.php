<?php

namespace App\Console\Commands;
use App\Models\Work;
use App\Models\BAccount;
use App\Models\PositionDetail;
use App\Models\DepartmentDetail;
use App\Models\CheckIn;
use App\Models\Salary;
use Illuminate\Console\Command;

class SalaryOfTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'salary:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Salary calculation for employees per minute';

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
        
    }
}
