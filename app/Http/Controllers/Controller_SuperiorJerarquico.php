<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Controller_SuperiorJerarquico extends Controller
{
    //
    public function pfSuperiorJerarquico()
    {
        $vNomModulo = 'Superior Jerárquico';
        $vSupeJerarquico = \DB::select("CALL sp_SuperiorJerarquico_S(NULL);");
        return view('Catalogos.uiSuperiorJerarquico', compact('vSupeJerarquico', 'vNomModulo'));
    }

    public function pfSuperiorJerarquicoGuardar(Request $r)
    {
        $vPK_SupeJerarquico = $r->input('pPK_SupeJerarquico');
        $vSJe_Nombre = $r->input('pSJe_Nombre');
        $vSJe_Abreviatura = $r->input('pSJe_Abreviatura');
        $vSJe_Estatus = 1;
        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_SupeJerarquico == -99) {
            $vSuperiorJerarquico_I = \DB::select("CALL sp_SuperiorJerarquico_I('" . $vSJe_Nombre . "','" . $vSJe_Abreviatura . "', " . $vFK_Usuario . ", '". $vObservacion ."')");
        } else {
            $vSuperiorJerarquico_U = \DB::select("CALL sp_SuperiorJerarquico_U(" . $vPK_SupeJerarquico . ", '" . $vSJe_Nombre . "', '" . $vSJe_Abreviatura . "'," . $vSJe_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."')");
        }

        $vMsj = 'Registro Guardado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfSuperiorJerarquicoEliminar(Request $r)
    {
        $vPK_SupeJerarquico = $r->input('pPK_SupeJerarquico');
        $vSJe_Nombre = $r->input('pSJe_Nombre');
        $vSJe_Abreviatura = $r->input('pSJe_Abreviatura');
        $vSJe_Estatus = 0;
        $vFK_Usuario = 1;
        $vObservacion = '';

        $vSuperiorJerarquico_U = \DB::select("CALL sp_SuperiorJerarquico_U(" . $vPK_SupeJerarquico . ", '" . $vSJe_Nombre . "', '" . $vSJe_Abreviatura . "'," . $vSJe_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."')");

        $vMsj = 'Registro Eliminado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfSuperiorJerarquicoEditarForm(Request $r)
    {
        $vPK_SupeJerarquico = $r->input('pPK_SupeJerarquico');

        $vSuperiorJerarquico = \DB::select("CALL sp_SuperiorJerarquico_S(" . $vPK_SupeJerarquico . ");");

        $vSJe_Nombre = $vSuperiorJerarquico[0]->SJe_Nombre;
        $vSJe_Abreviatura = $vSuperiorJerarquico[0]->SJe_Abreviatura;

        return response()->json(['pSJe_Nombre' => $vSJe_Nombre, 'pSJe_Abreviatura' => $vSJe_Abreviatura]);
    }


}
