<?php
namespace App\Http\Services\Interfaces;

use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;

interface RegisterServiceInterface
{
    public function register(RegisterRequest $request): UserResource;
}
