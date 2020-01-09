<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class EmailDaily extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $orders = DB::table('orders')
            ->whereRaw('(updated_at <= now()) and (status = "Waiting")')
            ->selectRaw('*')
            ->get();

        return $this->markdown('client.emails.order_mail')
            ->with([
                'orders' => $orders,
            ]);
    }
}
