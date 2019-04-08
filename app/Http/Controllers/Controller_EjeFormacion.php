<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
	class Controller_EjeFormacion extends Controller
	{

		public function pfEjeFormacion()
		{
			 $vNomModulo = 'Eje Formación';
			   $vEjeFormacion = \DB::select("CALL sp_EjeFormacion_S(null);");
			return view('Catalogos.uiEjeFormacion',compact('vEjeFormacion', 'vNomModulo'));
		}


		public function pfEjeFormacionGuardar(Request $r)
		{
			$vPK_EjeFormacion = $r->input('pPK_EjeFormacion');
	        $vEFo_Nombre = $r->input('pEFo_Nombre');
	        $vEFo_Estatus = 1;
	        $vFK_Usuario = 1;
      		$vObservacion = '';

	        if ($vPK_EjeFormacion == -99) {
            	$vEjeFormacion_I = \DB::select("CALL sp_EjeFormacion_I('" . $vEFo_Nombre . "', ". $vEFo_Estatus .",". $vFK_Usuario.",'".$vObservacion ."')");
	        } else {
	            $vEjeFormacion_U = \DB::select("CALL sp_EjeFormacion_U(" . $vPK_EjeFormacion . ",'" . $vEFo_Nombre . "', ". $vEFo_Estatus .",". $vFK_Usuario.",'".$vObservacion ."')");
	        }

        $vMsj = 'Registro Guardado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
		}

		
    	 public function pfEjeFormacionEliminar(Request $r)
	    {
	    	$vPK_EjeFormacion = $r->input('pPK_EjeFormacion');
	        $vEFo_Nombre = '';
	        $vEFo_Estatus = 0;
	        $vFK_Usuario = 1;
      		$vObservacion = '';
	        
	    $vEjeFormacion_U = \DB::select("CALL sp_EjeFormacion_U(" . $vPK_EjeFormacion . ",'" . $vEFo_Estatus . "', ". $vEFo_Estatus .",". $vFK_Usuario.",'".$vObservacion ."')");

	        $vMsj = 'Registro Eliminado Correctamente.';
	        $vTMsj = 'success';
	        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
	    }
	    public function pfEjeFormacionEditarForm(Request $r)
   		{
	       	$vPK_EjeFormacion = $r->input('pPK_EjeFormacion');

	        $vEjeFormacio_S = \DB::select("CALL sp_EjeFormacion_S(" .  $vPK_EjeFormacion . ");");

	        $vEFo_Nombre = $vEjeFormacio_S[0]->EFo_Nombre;
	 
	        return response()->json(['pEFo_Nombre' => $vEFo_Nombre ]);
    	}
	}

?>