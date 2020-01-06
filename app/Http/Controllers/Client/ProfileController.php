<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public  function  index()
    {
        /*$orders = DB::table('orders')
            ->where('user_id', '=' , Auth::user()->id)
            ->get();
        $details = Order::find($orders->id)->orderDetails;
        $products = Product::all();*/
        return view ('client.profiles.index');
    }

    public function edit()
    {
        return view ('client.profiles.edit');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->update();
        return redirect()->route('profile')->with('edited', 'Your account is edited.');
    }
}
