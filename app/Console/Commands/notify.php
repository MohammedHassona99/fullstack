<?php

namespace App\Console\Commands;

use App\Mail\notifyEmail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class notify extends Command
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
    protected $description = 'Send Email notify for all users every day';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $emails = User::select('email')->get();
        // $email = User::pluck('email')->toArray();
        $data = ['title' => 'php', 'body' => 'native'];
        foreach ($emails as $email) {
            Mail::to($email)->send(new notifyEmail($data));
        }
    }
}
