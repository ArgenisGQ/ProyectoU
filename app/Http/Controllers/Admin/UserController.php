<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.edit')->only('edit', 'update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* $role = Role::pluck('name', 'name')->all(); */

        $roles = Role::all();


        /* return $role; */

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* $user = request()->all; */



        $this->validate($request, [
            'name' => 'required',
            'ced' => 'numeric|required|unique:users|digits_between:6,8',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',

        ]);


        $data = request()->all();

        $user = User::create([
            'name' => $data['name'],
            'ced' => $data['ced'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        $user->roles()->sync($request->roles);

        /* $user->roles()->sync($request->role); */

        /* $user->assignRole($request->input['roles']); */

        /* $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create ([$input]);
        $user->assignRole($request->input('role')); */

        /* $user = $request; */

        return redirect()->route('admin.users.index')->with('info', 'El usuario se agrego con exito');

        /* $user = $data;

        return $user; */


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        $users = User::find($user);

        return view('admin.users.edit', compact('user', 'roles'));

        /* return $user; */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $user->roles()->sync($request->roles); //

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email'.$user,
            'password' => 'same:confirm-password',
            /* 'role' => 'required' */
        ]);

        $input = $request->all();

        if(!empty($input('password'))){
            $input['password'] = Hash::make($input('password'));
        }else{
            $input = Arr::except($input, ['password']);
        }

        $user = User::find($user);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $user)->delete();

        return redirect()->route('admin.users.edit', $user)->with('info', 'Se asigno los roles correspondientes'); //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        User::find($user)->delete();

        /* return redirect()->route('admin.users.index'); */

        /* $user->delete(); */

        return redirect()->route('admin.users.index')->with('info', 'El usuario se elimino con exito');
    }
}
