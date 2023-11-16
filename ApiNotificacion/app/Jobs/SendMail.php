<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Mail\WelcomeUser;
use Illuminate\Support\Facades\Mail;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $from;
    private $to;
    private $subject;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($from, $subject, $to)
    {
        $this -> from = $from;
        $this -> to = $to;
        $this -> subject = $subject;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $correo = new WelcomeUser($this -> from, $this -> subject);
        Mail::to($this -> to)->send($correo);
    }
}
