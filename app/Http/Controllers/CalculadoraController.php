<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculadoraController extends Controller
{
    public function testarAPI(){
		return response()->json(["am"=>"anha", "on"=>"tem"]);
	}

	public function calcularMontante(Request $request){
		$capital= (float) $request->capital;
		$juros= (float) $request->juros;
		$tempo= (float) $request->tempo;

		$aux= pow((1 + ($juros / 100)), $tempo);

		(float) $montante= $capital * $aux;

		$resultado= [
			"capital"=> $capital, 
			"juros"=> $juros, 
			"tempo"=> $tempo,
			"montante"=> $montante
		];

		return response()->json($resultado);
		//return response()->json($request);
		//return view('inic', compact('resultado'));
	}
}
