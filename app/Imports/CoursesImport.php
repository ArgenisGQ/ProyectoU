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
            'name'              => $row['nombre'],
            'code'              => $row['codigo'],
            'section'           => $row['seccion'],
            'id_sima'           => $row['id_sima'],
            'id_continua'       => $row['id_continua'],
            'id_sima_doc'       => $row['id_sima_doc'],
            'id_continua_doc'   => $row['id_continua_doc'],
            'id_dpto'           => $row['id_dpto'],
            'id_faculty'        => $row['id_facultad'],

        ]);
    }

    public function rules(): array
    {
        return [
            'nombre'            => 'required',
            'codigo'            => 'required',
            'seccion'           => 'required',
            /* 'id_sima'           => 'required', */
            /* 'id_continua'       => 'required', */
            /* 'id_sima_doc'       => 'required', */
            /* 'id_continua_doc'   => 'required', */
            'id_dpto'           => 'required',
            'id_facultad'       => 'required'
        ];
    }

    public function getRowCount(): int
    {
        return $this->numRows;
    }
}
