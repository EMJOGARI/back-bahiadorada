<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Maatwebsite\Excel\Facades\Excel;
use App\Imports\ViviendaImport;

class ImportViviendasController extends Controller
{
    public function index()
    {
        return view('import.vivienda.index');
    }
    public function importViviendaCsv(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new ViviendaImport, $file);

        flash('Viviendas Cargadas')->success();

        return view('import.vivienda.index');
    }
}
