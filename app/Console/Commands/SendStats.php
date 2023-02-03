<?php

namespace App\Console\Commands;

use App\Models\View;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\StatisticMail;
use App\Models\Comment;

class SendStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendStats';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $viewCount = View::whereDate('created_at', Carbon::today())->count();
        Log::info("Количество посетителей - " . $viewCount);
        echo $viewCount;
        //Mail::send(new StatisticMail($viewCount));
    }
}
