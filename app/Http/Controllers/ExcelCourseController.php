<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Course;
use App\Imports\CoursesImport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class ExcelCourseController extends Controller
{
    public function __construct()
    {
       /*  $this->middleware('can:admin.users.import')->only('importForm','create','importExcel'); */

    }


    public function importForm(Request $request)
    {

        /* $alert = 'pagina importForm';
        return $alert; */

        return view('admin.courses.import');
    }

    public function import(Request $request)
    {
        /* $alert = 'pagina import';
        return $alert; */


        $request->validate([
            'file' => 'required'
        ]);

        /* $file = $request->file('file');
            Excel::import(new UsersImport, $file); */
        /* return "aqui"; */


        try {


            $import = new CoursesImport();

            /* dd (request()->file('file')); */

            /* return "primer nivel"; */

            Excel::import($import, request()->file('file'));

            /* return "segundo nivel"; */

            $file = $request->file('file');

            $nameFile = 'materias_'.date("Y-m-d_H-i-s").'.'.$file->guessExtension();

            $file->storeAs('',$nameFile);

            /* $import = new CoursesImport(); */



            return view('admin.courses.import', ['numRows'=>$import->getRowCount()]);


        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
             $fallas = $e->failures();

             foreach ($fallas as $falla) {
                 $falla->row(); // fila en la que ocurrió el error 
                 $falla->attribute(); // el número de columna o la "llave" de la columna
                 $falla->errors(); // Errores de las validaciones de laravel
                 $falla->values(); // Valores de la fila en la que ocurrió el error.
             }



             return view('admin.courses.import', ['numRows'=>$import->getRowCount(), 'fallas'=>$falla->errors()]);



        }

        /* $fallas = $falla; */  /* ++++ */

        /* $request->file('file')->store(''); */

        /* $file = $request->file('file'); */  /* ++++ */

        /* seccion de guardado de archivo de respaldo */
        /* $nameFile = 'usuarios_'.date("Y-m-d_H-i-s").'.'.$file->guessExtension(); */ /* ++++ */


        /* $request->file('file')->store('lista'); */
        /* $ruta = public_path("lista/".$nameFile); */
        /*  Storage::put('avatars/1', $file); */

        /* $request->file('file')->storeAs('', $nameFile); */

        /* $file->storeAs('',$nameFile); */  /* ++++ */


        /* $ruta = public_path($nameFile);
        copy($file, $ruta); */

        /* seccion de importancion del xls a la base de dato */
        /* $import = new UsersImport(); */  /* ++++ */

        /* Excel::import($import, request()->file('file'));
        return view('admin.users.import', ['numRows'=>$import->getRowCount()]); */


        /* ++++ */
        /* return view('admin.users.import', ['numRows'=>$import->getRowCount(), 'fallas'=>$fallas->errors()]); */
        /* ++++ */



        /* $file = $request->file('file');
        Excel::import(new UsersImport, $file);

        return back()->with('message', 'Importancion de usuarios completada'); */

        /* return view('admin.users.import'); */


        /* return $request->file('file'); */

        /* return $falla->errors(); */

        /* return $nameFile; */
    }

    public function importExcel()
    {
        /** El método load permite cargar el archivo definido como primer parámetro */
        Excel::load('materias.xlsx', function ($reader) {
            /**
             * $reader->get() nos permite obtener todas las filas de nuestro archivo
             */
            foreach ($reader->get() as $key => $row) {
                $usuarios = [
                    /* 'name'     => $row['nombre'],
                    'ced'      => $row['cedula'],
                    'email'    => $row['email'],
                    'password' => $row['clave'], */

                    'name'              => $row['nombre'],
                    'code'              => $row['codigo'],
                    'section'           => $row['seccion'],
                    'id_sima'           => $row['id_sima'],
                    'id_continua'       => $row['id_continua'],
                    'id_sima_doc'       => $row['id_sima_doc'],
                    'id_continua_doc'   => $row['id_continua_doc'],
                    'id_dpto'           => $row['id_dpto'],
                    'id_faculty'        => $row['id_facultad'],

                ];
                /** Una vez obtenido los datos de la fila procedemos a registrarlos */
                /* if (!empty($producto)) {
                    DB::table('productos')->insert($producto);
                } */
            }

            /* echo 'Los productos han sido importados exitosamente'; */
        });

        return ;
    }
}
