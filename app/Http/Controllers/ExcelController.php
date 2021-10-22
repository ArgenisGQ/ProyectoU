<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use App\Imports\UsersImport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class ExcelController extends Controller
{
    public function importForm(Request $request)
    {
        return view('admin.users.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required'
        ]);

        /* $file = $request->file('file');
            Excel::import(new UsersImport, $file); */

        try {


            $import = new UsersImport();
            Excel::import($import, request()->file('file'));


        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
             $fallas = $e->failures();

             foreach ($fallas as $falla) {
                 $falla->row(); // fila en la que ocurrió el error
                 $falla->attribute(); // el número de columna o la "llave" de la columna
                 $falla->errors(); // Errores de las validaciones de laravel
                 $falla->values(); // Valores de la fila en la que ocurrió el error.
             }



        }

        $falla = $falla;
        /* $request->file('file')->store(''); */

        $file = $request->file('file');

        /* seccion de guardado de archivo de respaldo */
        $nameFile = 'usuarios_'.now().'.'.$file->guessExtension();
        /* $request->file('file')->store('lista'); */
        /* $ruta = public_path("lista/".$nameFile); */
       /*  Storage::put('avatars/1', $file); */

        /* $request->file('file')->storeAs('', $nameFile); */
        $file->storeAs('','uno.xlsx');

        /* $ruta = public_path($nameFile);
        copy($file, $ruta); */

        /* seccion de importancion del xls a la base de dato */
        $import = new UsersImport();

        /* Excel::import($import, request()->file('file'));
        return view('admin.users.import', ['numRows'=>$import->getRowCount()]); */

        return view('admin.users.import', ['numRows'=>$import->getRowCount(), 'fallas'=>$falla->errors()]);




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
        Excel::load('usuarios.xlsx', function ($reader) {
            /**
             * $reader->get() nos permite obtener todas las filas de nuestro archivo
             */
            foreach ($reader->get() as $key => $row) {
                $usuarios = [
                    'name'     => $row['nombre'],
                    'ced'      => $row['cedula'],
                    'email'    => $row['email'],
                    'password' => $row['clave'],

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
