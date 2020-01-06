<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{
    public function index($id)
    {
        $product = Product::findOrFail($id);
        return view('client.rate.index', compact('product'));
    }

    public function submit(Request $request, $id)
    {
        $rate = [];
        $rate['rating'] = $request->rateOption;
        $rate['user_id'] = Auth::user()->id;
        $rate['product_id'] = $id;
        $rate['status'] = "Pending";
        Rate::create($rate);
        return redirect()->route('home.products.detail', $id)->with('success', 'Your review is pending.');
    }
}
