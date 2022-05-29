<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePerfilRequest;
use App\Http\Requests\UpdatePerfilRequest;
use App\Models\Perfil;
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
    public function store(CreatePerfilRequest $request){
        Perfil::create([
            'rut'=>$request->rut,
            'nombre'=>$request->nombre,
            'apellidoPaterno'=>$request->apellidoPaterno,
            'apellidoMaterno'=>$request->apellidoMaterno,
            'telefono'=>$request->telefono,
            'comuna'=>$request->comuna
        ]);
        return response()->json(['success'=>'Exito']);
    }
    public function update(UpdatePerfilRequest $request){

    }
}
