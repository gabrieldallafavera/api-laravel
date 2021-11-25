<?php

namespace App\Http\Interfaces\User;

use App\Models\User;

interface IUserFind
{
    public function findLogin(string $email): ?User;
}
