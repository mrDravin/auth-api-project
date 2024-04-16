<?php

namespace App\Http\Services;

use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Services\Interfaces\RegisterServiceInterface;

class RegisterService implements RegisterServiceInterface
{
    public function register(RegisterRequest $request): UserResource
    {
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        return new UserResource($user);
    }
}
