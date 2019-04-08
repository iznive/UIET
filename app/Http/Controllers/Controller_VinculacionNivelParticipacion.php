<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Controller_VinculacionNivelParticipacion extends Controller
{
    //
    public function pfVinculacionNivelParticipacion()
    {
        $vNomModulo = 'Vinculación Nivel Participación';
        $vVinculacion = \DB::select("CALL sp_VinculacionNivelParticipacion_S(NULL);");
        return view('Catalogos.uiVinculacionNivelParticipacion', compact('vVinculacion', 'vNomModulo'));
    }

    public function pfVinculacionNivelParticipacionGuardar(Request $r)
    {
        $vPK_VincNivePart = $r->input('pPK_VincNivePart');
        $vVNP_Nombre = $r->input('pVNP_Nombre');
        $vVNP_Estatus = 1;
        $vFK_Usuario = 1;
        $vObservacion = $r->input('pObservacion');

        if ($vPK_VincNivePart == -99) {
            $vQuery = "CALL sp_VinculacionNivelParticipacion_I(" . $vVNP_Nombre . ", " . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
            $vVinculacionNivelParticipacion_I = \DB::select("CALL sp_VinculacionNivelParticipacion_I('" . $vVNP_Nombre . "', " . $vFK_Usuario . ", '". $vObservacion ."', '" . $vQuery . "')");
        } else {
             $vQuery = "CALL sp_VinculacionNivelParticipacion_U(" . $vPK_VincNivePart . "," . $vVNP_Nombre . ", " . $vVNP_Nombre . ", " . $vVNP_Estatus . "," . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
            $vVinculacionNivelParticipacion_U = \DB::select("CALL sp_VinculacionNivelParticipacion_U(" . $vPK_VincNivePart . ", '" . $vVNP_Nombre . "', " . $vVNP_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."', '" . $vQuery . "')");
        }

        $vMsj = 'Registro Guardado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfVinculacionNivelParticipacionEliminar(Request $r)
    {
        $vPK_VincNivePart = $r->input('pPK_VincNivePart');
        $vVNP_Nombre = '';
        $vVNP_Estatus = 0;
        $vFK_Usuario = 1;
        $vObservacion = '';

        $vVinculacionNivelParticipacion_U = \DB::select("CALL sp_VinculacionNivelParticipacion_U(" . $vPK_VincNivePart . ", '" . $vVNP_Nombre . "', " . $vVNP_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."')");

        $vMsj = 'Registro Eliminado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfVinculacionNivelParticipacionEditarForm(Request $r)
    {
        $vPK_VincNivePart = $r->input('pPK_VincNivePart');

        $vVinculacion = \DB::select("CALL sp_VinculacionNivelParticipacion_S(" . $vPK_VincNivePart . ");");

        $vVNP_Nombre = $vVinculacion[0]->VNP_Nombre;

        return response()->json(['pVNP_Nombre' => $vVNP_Nombre]);
    }


}
