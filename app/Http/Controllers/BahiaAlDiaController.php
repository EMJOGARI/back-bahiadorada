<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bahia;

class BahiaAlDiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos=Bahia::all();
        return view('bahia.index', compact('datos'));
    }   
}
