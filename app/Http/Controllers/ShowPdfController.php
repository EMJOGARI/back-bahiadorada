<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pdf;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ShowPdfController extends Controller
{
    public function index()
    {
        $data = DB::table('file')->get();
        return view('files-and-document.index', compact('data'));
    }

    public function ShowGestionAdministrativa()
    {
        $data = DB::table('file')
            ->where('category','Gestion Administrativa')
            ->get();
        return view('files-and-document.gestion-administrativa.index', compact('data'));
    }

    public function ShowTalentoHumano()
    {
        $data = DB::table('file')
            ->where('category','Talento Humano')
            ->get();
        return view('files-and-document.talento-humano.index', compact('data'));
    }

    public function ShowComunicados()
    {
        $data = DB::table('file')
            ->where('category','Comunicados')
            ->get();
        return view('files-and-document.comunicados.index', compact('data'));
    }

    public function ShowNormasyReglamentos()
    {
        $data = DB::table('file')
            ->where('category','Normas y Reglamentos')
            ->get();
        return view('files-and-document.normas-y-reglamentos.index', compact('data'));
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
                'category'  => 'required',
                'file'  => 'required|mimes:pdf'
            ],
            [
                'name.required' => 'El Nombre del documento es requerido',
                'category.required' => 'Indique la categoria',
                'file.required' => 'Documento requerido',
                'file.mimes' => 'Tipo de archivo permitido es PDF'
            ]);

            //obtenemos el campo file definido en el formulario
            $file = $request->file('file')->store('filepdf');
            //obtenemos el nombre del archivo]
            $file2 = $request->file('file');
            $original = $file2->getClientOriginalName();

            $data = Pdf::create([
                'name' => $request->name,
                'category' => $request->category,
                'description' => $request->description,
                'name_original' => $original,
                'link' => $file,
            ]);
            $data->save();

           flash('Documento Guardado')->success();
        }catch(\Exception $e){
            dd($e);
            flash('Error al cargar el archivo'. $request->file)->warning();
        }
        return view('pdf-import.index');
    }

    public function destroy($id)
    {
        $id = decrypt($id);
        $pdf = Pdf::findOrFail($id);
        $pdf->delete();
        flash('Documento Eliminado')->success();
        return redirect()->back();
    }
}
