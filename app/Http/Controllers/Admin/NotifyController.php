<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Order\OrderRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
class NotifyController extends Controller
{
    public function readAll()
    {
        $user = Auth::user();
        $user->unreadNotifications->markAsRead();
        return redirect()->route('admin.index');
    }

    public function viewAndRead($id)
    {
        $user = Auth::user();
        foreach ($user->unreadNotifications as $notification)
        {
            if ($notification->data['id'] == $id)
            {
                $notification->markAsRead();
                return redirect()->route('admin.orders.show', $id);
            }
        }
    }
}
