<?php

namespace App\Imports;

use App\Models\Course;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;

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
            /* 'name'              => $row['nombre'],
            'code'              => $row['codigo'],
            'section'           => $row['seccion'],
            'id_sima'           => $row['id_sima'],
            'id_continua'       => $row['id_continua'],
            'id_sima_doc'       => $row['id_sima_doc'],
            'id_continua_doc'   => $row['id_continua_doc'],
            'id_dpto'           => $row['id_dpto'],
            'id_faculty'        => $row['id_facultad'], */

            'name'              => $row[0],
            'code'              => $row[1],
            'section'           => $row[2],
            'id_sima'           => $row[3],
            'id_continua'       => $row[4],
            'id_sima_doc'       => $row[5],
            'id_continua_doc'   => $row[6],
            'id_dpto'           => $row[7],
            'id_faculty'        => $row[8],
            'slug'              => Str::slug($row[1]),

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
