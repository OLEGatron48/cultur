<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends BaseController
{
    public function register(RegisterRequest $request) {
        $request = $request->validated();

       $response = $this->auth_service->register($request);

       return response()->json($response, $response['status']);
    }

    public function login(LoginRequest $request) {
        $request = $request->validated();

        $response = $this->auth_service->login($request);

        return response()->json($response, $response['status']);
    }


    public function logout() {
        auth()->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout out successfully']);
    }
}
