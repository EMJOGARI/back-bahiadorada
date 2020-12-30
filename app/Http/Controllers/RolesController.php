<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{

    public function index()
    {
        $roles=Role::all();
        //dd($rol);
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = DB::table('permissions')
                ->orderBy('module')
                ->get(); 
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);
        $roles = Role::create($request->except(['permissions']));
        $roles->syncPermissions($request->input('permissions', []));
        return redirect('/roles');
    }
    
    public function edit($id)
    {
        $id = decrypt($id);
        $roles = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('roles.edit', compact('roles','permissions'));
    }

    public function update(Request $request, $id)
    {
        $id = decrypt($id);
        $roles = Role::findOrFail($id);
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
        ]);
        $roles->update($request->except(['permissions']));
        $roles->syncPermissions($request->input('permissions', []));

        return redirect('/roles');
    }

    public function destroy($id)
    {
        $id = decrypt($id);
        $roles = Role::findOrFail($id);

        if ($roles->delete()) {
            return redirect('/roles');
        }

        return response()->json([
            'mensaje' => 'Error al eliminar el Rol.'
        ]);
    }
}
