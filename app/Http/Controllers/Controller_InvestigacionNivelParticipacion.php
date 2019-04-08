<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Controller_InvestigacionNivelParticipacion extends Controller
{
    //
    public function pfInvestigacionNivelParticipacion()
    {
        $vNomModulo = 'Investigación Nivel Participación';
        $vInvestigacion = \DB::select("CALL sp_InvestigacionNivelParticipacion_S(NULL);");
        return view('Catalogos.uiInvestigacionNivelParticipacion', compact('vInvestigacion', 'vNomModulo'));
    }

    public function pfInvestigacionNivelParticipacionGuardar(Request $r)
    {
        $vPK_InveNivePart = $r->input('pPK_InveNivePart');
        $vINP_Nombre = $r->input('pINP_Nombre');
        $vINP_Estatus = 1;
        $vFK_Usuario = 1;
        $vObservacion = $r->input('pObservacion');

        if ($vPK_InveNivePart == -99) {
            $vQuery = "CALL sp_InvestigacionNivelParticipacion_I(" . $vINP_Nombre . ", " . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
            $vInvestigacionNivelParticipacion_I = \DB::select("CALL sp_InvestigacionNivelParticipacion_I('" . $vINP_Nombre . "', " . $vFK_Usuario . ", '". $vObservacion ."', '" . $vQuery . "')");
        } else {
            $vQuery = "CALL sp_InvestigacionNivelParticipacion_U(" . $vPK_InveNivePart . "," . $vINP_Nombre . ", " . $vINP_Estatus . "," . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
            $vInvestigacionNivelParticipacion_U = \DB::select("CALL sp_InvestigacionNivelParticipacion_U(" . $vPK_InveNivePart . ", '" . $vINP_Nombre . "', " . $vINP_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."', '" . $vQuery . "')");
        }

        $vMsj = 'Registro Guardado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfInvestigacionNivelParticipacionEliminar(Request $r)
    {
        $vPK_InveNivePart = $r->input('pPK_InveNivePart');
        $vINP_Nombre = '';
        $vINP_Estatus = 0;
        $vFK_Usuario = 1;
        $vObservacion = '';

        $vQuery = "CALL sp_InvestigacionNivelParticipacion_U(" . $vPK_InveNivePart . "," . $vINP_Nombre . ", " . $vINP_Estatus . "," . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
        $vInvestigacionNivelParticipacion_U = \DB::select("CALL sp_InvestigacionNivelParticipacion_U(" . $vPK_InveNivePart . ", '" . $vINP_Nombre . "', " . $vINP_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."')");

        $vMsj = 'Registro Eliminado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfInvestigacionNivelParticipacionEditarForm(Request $r)
    {
        $vPK_InveNivePart = $r->input('pPK_InveNivePart');

        $vInvestigacion = \DB::select("CALL sp_InvestigacionNivelParticipacion_S(" . $vPK_InveNivePart . ");");

        $vINP_Nombre = $vInvestigacion[0]->INP_Nombre;

        return response()->json(['pINP_Nombre' => $vINP_Nombre]);
    }


}
