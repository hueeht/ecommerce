<?php

namespace App\Console\Commands;

use App\Jobs\SendMailDaily;
use Illuminate\Console\Command;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:day';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email about the list of orders that have not been checked on day';

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
        SendMailDaily::dispatch();
    }
}
