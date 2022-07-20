<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class Writelog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Write:Logs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Write an expressive description of a task scheduler';

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
       Log::info("Rami Run schedule at : ". Carbon::now());
    }

    protected function scheduleTimezone()
    {
        return 'Asia/Amman';
    }
}
