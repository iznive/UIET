<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
	class Controller_AreaFormacion extends Controller
	{

		public function pfAreaFormacion()
		{
			 $vNomModulo = 'Área Formación';
			   $vAreaFormacion = \DB::select("CALL sp_AreaFormacion_S(null);");
			return view('Catalogos.uiAreaFormacion',compact('vAreaFormacion', 'vNomModulo'));
		}


		public function pfAreaFormacionGuardar(Request $r)
		{
			$vPK_AreaFormacion = $r->input('pPK_AreaFormacion');
	        $vAFo_Nombre = $r->input('pAFo_Nombre');
	        $vAFo_Estatus = 1;
	        $vFK_Usuario = 1;
      		$vObservacion = '';

	        if ($vPK_AreaFormacion == -99) {
            $vAreaFormacion_I = \DB::select("CALL sp_AreaFormacion_I('" . $vAFo_Nombre . "', ". $vAFo_Estatus .",". $vFK_Usuario.",'".$vObservacion ."')");
	        } else {
	            $vAreaFormacion_U = \DB::select("CALL sp_AreaFormacion_U(" . $vPK_AreaFormacion . ",'" . $vAFo_Nombre . "', ". $vAFo_Estatus .",". $vFK_Usuario.",'".$vObservacion ."')");
	        }

        $vMsj = 'Registro Guardado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
		}

		
    	 public function pfAreaFormacionEliminar(Request $r)
	    {
	    	$vPK_AreaFormacion = $r->input('ppk_areaformacion');
	        $vAFo_Nombre = ' ';//DEFAUL POR EL PROCEDURE
	        $vAFo_Estatus = 0; 
	         $vFK_Usuario = 1;
        	$vObservacion = '';

	        
	      $vareaformacion_U = \DB::select("CALL sp_AreaFormacion_U(" . $vPK_AreaFormacion . ",'" . $vAFo_Nombre . "', ". $vAFo_Estatus .",". $vFK_Usuario.",'".$vObservacion ."')");

	        $vMsj = 'Registro Eliminado Correctamente.';
	        $vTMsj = 'success';
	        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
	    }
	    public function pfAreaFormacionEditarForm(Request $r)
   		{
	        $vPK_AreaFormacion = $r->input('pPK_AreaFormacion');

	        $vAreaFormacion_S = \DB::select("CALL sp_AreaFormacion_S(" .  $vPK_AreaFormacion . ");");

	        $vAFo_Nombre = $vAreaFormacion_S[0]->AFo_Nombre;
	 
	        return response()->json(['pAFo_Nombre' => $vAFo_Nombre ]);
    	}
	}

?>