<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Client\CategoryController;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        return view('client.index');
    }
}
