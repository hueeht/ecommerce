<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class EmailFridayWeekly extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct()
    {

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $statistics = DB::table('orders')
            ->whereRaw('(created_at <= now()) and (day(now())-day(created_at))<=7')
            ->selectRaw('status, count(*) as quantity')
            ->groupBy('status')
            ->get();
        return $this->markdown('admin.emails.statistical_mail')
                    ->with([
                        'statistics' => $statistics,
                    ]);
    }
}
