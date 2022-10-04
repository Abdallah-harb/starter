<?php

namespace App\Console\Commands;

use App\Mail\NotifyEmail;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily email for students';

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
        //fetch email for all user

        //$users = User::select('email')->get();

        //or get email and put it on array

        $emails = User::pluck('email')->toArray();
        $data = ['title' => 'programming','body' => 'php'];
        foreach ($emails as $email){

            //send daily email

                // i take instanse from object of NotifyEmail  to pass data to blade
            Mail::to($email)->send(new NotifyEmail($data));

        }


    }
}
