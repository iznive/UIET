<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Controller_CategoriaPuesto extends Controller
{
    //
    public function pfCategoriaPuesto()
    {
        $vNomModulo = 'Categoría de Puesto';
        $vCategoriaPuesto = \DB::select("CALL sp_CategoriaPuesto_S(NULL);");
        return view('Catalogos.uiCategoriaPuesto', compact('vCategoriaPuesto', 'vNomModulo'));
    }

    public function pfCategoriaPuestoGuardar(Request $r)
    {
        $vPK_CatePuesto = $r->input('pPK_CatePuesto');
        $vCPu_Nombre = $r->input('pCPu_Nombre');
        $vCPu_Estatus = 1;
        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_CatePuesto == -99) {
            $vCatePuesto_I = \DB::select("CALL sp_CategoriaPuesto_I('" . $vCPu_Nombre . "', " . $vFK_Usuario . ", '". $vObservacion ."')");
        } else {
            $vCatePuesto_U = \DB::select("CALL sp_CategoriaPuesto_U(" . $vPK_CatePuesto . ", '" . $vCPu_Nombre . "', " . $vCPu_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."')");
        }

        $vMsj = 'Registro Guardado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfCategoriaPuestoEliminar(Request $r)
    {
        $vPK_CatePuesto = $r->input('pPK_CatePuesto');
        $vCPu_Nombre = '';
        $vCPu_Estatus = 0;
        $vFK_Usuario = 1;
        $vObservacion = '';

        $vCatePuesto_U = \DB::select("CALL sp_CategoriaPuesto_U(" . $vPK_CatePuesto . ", '" . $vCPu_Nombre . "', " . $vCPu_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."')");

        $vMsj = 'Registro Eliminado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfCategoriaPuestoEditarForm(Request $r)
    {
        $vPK_CatePuesto = $r->input('pPK_CatePuesto');

        $vCatePuesto = \DB::select("CALL sp_CategoriaPuesto_S(" . $vPK_CatePuesto . ");");

        $vCPu_Nombre = $vCatePuesto[0]->CPu_Nombre;

        return response()->json(['pCPu_Nombre' => $vCPu_Nombre]);
    }


}
