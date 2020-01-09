<?php

namespace App\Http\Controllers\Client;

use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use App\Repositories\Client\ProfileRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    protected $profile_repository;

    public function __construct(ProfileRepositoryInterface $profileRepository)
    {
        $this->profile_repository = $profileRepository;
    }

    public  function  index()
    {
        return view ('client.profiles.index');
    }

    public function edit()
    {
        return view ('client.profiles.edit');
    }

    public function update(Request $request, $id)
    {
        try {
            $profile = $this->profile_repository->find($id);
        } catch (NotFoundException $exception) {
            throw $exception;
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->phone = $request->phone;
        $profile->address = $request->address;
        $profile->update();

        return redirect()->route('profile')->with('edited', 'Your account is edited.');
    }
}
