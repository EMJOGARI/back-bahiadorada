<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SisVentas\Charts\MosososChart;
use App\User;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */

     /*
      $data_pag = [];
    $data_pen = [];
    $mes = [];
    foreach($egreso as $ven){
        $mes[] = $ven->nombre;
        $data_pag[] = $ven->total;
    }
    foreach($ingreso as $comp){
        $data_pen[] = $comp->total;
    }

    $chart = new MorososChart;
    //$chart->title('Compras & Ventas '.date('Y'), 30, "rgba(51, 51, 51, 1.0)", true, 'Helvetica Neue');
    //$chart->displaylegend(false);
    $chart->labels($mes);

    $chart->dataset('Compras', 'bar', $data_pen)
        ->color("rgba(243, 156, 18, 1.0)")
        ->backgroundcolor("rgba(243, 156, 18, 0.7)");

    $chart->dataset('Ventas', 'bar', $data_pag)
        ->color("rgba(0, 166, 90, 1.0)")
        ->backgroundcolor("rgba(0, 166, 90, 0.7)");
         */
    public function index()
    {
        if (Auth::check())
        {
            $null = Auth::user()->change_password;
            if ($null == 1)
            {
               return view('adminlte::home');
            }else{
                $id = Auth::user()->id;
                $user = User::findOrFail($id);
                flash('Cambiar Contraseña por motivos de seguridad')->warning();
                return view('user.edit', compact('user'));
            }
        }
       //return view('adminlte::home');
    }
}
