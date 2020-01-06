<?php

namespace App\Console\Commands;

use App\Mail\EmailFridayWeekly;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailFriday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:week';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send statistical email on Friday weekly';

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
        Mail::to("cxchtc1998@gmail.com")->send(new EmailFridayWeekly());
    }
}
