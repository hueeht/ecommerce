<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use App\Models\User;
use App\Repositories\Rate\RateRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class RateController extends Controller
{
    protected $rateRepository;
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository, RateRepositoryInterface $rateRepository)
    {
        $this->userRepository = $userRepository;
        $this->rateRepository = $rateRepository;
    }

    public function index()
    {
        $rates = $this->rateRepository->getAll();
        $users = $this->userRepository->getAll();
        return view('admin.rates.index', compact('rates', 'users'));
    }

    public function update(Request $request, $id)
    {
        $rate = $this->rateRepository->find($id);
        $rate->status = $request->status;
        $rate->save();
        return redirect()->route('admin.rates.index');

    }
}
