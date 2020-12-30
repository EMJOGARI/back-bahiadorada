<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{

    public function index()
    {
        $permissions=Permission::all();
        //dd($rol);
        return view('permisos.index', compact('permissions'));
    }

    public function create()
    {
        return view('permisos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
            'module' => 'required',
        ]);
        Permission::create($request->all());
        return redirect('/permisos');
    }

    public function edit($id)
    {
        $id = decrypt($id);
        $permissions = Permission::findOrFail($id);
        return view('permisos.edit', compact('permissions'));
    }

    public function update(Request $request, $id)
    {
        $id = decrypt($id);
        $permissions = Permission::findOrFail($id);
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $id,
            'module' => 'required',
        ]);
        $permissions->update($request->all());
        return redirect('/permisos');
    }

    public function destroy($id)
    {
        $id = decrypt($id);
        $permissions = Permission::findOrFail($id);

        if ($permissions->delete()) {
            return redirect('/permisos');
        }

        return response()->json([
            'mensaje' => 'Error al eliminar el Permiso.'
        ]);
    }
}
