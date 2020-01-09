<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Suggest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuggestController extends Controller
{
    protected $suggest;

    public function __construct(Suggest $suggest)
    {
        $this->suggest = $suggest;
    }

    public function index()
    {
        return view('client.suggest.index');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);
        $attributes = $request->only(
            'name', 'price','description'
        );
        $user_id = Auth::user()->id;
        $attributes['user_id'] = $user_id;
        $attributes['status'] = 'Waiting';
        $this->suggest->create($attributes);

        return redirect()->route('home.suggest')->with('success','Your suggestion is in waiting status');
    }
}
