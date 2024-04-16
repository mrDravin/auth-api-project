<?php
namespace App\Http\Services;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Services\Interfaces\LoginServiceInterface;

class LoginService implements LoginServiceInterface
{
    public function login(LoginRequest $request): array
    {
        $user = User::where('email', $request->get('email'))->first();

        if (!$user || !Hash::check($request->get('password'), $user->password)) {
            return [
                'message' => 'Invalid credentials',
            ];
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => new UserResource($user),
        ];
    }
}
