<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    private $numRows = 0;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name'     => $row[0],
            'ced'      => $row[1],
            'email'    => $row[2],
            'password' => $row[3],
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'ced' => 'numeric|required|unique:users|digits_between:6,8',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
        ];
    }

    public function getRowCount(): int
    {
        return $this->numRows;
    }
}
