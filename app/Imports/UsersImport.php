<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel, WithValidation, WithHeadingRow
{
    private $numRows = 0;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        ++$this->numRows;

        return new User([
            'userName'      => $row['usuario'],
            'name'          => $row['nombre'],
            'lastName'      => $row['apellido'],
            'ced'           => $row['cedula'],
            'email'         => $row['email'],
            'password'      => $row['clave'],
            'id_sima'       => $row['id_sima'],
            'id_continua'   => $row['id_continua'],
        ]);
    }

    public function rules(): array
    {
        return [
            'usuario'       => 'required|unique:users,userName',
            'nombre'        => 'required',
            'apellido'      => 'required',
            'cedula'        => 'numeric|required|unique:users,ced|digits_between:6,10',
            'email'         => 'required|email|unique:users,email',
            'clave'         => 'required',
            'id_sima'       => 'numeric|required|unique:users,id_sima',
            'id_continua'   => 'numeric|required|unique:users,id_continua'
        ];
    }

    public function getRowCount(): int
    {
        return $this->numRows;
    }
}
