<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Controller_TipoContrato extends Controller
{
    //
    public function pfTipoContrato()
    {
        $vNomModulo = 'Tipo de Contrato';
        $vTipoContrato = \DB::select("CALL sp_TipoContrato_S(NULL);");
        return view('Catalogos.uiTipoContrato', compact('vTipoContrato', 'vNomModulo'));
    }

    public function pfTipoContratoGuardar(Request $r)
    {
        $vPK_TipoContrato = $r->input('pPK_TipoContrato');
        $vTCo_Nombre = $r->input('pTCo_Nombre');
        $vTCo_Estatus = 1;
        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_TipoContrato == -99) {
            $vTipoContrato_I = \DB::select("CALL sp_TipoContrato_I('" . $vTCo_Nombre . "', " . $vFK_Usuario . ", '". $vObservacion ."')");
        } else {
            $vTipoContrato_U = \DB::select("CALL sp_TipoContrato_U(" . $vPK_TipoContrato . ", '" . $vTCo_Nombre . "', " . $vTCo_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."')");
        }

        $vMsj = 'Registro Guardado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfTipoContratoEliminar(Request $r)
    {
        $vPK_TipoContrato = $r->input('pPK_TipoContrato');
        $vTCo_Nombre = '';
        $vTCo_Estatus = 0;
        $vFK_Usuario = 1;
        $vObservacion = '';


        $vTipoContrato_U = \DB::select("CALL sp_TipoContrato_U(" . $vPK_TipoContrato . ", '" . $vTCo_Nombre . "', " . $vTCo_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."')");

        $vMsj = 'Registro Eliminado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfTipoContratoEditarForm(Request $r)
    {
        $vPK_TipoContrato = $r->input('pPK_TipoContrato');

        $vTipoContrato = \DB::select("CALL sp_TipoContrato_S(" . $vPK_TipoContrato . ");");

        $vTCo_Nombre = $vTipoContrato[0]->TCo_Nombre;

        return response()->json(['pTCo_Nombre' => $vTCo_Nombre]);
    }


}
