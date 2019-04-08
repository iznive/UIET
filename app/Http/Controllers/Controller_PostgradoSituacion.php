<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
	class Controller_PostgradoSituacion extends Controller
	{

		public function pfPostgradoSituacion()
		{
			 $vNomModulo = 'Postgrado Situación';
			 $vPostgradoSituacion = \DB::select("CALL sp_PostgradoSituacion_S(null);");
			return view('Catalogos.uiPostgradoSituacion',compact('vPostgradoSituacion', 'vNomModulo'));
		}


		public function pfPostgradoSituacionGuardar(Request $r)
		{
			$vPK_PostSituacion = $r->input('pPK_PostSituacion');
	        $vPSi_Nombre = $r->input('pPSi_Nombre');
	        $vPSi_Estatus = 1;
	        $vFK_Usuario = 1;
      		$vObservacion = '';

	        if ($vPK_PostSituacion == -99) {
            $vPostgradoSituacion_I = \DB::select("CALL sp_PostgradoSituacion_I('" . $vPSi_Nombre . "', ". $vPSi_Estatus .",". $vFK_Usuario.",'".$vObservacion ."')");
	        } else {
	            $vPostgradoSituacion_U = \DB::select("CALL sp_PostgradoSituacion_U(" . $vPK_PostSituacion . ",'" . $vPSi_Nombre . "', ". $vPSi_Estatus .",". $vFK_Usuario.",'".$vObservacion ."')");
	        }

        $vMsj = 'Registro Guardado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
		}

		
    	 public function pfPostgradoSituacionEliminar(Request $r)
	    {
	    	$vPK_PostSituacion = $r->input('pPK_PostSituacion');
	        $vPSi_Nombre = '';
	        $vPSi_Estatus = 0;
	        $vFK_Usuario = 1;
      		$vObservacion = '';

	        
	     $vPostgradoSituacion_U = \DB::select("CALL sp_PostgradoSituacion_U(" . $vPK_PostSituacion . ",'" . $vPSi_Nombre . "', ". $vPSi_Estatus .",". $vFK_Usuario.",'".$vObservacion ."')");

	        $vMsj = 'Registro Eliminado Correctamente.';
	        $vTMsj = 'success';
	        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
	    }
	    public function pfPostgradoSituacionEditarForm(Request $r)
   		{
	        $vPK_PostSituacion = $r->input('pPK_PostSituacion');

	        $vPostgradoSituacion_S = \DB::select("CALL sp_PostgradoSituacion_S(" .  $vPK_PostSituacion . ");");

	        $vPSi_Nombre = $vPostgradoSituacion_S[0]->PSi_Nombre;
	 
	        return response()->json(['pPSi_Nombre' => $vPSi_Nombre ]);
    	}
	}

?>