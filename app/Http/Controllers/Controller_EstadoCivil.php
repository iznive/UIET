<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Controller_EstadoCivil extends Controller
{
    //
    public function pfEstadoCivil()
    {
        $vNomModulo = 'Estado Civil';
        $vEstadoCivil = \DB::select("CALL sp_EstadoCivil_S(NULL);");
        return view('Catalogos.uiEstadoCivil', compact('vEstadoCivil', 'vNomModulo'));
    }

    public function pfEstadoCivilGuardar(Request $r)
    {
        $vPK_EstaCivil = $r->input('pPK_EstaCivil');
        $vECi_Nombre = $r->input('pECi_Nombre');
        $vECi_Estatus = 1;
        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_EstaCivil == -99) {
            $vCatePuesto_I = \DB::select("CALL sp_EstadoCivil_I('" . $vECi_Nombre . "', " . $vFK_Usuario . ", '". $vObservacion ."')");
        } else {
            $vCatePuesto_U = \DB::select("CALL sp_EstadoCivil_U(" . $vPK_EstaCivil . ", '" . $vECi_Nombre . "', " . $vECi_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."')");
        }

        $vMsj = 'Registro Guardado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfEstadoCivilEliminar(Request $r)
    {
        $vPK_EstaCivil = $r->input('pPK_EstaCivil');
        $vECi_Nombre = '';
        $vECi_Estatus = 0;
        $vFK_Usuario = 1;
        $vObservacion = '';

        $vCatePuesto_U = \DB::select("CALL sp_EstadoCivil_U(" . $vPK_EstaCivil . ", '" . $vECi_Nombre . "', " . $vECi_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."')");

        $vMsj = 'Registro Eliminado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfEstadoCivilEditarForm(Request $r)
    {
        $vPK_EstaCivil = $r->input('pPK_EstaCivil');

        $vCatePuesto = \DB::select("CALL sp_EstadoCivil_S(" . $vPK_EstaCivil . ");");

        $vECi_Nombre = $vCatePuesto[0]->ECi_Nombre;

        return response()->json(['pECi_Nombre' => $vECi_Nombre]);
    }

}
