<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nome' => 'admin',
            'cpf' => '111.111.111-11',
            'cargo_id' => '1',
            'operacao_id' => '1',
            'is_admin' => '1',
            'email' => 'admin@admin',
            'password' => bcrypt('123')
        ]);
    }
}
