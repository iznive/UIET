<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Controller_Pais extends Controller
{
    public function pfPais()
    {
        $vNomModulo = 'País';
        $vPais = \DB::select("CALL sp_Pais_S(NULL);");
        return view('Catalogos.uiPais', compact('vPais', 'vNomModulo'));
    }

    public function pfPaisGuardar(Request $r)
    {
        $vPK_Pais = $r->input('pPK_Pais');
        $vPai_Nombre = $r->input('pPai_Nombre');
        $vPai_NombreCorto = $r->input('pPai_NombreCorto');
        $vPai_Abreviatura = $r->input('pPai_Abreviatura');
        $vPai_Estatus = 1;
        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_Pais == -99) {
            $vQuery = "CALL sp_Pais_I(" . $vPai_Nombre . ", " . $vPai_NombreCorto . ", " . $vPai_Abreviatura . " , " . $vFK_Usuario . ", " . $vObservacion . ",  vQuery)";
            $vPais_I = \DB::select("CALL sp_Pais_I('" . $vPai_Nombre . "', '" . $vPai_NombreCorto . "', '" . $vPai_Abreviatura . "' , " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");
        } else {
            $vQuery = "CALL sp_Pais_U(" . $vPK_Pais . "," . $vPai_Nombre . ", " . $vPai_NombreCorto . ", " . $vPai_Abreviatura . " , " . $vPai_Estatus . "," . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
            $vPais_U = \DB::select("CALL sp_Pais_U(" . $vPK_Pais . ",'" . $vPai_Nombre . "', '" . $vPai_NombreCorto . "', '" . $vPai_Abreviatura . "' , " . $vPai_Estatus . "," . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");
        }

        $vMsj = 'Registro Guardado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfPaisEliminar(Request $r)
    {
        $vPK_Pais = $r->input('pPK_Pais');
        $vPai_Nombre = $r->input('pPai_Nombre');
        $vPai_NombreCorto = $r->input('pPai_NombreCorto');
        $vPai_Abreviatura = $r->input('pPai_Abreviatura');
        $vPai_Estatus = 0;
        $vFK_Usuario = 1;
        $vObservacion = '';

        $vQuery = "CALL sp_Pais_U(" . $vPK_Pais . ", " . $vPai_Nombre . "," . $vPai_NombreCorto . ", " . $vPai_Abreviatura . "," . $vPai_Estatus . ", " . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
        $vPais_U = \DB::select("CALL sp_Pais_U(" . $vPK_Pais . ", '" . $vPai_Nombre . "','" . $vPai_NombreCorto . "', '" . $vPai_Abreviatura . "'," . $vPai_Estatus . ", " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");

        $vMsj = 'Registro Eliminado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfPaisEditarForm(Request $r)
    {
        $vPK_Pais = $r->input('pPK_Pais');

        $vPais = \DB::select("CALL sp_Pais_S(" . $vPK_Pais . ");");

        $vPai_Nombre = $vPais[0]->Pai_Nombre;
        $vPai_NombreCorto = $vPais[0]->Pai_NombreCorto;
        $vPai_Abreviatura = $vPais[0]->Pai_Abreviatura;

        return response()->json(['pPai_Nombre' => $vPai_Nombre, 'pPai_NombreCorto' => $vPai_NombreCorto, 'pPai_Abreviatura' => $vPai_Abreviatura]);
    }



}
