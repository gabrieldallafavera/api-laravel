<?php

namespace App\Http\Interfaces\User;

use App\Models\User;

interface IUserStore
{
    public function store(array $fields): User;
}
