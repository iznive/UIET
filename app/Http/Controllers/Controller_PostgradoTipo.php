<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
	class Controller_PostgradoTipo extends Controller
	{

		public function pfPostgradoTipo()
		{
			 $vNomModulo = 'Tipo Postgrado';
			   $vPostgradoTipo = \DB::select("CALL sp_PostgradoTipo_S(null);");
			return view('Catalogos.uiPostgradoTipo',compact('vPostgradoTipo', 'vNomModulo'));
		}


		public function pfPostgradoTipoGuardar(Request $r)
		{
			$vPK_PostTipo = $r->input('pPK_PostTipo');
	        $vPTi_Nombre = $r->input('pPTi_Nombre');
	        $vPTi_Estatus = 1;
	        $vFK_Usuario = 1;
      		$vObservacion = '';

	        if ($vPK_PostTipo == -99) {
            $vPostgradoTipo_I = \DB::select("CALL sp_PostgradoTipo_I('" . $vPTi_Nombre . "', ". $vPTi_Estatus .",". $vFK_Usuario.",'".$vObservacion ."')");
	        } else {
	            $vPostgradoTipo_U = \DB::select("CALL sp_PostgradoTipo_U(" . $vPK_PostTipo . ",'" . $vPTi_Nombre . "', ". $vPTi_Estatus .",". $vFK_Usuario.",'".$vObservacion ."')");
	        }

        $vMsj = 'Registro Guardado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
		}

		
    	 public function pfPostgradoTipoEliminar(Request $r)
	    {
	    	$vPK_PostTipo = $r->input('pPK_PostTipo');
	        $vPTi_Nombre = '';
	        $vPTi_Estatus = 0;
	        $vFK_Usuario = 1;
      		$vObservacion = '';

	        
	     $vPostgradoTipo_U = \DB::select("CALL sp_PostgradoTipo_U(" . $vPK_PostTipo . ",'" . $vPTi_Nombre . "', ". $vPTi_Estatus .",". $vFK_Usuario.",'".$vObservacion ."')");

	        $vMsj = 'Registro Eliminado Correctamente.';
	        $vTMsj = 'success';
	        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
	    }
	    public function pfPostgradoTipoEditarForm(Request $r)
   		{
	        $vPK_PostTipo = $r->input('pPK_PostTipo');

	        $vPostgradoTipo_S = \DB::select("CALL sp_PostgradoTipo_S(" .  $vPK_PostTipo . ");");

	        $vPTi_Nombre = $vPostgradoTipo_S[0]->PTi_Nombre;
	 
	        return response()->json(['pPTi_Nombre' => $vPTi_Nombre ]);
    	}
	}

?>