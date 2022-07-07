<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new User([
            'name' => $row[0],
            'cpf' => $row[1],
            'role_id' => $row[2],
            'operation_id' => $row[3],
            'is_admin' => $row[4],
            'email' => $row[5],
            'password' => bcrypt($row[6]),
        ]);
    }
}
