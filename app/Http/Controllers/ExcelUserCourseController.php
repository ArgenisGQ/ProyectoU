<?php

namespace App\Http\Controllers;

use App\Models\User_course;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UserCourseImport;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Models\User;
use Illuminate\Support\Str;

class ExcelUserCourseController extends Controller
{
    public function __construct()
    {
       /*  $this->middleware('can:admin.users.import')->only('importForm','create','importExcel'); */

    }


    public function importForm(Request $request)
    {

        /* $alert = 'pagina importForm';
        return $alert; */

        return view('admin.usercourses.import');
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


            $import = new UserCourseImport();

            /* dd (request()->file('file')); */

            /* return "primer nivel"; */

            Excel::import($import, request()->file('file'));

            /* return "segundo nivel"; */

            $file = $request->file('file');

            /* return $file; */

            $nameFile = 'usuarios_a_materias_'.date("Y-m-d_H-i-s").'.'.$file->guessExtension();

            $file->storeAs('',$nameFile);

            /* $import = new CoursesImport(); */



            return view('admin.usercourses.import', ['numRows'=>$import->getRowCount()]);


        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
             $fallas = $e->failures();

             foreach ($fallas as $falla) {
                 $falla->row(); // fila en la que ocurrió el error
                 $falla->attribute(); // el número de columna o la "llave" de la columna
                 $falla->errors(); // Errores de las validaciones de laravel
                 $falla->values(); // Valores de la fila en la que ocurrió el error.
             }


             return view('admin.usercourses.import', ['numRows'=>$import->getRowCount(), 'fallas'=>$falla->errors()]);


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

    public function alls()
    {
        $totals = User_course::all();



        /* $total_courses = $total_courses; */

        /* return $total_courses; */

        return view('admin.usercourses.analisys', compact('totals'));
    }

    public function courses()
    {
        $courses = User_course::all();
        $total_courses = $courses->unique('code');
        /* $total_courses = $courses; */

        try {
            foreach ($total_courses as $total_course) {

                $user = Course::create([
                    'name' => $total_course->course,
                    'code' => $total_course->code,
                    'section' => $total_course->code.' '.$total_course->section,
                    'turma' => $total_course->section,
                    'slug' => Str::slug($total_course->code),

                ]);

            }




        } catch (\Maatwebsite\Excel\Validators\ValidationException\Exception $e) {
                $fallas = $e->failures();

                foreach ($fallas as $falla) {
                    $falla->row(); // fila en la que ocurrió el error
                    $falla->attribute(); // el número de columna o la "llave" de la columna
                    $falla->errors(); // Errores de las validaciones de laravel
                    $falla->values(); // Valores de la fila en la que ocurrió el error.
                }


            /* return response()->json(['message' => 'Error']); */
            return $fallas;
        };


        /* $total_courses = $total_courses; */

        /* return $total_courses; */

        return view('admin.usercourses.analisyscourses', compact('total_courses'));
    }

    public function users()
    {
        $users = User_course::all();
        $total_users = $users->unique('ced');

        /* return $users->ced; */

        try {
            foreach ($total_users as $total_user) {

                $user = User::create([
                    'name' => $total_user->name,
                    'ced' => $total_user->ced,

                    'userName' => 'V-'.$total_user->ced,

                    'lastName' => 'sistema',
                    'email' => 'V-'.$total_user->ced.'@uny.edu.ve',

                    'password' => bcrypt('Yacambu')

                ]);

            }




        } catch (\Maatwebsite\Excel\Validators\ValidationException\Exception $e) {
                $fallas = $e->failures();

                foreach ($fallas as $falla) {
                    $falla->row(); // fila en la que ocurrió el error
                    $falla->attribute(); // el número de columna o la "llave" de la columna
                    $falla->errors(); // Errores de las validaciones de laravel
                    $falla->values(); // Valores de la fila en la que ocurrió el error.
                }


            /* return response()->json(['message' => 'Error']); */
            return $fallas;
        }
        /* return response()->json(['message' => 'Success']); */


        /* return $total_courses; */

        return view('admin.usercourses.analisysusers', compact('total_users'));
    }
}
