<?php

namespace App\Imports;

use App\Models\User_course;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UserCourseImport implements ToModel, WithValidation, WithHeadingRow
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

        return new User_course([
            'code'              => $row['codigo'],
            'course'            => $row['materia'],
            'section'           => $row['seccion'],
            'ced'               => $row['cedula'],
            /* 'ced_user'          => $row['cedula'], */
            'name'              => $row['profesor'],
            /* 'id_sima_doc'       => $row['id_sima_doc'],
            'id_continua_doc'   => $row['id_continua_doc'],
            'id_dpto'           => $row['id_dpto'],
            'id_faculty'        => $row['id_facultad'],
            'slug'              => Str::slug('codigo'), */

        ]);
    }

    public function rules(): array
    {
        return [
            'codigo'            => 'required',
            'materia'           => 'required',
            'seccion'           => 'required',
            'cedula'            => 'required',
            'profesor'          => 'required',
            /* 'id_sima_doc'       => 'unique:courses,id_sima_doc',
            'id_continua_doc'   => 'unique:courses,id_continua_doc',
            'id_dpto'           => 'unique:courses,id_dpto',
            'id_facultad'       => 'unique:courses,id_faculty', */

        ];
    }

    public function getRowCount(): int
    {
        return $this->numRows;
    }
}
