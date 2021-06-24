<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pdf;
use Illuminate\Support\Facades\Storage;

class ShowPdfController extends Controller
{
    public function index()
    {
        $data = DB::table('file')->get();
        return view('pdf.index', compact('data'));
    }

    public function showPdf()
    {
        return view('pdf-import.index');
    }
    public function importPdf(Request $request)
    {
        try{
           $this->validate($request, [
                'name'  => 'required',
                'file'  => 'required|mimes:pdf'
            ],
            [
                'name.required' => 'El Nombre del documento es requerido',
                'file.required' => 'Documento requerido',
                'file.mimes' => 'Tipo de archivo permitido es PDF'
            ]);

            //obtenemos el campo file definido en el formulario
            $file = $request->file('file')->store('filepdf');
            //obtenemos el nombre del archivo]
            $file2 = $request->file('file');
            $original = $file2->getClientOriginalName();

            $name = $request->name;
            $description = $request->description;

            $data = Pdf::create([
                'name' => $name,
                'description' => $description,
                'name_original' => $original,
                'link' => $file,
            ]);
            $data->save();

           flash('Documento Guardado')->success();
        }catch(\Exception $e){
           flash('Error al cargar el archivo'. $request->file)->warning();
        }
        return view('pdf-import.index');
    }
}
