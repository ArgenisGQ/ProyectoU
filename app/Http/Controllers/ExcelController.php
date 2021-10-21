<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use App\Imports\UsersImport;

class ExcelController extends Controller
{
    public function importForm(Request $request)
    {
        return view('admin.users.import');
    }

    public function import(Request $request)
    {
        $import = new UsersImport();
        Excel::import($import, request()->file('profesores.xlsx'));
        return view('import', ['numRows'=>$import->getRowCount()]);

        /* $file = $request->file('file');
        Excel::import(new UsersImport, $file);

        return back()->with('message', 'Importancion de usuarios completada'); */

        /* return view('admin.users.import'); */
    }
}
