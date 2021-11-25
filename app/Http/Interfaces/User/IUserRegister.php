<?php

namespace App\Http\Interfaces\User;

use App\Models\User;

interface IUserRegister
{
    public function register(array $fields): User;
}
