<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    public function index()
    {
        if (Auth::check())        {
            $null = Auth::user()->change_password;
            if ($null != null)
            {
               return view('adminlte::home');
            }else{
                $id = Auth::user()->id;
                $user = User::findOrFail($id);
                return view('user.edit', compact('user'))->with('message', trans('Contraseña Cambiada'));
            }
        }
       //return view('adminlte::home');
    }
}
