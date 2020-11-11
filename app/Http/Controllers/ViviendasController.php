<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vivienda;

class ViviendasController extends Controller
{
    public function index()
    {

        //dd($rol);
        return view('viviendas.index');//, compact('data'));
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
