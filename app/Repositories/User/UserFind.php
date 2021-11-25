<?php

namespace App\Repositories\User;

use App\Http\Interfaces\User\IUserFind;
use App\Models\User;

class UserFind implements IUserFind
{
    public function findLogin(string $email): ?User
    {
        return User::where('email', $email)->first();
    }
}
