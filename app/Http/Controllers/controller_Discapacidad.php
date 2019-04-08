<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class controller_Discapacidad extends Controller
{
    public function pfDiscapacidad()
    {
        $vNomModulo = 'Discapacidades';
        $vDiscapacidad = \DB::select("CALL sp_Discapacidad_S(NULL);");
        return view('Catalogos.uiDiscapacidad', compact('vDiscapacidad', 'vNomModulo'));
    }

    public function pfDiscapacidadGuardar(Request $r)
    {
        $vPK_Discapacidad = $r->input('pPK_Discapacidad');
        $vDis_Nombre = $r->input('pDis_Nombre');
        $vDis_Estatus = 1;
        $vFK_Usuario = 1;
        $vObservacion = $r->input('pObservacion');

        if ($vPK_Discapacidad == -99) {
            $vQuery = "CALL sp_Discapacidad_I(" . $vDis_Nombre . ", " . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
            $vDiscapacidad_I = \DB::select("CALL sp_Discapacidad_I('" . $vDis_Nombre . "', " . $vFK_Usuario . ", '". $vObservacion ."', '" . $vQuery . "')");
        } else {
            $vQuery = "CALL sp_Discapacidad_U(" . $vPK_Discapacidad . "," . $vDis_Nombre . ", " . $vDis_Estatus . "," . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
            $vDiscapacidad_U = \DB::select("CALL sp_Discapacidad_U(" . $vPK_Discapacidad . ", '" . $vDis_Nombre . "', " . $vDis_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."', '" . $vQuery . "')");
        }

        $vMsj = 'Registro Guardado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfDiscapacidadEliminar(Request $r)
    {
        $vPK_Discapacidad = $r->input('pPK_Discapacidad');
        $vDis_Nombre = '';
        $vDis_Estatus = 0;
        $vFK_Usuario = 1;
        $vObservacion = '';

        $vQuery = "CALL sp_Discapacidad_U(" . $vPK_Discapacidad . "," . $vDis_Nombre . ", " . $vDis_Estatus . "," . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
        $vDiscapacidad_U = \DB::select("CALL sp_Discapacidad_U(" . $vPK_Discapacidad . ", '" . $vDis_Nombre . "', " . $vDis_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."')");

        $vMsj = 'Registro Eliminado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfDiscapacidadEditarForm(Request $r)
    {
        $vPK_Discapacidad = $r->input('pPK_Discapacidad');

        $vDiscapacidad = \DB::select("CALL sp_Discapacidad_S(" . $vPK_Discapacidad . ");");

        $vDis_Nombre = $vDiscapacidad[0]->Dis_Nombre;

        return response()->json(['pDis_Nombre' => $vDis_Nombre]);
    }


}
