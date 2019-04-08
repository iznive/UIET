<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Controller_FormacionBasica extends Controller
{
    //
    public function pfFormacionBasica()
    {
        $vNomModulo = 'Formación Básica';
        $vFormacionBasica = \DB::select("CALL sp_FormacionBasica_S(NULL);");
        return view('Catalogos.uiFormacionBasica', compact('vFormacionBasica', 'vNomModulo'));
    }

    public function pfFormacionBasicaGuardar(Request $r)
    {
        $vPK_FormBasica = $r->input('pPK_FormBasica');
        $vFBa_Nombre = $r->input('pFBa_Nombre');
        $vFBa_Estatus = 1;
        $vFK_Usuario = 1;
        $vObservacion = $r->input('pObservacion');

        if ($vPK_FormBasica == -99) {
            $vQuery = "CALL sp_FormacionBasica_I(" . $vFBA_Nombre . ", " . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
            $vFormacionBasica_I = \DB::select("CALL sp_FormacionBasica_I('" . $vFBa_Nombre . "', " . $vFK_Usuario . ", '". $vObservacion ."', '" . $vQuery . "')");
        } else {
            $vQuery = "CALL sp_FormacionBasica_U(" . $vPK_FormBasica . "," . $vFBa_Nombre . ", " . $vFBa_Estatus . "," . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
            $vFormacionBasica_U = \DB::select("CALL sp_FormacionBasica_U(" . $vPK_FormBasica . ", '" . $vFBa_Nombre . "', " . $vFBa_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."', '" . $vQuery . "')");
        }

        $vMsj = 'Registro Guardado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfFormacionBasicaEliminar(Request $r)
    {
        $vPK_FormBasica = $r->input('pPK_FormBasica');
        $vFBa_Nombre = '';
        $vFBa_Estatus = 0;
        $vFK_Usuario = 1;
        $vObservacion = '';

        $vQuery = "CALL sp_FormacionBasica_U(" . $vPK_FormBasica . "," . $vFBa_Nombre . ", " . $vFBa_Estatus . "," . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
        $vFormacionBasica_U = \DB::select("CALL sp_FormacionBasica_U(" . $vPK_FormBasica . ", '" . $vFBa_Nombre . "', " . $vFBa_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."')");

        $vMsj = 'Registro Eliminado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfFormacionBasicaEditarForm(Request $r)
    {
        $vPK_FormBasica = $r->input('pPK_FormBasica');

        $vFormacionBasica = \DB::select("CALL sp_FormacionBasica_S(" . $vPK_FormBasica . ");");

        $vFBa_Nombre = $vFormacionBasica[0]->FBa_Nombre;

        return response()->json(['pFBa_Nombre' => $vFBa_Nombre]);
    }


}
