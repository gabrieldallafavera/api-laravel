<?php

namespace App\Repositories\User;

use App\Http\Interfaces\User\IUserStore;
use App\Models\User;

class UserStore implements IUserStore
{
    public function store($fields): User
    {
        return User::create($fields);
    }
}
