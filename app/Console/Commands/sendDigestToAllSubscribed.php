<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Mail\DigestMail;
use Illuminate\Support\Facades\Mail;

class sendDigestToAllSubscribed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:sendDigestToAllSubscribed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send KM4AANR weekly digest to all subscribed users.';

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
        foreach(User::all()->where('subscribed', '=', '1') as $subscriber){
            Mail::to($subscriber->email)->send(new DigestMail());
        }
    }
}
