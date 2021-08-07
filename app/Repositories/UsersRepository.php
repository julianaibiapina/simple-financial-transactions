<?php

namespace App\Repositories;

use App\Models\User;

class UsersRepository
{
    public function find(int $id)
    {
        return User::where('id', $id)->get()->first();
    }
    
}