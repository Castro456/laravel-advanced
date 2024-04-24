<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->call(function () {
        //     Log::channel('cron_jobs')->info('Run a task every minute');
        // })->everyMinute();

        //In laravel can use command to run the schedule
        //If a schedule is currently running a task that is still not completed this: withoutOverlapping() will only allow next task to run only if the first one is completed.
        $schedule->command('hello:cron')->everyMinute()->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
