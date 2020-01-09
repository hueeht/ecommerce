<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Notifications\OrderNotification;
use App\Notifications\OrderStatusNotification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;

class OrderNotificationController extends Controller
{
    public function create()
    {
        return view('send_message');
    }

    public static function store(Order $order)
    {
        $user = Auth::user();
        $admin = User::find(2);
        $user_name = User::find($order->user_id)->name;
        $data = $order->only([
            'user_id',
            'id',
            'created_at'
        ]);
        $data['user_name'] = $user_name;
        $admin->notify(new OrderNotification($data));

        $options = array(
            'cluster' => 'ap1',
            'encrypted' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $pusher->trigger('OrderInfoNotification', 'send-order-info', $data);

    }

    public function markAll()
    {
        foreach (Auth::user()->notifications as $notification)
        {
            $notification->markAsRead();
        }
        return redirect()->back();
    }

    public function mark($id)
    {
        foreach (Auth::user()->notifications as $notification)
        {
            if ($id == $notification->data['id']) {
                $notification->markAsRead();
            }
        }
        return redirect()->route('home.orders.detail', $id);
    }
}
