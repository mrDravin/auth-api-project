<?php
namespace App\Http\Services\Interfaces;

use App\Http\Requests\LoginRequest;

interface LoginServiceInterface
{
    public function login(LoginRequest $request): array;
}
