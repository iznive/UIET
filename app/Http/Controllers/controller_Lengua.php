<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class controller_Lengua extends Controller
{
    //
    public function pfLengua()
    {
        $vNomModulo = 'Lenguas';
        $vLengua = \DB::select("CALL sp_Lengua_S(NULL);");
        return view('Catalogos.uiLengua', compact('vLengua', 'vNomModulo'));
    }

    public function pfLenguaGuardar(Request $r)
    {
        $vPK_Lengua = $r->input('pPK_Lengua');
        $vLen_Nombre = $r->input('pLen_Nombre');
        $vLen_Tipo = $r->input('pLen_Tipo');
        $vLen_Estatus = 1;
        $vFK_Usuario = 1;
        $vObservacion = $r->input('pObservacion');

        if ($vPK_Lengua == -99) {
            $vQuery = "CALL sp_Lengua_I(" . $vLen_Nombre . ", " . $vLen_Tipo . ", " . $vFK_Usuario . ", " . $vObservacion . ",  vQuery)";
            $vLengua_I = \DB::select("CALL sp_Lengua_I('" . $vLen_Nombre . "', " . $vLen_Tipo . ", " . $vFK_Usuario . ", '". $vObservacion ."', '" . $vQuery . "')");
        } else {
            $vQuery = "CALL sp_Lengua_U(" . $vPK_Lengua . "," . $vLen_Nombre . ", " . $vLen_Tipo . ", " . $vLen_Estatus . "," . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
            $vLengua_U = \DB::select("CALL sp_Lengua_U(" . $vPK_Lengua . ", '" . $vLen_Nombre . "', " . $vLen_Tipo . ", " . $vLen_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."', '" . $vQuery . "')");
        }

        $vMsj = 'Registro Guardado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfLenguaEliminar(Request $r)
    {
        $vPK_Lengua = $r->input('pPK_Lengua');
        $vLen_Nombre = '';
        $vLen_Tipo = 0;
        $vLen_Estatus = 0;
        $vFK_Usuario = 1;
        $vObservacion = '';

         $vQuery = "CALL sp_Lengua_U(" . $vPK_Lengua . ", " . $vLen_Nombre . "," . $vLen_Tipo . "," . $vLen_Estatus . ", " . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
        $vLengua_U = \DB::select("CALL sp_Lengua_U(" . $vPK_Lengua . ", '" . $vLen_Nombre . "', " . $vLen_Tipo . ", " . $vLen_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."', '" . $vQuery . "')");

        $vMsj = 'Registro Eliminado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfLenguaEditarForm(Request $r)
    {
        $vPK_Lengua = $r->input('pPK_Lengua');

        $vLengua = \DB::select("CALL sp_Lengua_S(" . $vPK_Lengua . ");");

        $vLen_Nombre = $vLengua[0]->Len_Nombre;
              

        return response()->json(['pLen_Nombre' => $vLen_Nombre]);
    }


}
