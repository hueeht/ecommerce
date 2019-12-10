<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Suggest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class SuggestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $suggests = Suggest::all();
        return view('admin.suggests.index', compact('suggests'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request)
    {
        try {

            $suggest = Suggest::findOrFail($request->id);
            $suggest->status = $request->status;
            $suggest->save();
            return response()->json(['status' => $request->status], 200);
        }
        catch (ModelNotFoundException $e)
        {
            echo $e->getMessage();
        }
    }

}
