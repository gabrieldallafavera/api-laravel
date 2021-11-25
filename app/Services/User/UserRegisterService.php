<?php

namespace App\Services\User;

use App\Http\Interfaces\User\IUserRegister;
use App\Http\Interfaces\User\IUserStore;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRegisterService implements IUserRegister
{
    private IUserStore $userStore;

    public function __construct(IUserStore $userStore)
    {
        $this->userStore = $userStore;
    }

    public function register(array $fields): User
    {
        return $this->userStore->store($fields);
    }
}
