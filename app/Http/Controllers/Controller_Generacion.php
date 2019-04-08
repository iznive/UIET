<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
	class Controller_Generacion extends Controller
	{

		public function pfGeneracion()
		{
			 $vNomModulo = 'Generación';
			   $vGeneracion = \DB::select("CALL sp_Generacion_S(null);");
			return view('Catalogos.uiGeneracion',compact('vGeneracion', 'vNomModulo'));
		}


		public function pfGeneracionGuardar(Request $r)
		{
			$vPK_Generacion = $r->input('pPK_Generacion');
	        $vGen_Ano = $r->input('pGen_Ano');
	        $vGen_Nombre = $r->input('pGen_Nombre');
	        $vGen_NombreCorto = $r->input('pGen_NombreCorto');
	        $vGen_Estatus = 1;
	        $vFK_Usuario = 1;
      		$vObservacion = '';

	        if ($vPK_Generacion == -99) {
            $vGeneracion_I = \DB::select("CALL sp_Generacion_I(" . $vGen_Ano . ", '". $vGen_Nombre ."','". $vGen_NombreCorto."',".$vGen_Estatus .",".$vFK_Usuario. ",'".$vObservacion. "')");
	        } else {
	            $vGeneracion_U = \DB::select("CALL sp_Generacion_U(".$vPK_Generacion."," . $vGen_Ano . ", '". $vGen_Nombre ."','". $vGen_NombreCorto."',".$vGen_Estatus .",".$vFK_Usuario. ",'".$vObservacion. "')");
	        }


	         $vMsj = 'Registro Guardado Correctamente...';
        	$vTMsj = 'success';
        	return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
		}

		
    	 public function pfGeneracionEliminar(Request $r)
	    {
	    	$vPK_Generacion = $r->input('pPK_Generacion');
	        $vGen_Ano = 0;
	        $vGen_Nombre = '';
	        $vGen_NombreCorto = '';
	        $vGen_Estatus = 0;
	        $vFK_Usuario = 1;
      		$vObservacion = '';
	        
	     $vGeneracion_U = \DB::select("CALL sp_Generacion_U(".$vPK_Generacion."," . $vGen_Ano . ", '". $vGen_Nombre ."','". $vGen_NombreCorto."',".$vGen_Estatus .",".$vFK_Usuario. ",'".$vObservacion. "')");

	        $vMsj = 'Registro Eliminado Correctamente.';
	        $vTMsj = 'success';
	        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
	    }
	    public function pfGeneracionEditarForm(Request $r)
   		{
	      $vPK_Generacion = $r->input('pPK_Generacion');

	        $vGeneracion_S = \DB::select("CALL sp_Generacion_S(" .  $vPK_Generacion . ");");

	        $vGen_Ano = $vGeneracion_S[0]->Gen_Ano;
	        $vGen_Nombre = $vGeneracion_S[0]->Gen_Nombre;
	        $vGen_NombreCorto = $vGeneracion_S[0]->Gen_NombreCorto;
	 
	        return response()->json(['pGen_Ano' => $vGen_Ano,'pGen_Nombre' => $vGen_Nombre,'pGen_NombreCorto' => $vGen_NombreCorto ]);
    	}
	}

?>