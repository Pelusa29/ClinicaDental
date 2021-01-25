<?php

namespace App\Imports;

use App\user;
use Illuminate\Support\Facades\Hash;
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
        return new user([
            'name'=> $row[0],
            'dob' => $row[1],
            'email' => $row[2],
            'password' => Hash::make($row[3]),
        ]);
    }
}
