<?php

namespace App\Http\Controllers;

use App\Services\Auth\AuthService;
use App\Services\UserService;
use Fixture\PHP74\Regression\Issue1402\Service;

class BaseController extends Controller
{
    public $auth_service;
    public $user_service;

    public function __construct(
        AuthService $auth_service,
        UserService $user_service
    )
    {
        $this->auth_service = $auth_service;
        $this->user_service = $user_service;
    }
}
