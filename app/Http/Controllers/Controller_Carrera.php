<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
	class Controller_Carrera extends Controller
	{

		public function pfCarrera()
		{
			 $vNomModulo = 'Carrera';
			 $vCarrera = \DB::select("CALL sp_Carrera_S(null);");
			return view('Catalogos.uiCarrera',compact('vCarrera', 'vNomModulo'));
		}


		public function pfCarreraGuardar(Request $r)
		{
			$vPK_Carrera = $r->input('pPK_Carrera');
	        $vCar_Nombre = $r->input('pCar_Nombre');
	        $vCar_NombreCorto = $r->input('pCar_NombreCorto');
	        $vCar_Modalidad = $r->input('pCar_Modalidad');
	        $vCar_FechaRegistro = $r->input('pCar_FechaRegistro');
	        $vCar_ClaveDGP = $r->input('pCar_ClaveDGP');
	        $vCar_Estatus =1;
	        $vFK_Usuario = 1;
      		$vObservacion = '';
  

      		/*PK_Carreras,Car_Nombre,Car_NombreCorto, Car_Modalidad, Car_Estatus */
	        if ($vPK_Carrera == -99) {
            $vCarrera_I = \DB::select("CALL sp_Carrera_I('".$vCar_ClaveDGP."','" . $vCar_Nombre . "', '". $vCar_NombreCorto ."',". $vCar_Modalidad.",".$vCar_Estatus .",".$vFK_Usuario .",".$vCar_FechaRegistro.",'".$vObservacion."')");
	        } else {
	        $vCarrera_U = \DB::select("CALL sp_Carrera_U(".$vPK_Carrera.",'".$vCar_ClaveDGP."','" . $vCar_Nombre . "', '". $vCar_NombreCorto ."',". $vCar_Modalidad.",".$vCar_Estatus .",".$vFK_Usuario .",".$vCar_FechaRegistro.",'".$vObservacion."')");
	        }
	      	       
        $vMsj = 'Registro Guardado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
		}

		
    	 public function pfCarreraEliminar(Request $r)
	    {
	    	$vPK_Carrera = $r->input('pPK_Carrera');
	        $vCar_Nombre = '';
	        $vCar_NombreCorto = '';
	        $vCar_Modalidad = 0;
	        $vCar_Estatus =0;
	         $vFK_Usuario = 1;
      		$vObservacion = '';
      		 $vCar_FechaRegistro = '1900-01-01';
	        $vCar_ClaveDGP = '';

	        
	       $vCarrera_U = \DB::select("CALL sp_Carrera_U(".$vPK_Carrera.",'".$vCar_ClaveDGP."','" . $vCar_Nombre . "', '". $vCar_NombreCorto ."',". $vCar_Modalidad.",".$vCar_Estatus .",".$vFK_Usuario .",".$vCar_FechaRegistro.",'".$vObservacion."')");

	        $vMsj = 'Registro Eliminado Correctamente.';
	        $vTMsj = 'success';
	        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
	    }
	    public function pfCarreraEditarForm(Request $r)
   		{
	        $vPK_Carrera = $r->input('pPK_Carrera');

	        $vCarrera_S = \DB::select("CALL sp_Carrera_S(" .  $vPK_Carrera . ");");

	        $vCar_Nombre = $vCarrera_S[0]->Car_Nombre;
	        $vCar_NombreCorto = $vCarrera_S[0]->Car_NombreCorto;
	        $vCar_Modalidad = $vCarrera_S[0]->Car_Modalidad;
	        $vCar_FechaRegistro = $vCarrera_S[0]->Car_FechaRegistro;
	        $vCar_ClaveDGP = $vCarrera_S[0]->Car_ClaveDGP;
     
	 
	        return response()->json(['pCar_Nombre' => $vCar_Nombre,'pCar_NombreCorto' => $vCar_NombreCorto,'pCar_Modalidad'=> $vCar_Modalidad,'pCar_FechaRegistro' => $vCar_FechaRegistro, 'pCar_ClaveDGP' =>  $vCar_ClaveDGP]);
    	}
	}

?>