<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function me(Request $request)
    {
        return response()->json(auth()->user());
    }
}
