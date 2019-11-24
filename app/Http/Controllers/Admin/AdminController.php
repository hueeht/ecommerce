<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
}
