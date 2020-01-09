<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Throwable;

class NotFoundException extends Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        Log::emergency("Not found");
    }

    public function render($request)
    {
        return response()->view('404');
    }
}
