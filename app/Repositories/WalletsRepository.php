<?php

namespace App\Repositories;

use App\Models\Wallet;

class WalletsRepository
{
    public function find(int $id)
    {
        return Wallet::where('id', $id)->get()->first();
    }

    public function findByUser(int $user_id)
    {
        return Wallet::where('user_id', $user_id)->get()->first();
    }

    public function updateValue(int $id, float $new_value )
    {
        $wallet = Wallet::find($id);
        $wallet->value = $new_value;
        $wallet->save();

        return $wallet;

    }

    public function create(array $attributes)
    {
        $wallet = Wallet::create([
            'user_id' => $attributes['user_id'],
            'value' => 0.0
        ]);

        return $wallet;
    }
}