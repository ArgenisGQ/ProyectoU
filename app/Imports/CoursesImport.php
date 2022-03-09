<?php

namespace App\Imports;

use App\Models\Course;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CoursesImport implements ToModel
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

        return new Course([
            'name'     => $row['nombre'],
            'ced'      => $row['cedula'],
            'email'    => $row['email'],
            'password' => $row['clave'],
        ]);
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required',
            'cedula' => 'numeric|required|unique:users,ced|digits_between:6,10',
            'email' => 'required|email|unique:users,email',
            'clave' => 'required'
        ];
    }

    public function getRowCount(): int
    {
        return $this->numRows;
    }
}
