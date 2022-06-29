<?php

use App\User;
use Illuminate\Database\Seeder;

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
            'name' => 'Admin',
            'cpf' => '111.111.111-11',
            'role_id' => '1',
            'operation_id' => '1',
            'is_admin' => '1',
            'email' => 'admin@admin',
            'password' => bcrypt('123')
        ]);
    }
}
