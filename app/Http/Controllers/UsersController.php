<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware(['permission:user.create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:user.read'], ['only' => 'index']);
        $this->middleware(['permission:user.update'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:user.deleter'], ['only' => 'delete']);
    }
    */
    public function index()
    {
        $users=User::all();
        return view('usuarios.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');
        return view('usuarios.create', compact('roles'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'password'  => 'required',
            'email'     => 'required|unique:users,email',
        ]);
        $usuario = User::create($request->all());
        $usuario->password = bcrypt($request->password);

        if ($usuario->save()) {
          // asignar el rol
          $usuario->assignRole($request->rol);

          return redirect('/usuarios');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $id = decrypt($id);
        $usuario = User::findOrFail($id);
        $roles = Role::all()->pluck('name', 'id');

        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $id = decrypt($id);
        $usuario = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id
        ]);
        $usuario->update($request->except(['password']));
        if ($request->password != null) {
            $usuario->password = bcrypt($request->password);
        }
        $usuario->syncRoles([$request->rol]);
        $usuario->save();

        return redirect('/usuarios');
    }

    public function destroy($id)
    {
        $id = decrypt($id);
        $usuario = User::findOrFail($id);

        $usuario->removeRole($usuario->roles->implode('name', ', '));

        if ($usuario->delete()) {
            return redirect('/usuarios');
        }

        return response()->json([
            'mensaje' => 'Error al eliminar el usuario.'
        ]);
    }

    public function profileEdit($id){
        $id = decrypt($id);
        $user = User::findOrFail($id);

        return view('user.edit', compact('user'));
    }

    public function profileUpdate(Request $request, $id)
    {
        $id = decrypt($id);
        $usuario = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id
        ]);
        $usuario->update($request->except(['password']));
        if ($request->password != null) {
            $usuario->password = bcrypt($request->password);
        }
        $usuario->save();

        return redirect()->back()->with('message', trans('adminlte_lang::message.updatesuccess'));
    }
}
