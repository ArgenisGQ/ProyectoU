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
        Excel::import($import, request()->file('file'));
        return view('admin.users.import', ['numRows'=>$import->getRowCount()]);
        /* return view('import', ['numRows'=>$import->getRowCount()]); */

        /* $file = $request->file('file');
        Excel::import(new UsersImport, $file);

        return back()->with('message', 'Importancion de usuarios completada'); */

        /* return view('admin.users.import'); */


        /* return $request->file('file'); */

        /* return $ruta; */

        /* return $nameFile; */
    }
}
