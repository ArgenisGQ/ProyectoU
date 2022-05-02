<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Monolog\Handler\IFTTTHandler;
/* use Illuminate\Support\Facades\Auth; */


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

        /* return $request; */



        $this->validate($request, [
            'userName'      => 'required',
            'name'          => 'required',
            'lastName'      => 'required',
            'ced'           => 'numeric|required|unique:users|digits_between:6,10',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|same:confirm-password',
            /* 'file' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048', */

        ]);

        /* return $request->file('file'); */

        $data = request()->all();

        /* return $data; */
        /* return $request; */

        $user = User::create([
            'userName'          => $data['userName'],
            'name'              => $data['name'],
            'lastName'          => $data['lastName'],
            'ced'               => $data['ced'],
            'email'             => $data['email'],
            'password'          => bcrypt($data['password']),
            'id_sima'           => $data['id_sima'],
            'id_continua'       => $data['id_continua'],
        ]);



        if ($request->file('file')) {
            $url = Storage::put('public/user_photo', $request->file('file'));

            $user->image()->create([
                /* 'profile_photo_path' => $url */
                'url' => $url
            ]);
        }

       /*  return $user; //test de subir imagen */

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
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
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

        /* return $user; */

        $this->validate($request, [
            'name' => 'required',
            /* 'email' => "required|email|unique:users,email,$user->email", */
            'password' => "same:confirm-password"
            /* ,'role' => 'required' */
        ]);

        $input = $request->all();

        /* return $request; */
        /* return $input; */
        /* return $user; */


        //PARA ACTUALIZAR FOTO
        if ($request->hasFile('image')) {
            if ($user->image != null) {
                Storage::disk('images')->delete($user->image->path);
                $user->image->delete();
            }

            $user->image()->create([
                'path' => $request->image->store('users', 'images'),
            ]);
        }





        //----------------------
        /* return $input;  */

        //PARA ACTUALIZAR PASSWORD -
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
            $user = User::find($user->id);
            $user->password = $input['password'];
            $user->save();
        }else{
            $input = Arr::except($input, ['password']);
        }


       /*  return $input; */

        /* return $user; */

        $user = User::find($user->id);
        /* $user->password = $input['password']; */
        /* $user->save(); */



        /* $user->update([$input]); */

        $user->update([
            'userName' =>           $input['userName'],
            'name' =>               $input['name'],
            'email' =>              $input['email'],
            'ced' =>                $input['ced'],
            ]);
        /* $user->save([$input]);
 */



        /* return $user; */

        DB::table('model_has_roles')->where('model_id', $user)->delete();

        return redirect()->route('admin.users.edit', $user)->with('info', 'Se editaron los datos con exito'); //
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
