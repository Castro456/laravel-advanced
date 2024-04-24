<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Throwable;

class SlowJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3; // retrieve for 3 times before considering a job is failed.
    public $email = '';

    /**
     * Create a new job instance.
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::channel('cron_jobs')->info('User logged into the system', [
            'email' => $this->email
        ]);

        //Job exception handing
        // throw new \Exception('failed');
    }


    public function failed(\Throwable $e) 
    {
        Log::channel('cron_jobs')->info('This job is failed');
    }
}
