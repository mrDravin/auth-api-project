<?php
namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\http\Services\LoginService;
use App\Http\Services\RegisterService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $registerService;
    private $loginService;

    public function __construct(RegisterService $registerService, LoginService $loginService)
    {
        $this->registerService = $registerService;
        $this->loginService = $loginService;
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->registerService->register($request);

        return response()->json([
            'user' => $user,
        ]);
    }

    public function login(LoginRequest $request)
    {
        $response = $this->loginService->login($request);

        return response()->json($response);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out',
        ]);
    }
}
