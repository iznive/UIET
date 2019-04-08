<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Controller_ConocimientoComputo extends Controller
{
    //
    public function pfConocimientoComputo()
    {
        $vNomModulo = 'Conocimiento de computo';
        $vConocimientoComputo = \DB::select("CALL sp_ConocimientoComputo_S(NULL);");
        return view('Catalogos.uiConocimientoComputo', compact('vConocimientoComputo', 'vNomModulo'));
    }

    public function pfConocimientoComputoGuardar(Request $r)
    {
        $vPK_ConocimientoComputo = $r->input('pPK_ConoComputo');
        $vCCo_Nombre = $r->input('pCCo_Nombre');
        $vCCo_Descripcion = $r->input('pCCo_Descripcion');
        $vCCo_Estatus = 1;
        $vFK_Usuario = 1;
        $vObservacion = $r->input('pObservacion');

        if ($vPK_ConocimientoComputo == -99) {
             $vQuery = "CALL sp_ConocimientoComputo_I(" . $vCCo_Nombre . ", " . $vCCo_Descripcion . ", " . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
            $vConocimientoComputo_I = \DB::select("CALL sp_ConocimientoComputo_I('" . $vCCo_Nombre . "', '" . $vCCo_Descripcion . "', " . $vFK_Usuario . ", '". $vObservacion ."', '" . $vQuery . "')");
        } else {
            $vQuery = "CALL sp_ConocimientoComputo_U(" . $vPK_ConocimientoComputo . "," . $vCCo_Nombre . ", " . $vCCo_Descripcion . " , " . $vCCo_Estatus . "," . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
            $vConocimientoComputo_U = \DB::select("CALL sp_ConocimientoComputo_U(" . $vPK_ConocimientoComputo . ", '" . $vCCo_Nombre . "', '" . $vCCo_Descripcion . "', " . $vCCo_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."', '" . $vQuery . "')");
        }

        $vMsj = 'Registro Guardado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfConocimientoComputoEliminar(Request $r)
    {
        $vPK_ConocimientoComputo = $r->input('pPK_ConoComputo');
        $vCCo_Nombre = '';
        $vCCo_Descripcion = '';
        $vCCo_Estatus = 0;
        $vFK_Usuario = 1;
        $vObservacion = '';

        $vQuery = \DB::select("CALL sp_ConocimientoComputo_U(" . $vPK_ConocimientoComputo . ", " . $vCCo_Nombre . ", " . $vCCo_Descripcion . ", " . $vCCo_Estatus . ", " . $vFK_Usuario . ", ". $vObservacion .", vQuery)");
        $vConocimientoComputo_U = \DB::select("CALL sp_ConocimientoComputo_U(" . $vPK_ConocimientoComputo . ", '" . $vCCo_Nombre . "', '" . $vCCo_Descripcion . "', " . $vCCo_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."', '" . $vQuery . "')");

        $vMsj = 'Registro Eliminado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfConocimientoComputoEditarForm(Request $r)
    {
        $vPK_ConocimientoComputo = $r->input('pPK_ConoComputo');

        $vConocimientoComputo = \DB::select("CALL sp_ConocimientoComputo_S(" . $vPK_ConocimientoComputo . ");");

        $vCCo_Nombre = $vConocimientoComputo[0]->CCo_Nombre;
        $vCCo_Descripcion = $vConocimientoComputo[0]->CCo_Descripcion;

        return response()->json(['pCCo_Nombre' => $vCCo_Nombre, 'pCCo_Descripcion' => $vCCo_Descripcion]);
    }


}
