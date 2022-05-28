<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerfilController extends Controller
{
    public function index(){
        return view('/perfil/index');
    }
    public function rellenarTabla(){
        $perfiles= DB::table('perfiles')
        ->select('id','rut','nombre','apellidoPaterno','apellidoMaterno','telefono','comuna')
        ->get();
        return response()->json($perfiles);
    }
    public function store(){
        return response()->json(['success'=>'Exito']);
    }
}
