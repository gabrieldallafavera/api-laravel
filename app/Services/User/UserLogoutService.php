<?php

namespace App\Services\User;

use App\Http\Interfaces\User\IUserLogout;
use Illuminate\Support\Facades\Auth;

class UserLogoutService implements IUserLogout
{
    public function logout(): void
    {
        Auth::logout();
    }
}
