<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Maatwebsite\Excel\Facades\Excel;
use App\Imports\CtaContImport;

class ImportCtaContController extends Controller
{
    public function index()
     {
         return view('import.ctacont.index');
     }
     public function importCtaContCsv(Request $request)
     {

         $file = $request->file('file');
         Excel::import(new CtaContImport, $file);

         flash('Cuentas Contables Cargados')->success();

         return view('import.ctacont.index');
     }
}
