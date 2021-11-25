<?php

namespace App\Http\Interfaces\User;

interface IUserLogin
{
    public function login(array $fields): array;
}
