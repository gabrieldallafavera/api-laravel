<?php

namespace App\Services\User;

use App\Exceptions\Auth\CredentialWrongException;
use App\Http\Interfaces\User\IUserFind;
use App\Http\Interfaces\User\IUserLogin;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Hash;

class UserLoginService implements IUserLogin
{
    private IUserFind $userFind;

    public function __construct(IUserFind $userFind)
    {
        $this->userFind = $userFind;
    }

    public function login(array $fields): array
    {
        $user = $this->userFind->findLogin($fields['email']);
        if (is_null($user) || !Hash::check($fields['password'], $user->password)) {
            throw new CredentialWrongException();
        }
        $token = JWT::encode(['email' => $fields['email']], env('JWT_KEY'));

        return ['user' => $user, 'token' => $token];
    }
}
