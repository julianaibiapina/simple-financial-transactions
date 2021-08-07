<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\Wallet;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');

        Role::create(['name' => 'comum']);
        Role::create(['name' => 'lojista']);

        $comum_role = Role::where('name', 'comum')->first();
        $lojista_role = Role::where('name', 'lojista')->first();

        $usuario_comum = User::create([
            'name' => 'Exemplo Usuário Comum',
            'email' => 'exemplo1@email.com',
            'document_number' => '90698491009',
            'password' => Hash::make('123456')
        ]);

        $usuario_lojista = User::create([
            'name' => 'Exemplo Usuário Lojista',
            'email' => 'exemplo2@email.com',
            'document_number' => '03113004000174',
            'password' => Hash::make('123456')
        ]);

        $usuario_comum->roles()->attach($comum_role);
        $usuario_lojista->roles()->attach($lojista_role);

        $wallet_user_comum = Wallet::create([
            'user_id' => 1,
            'value' => 0.0,
        ]);

        $wallet_user_lojista = Wallet::create([
            'user_id' => 2,
            'value' => 0.0,
        ]);
    }
}
