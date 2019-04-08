<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Controller_Departamento extends Controller
{
    //
    public function pfDepartamento()
    {
        $vNomModulo = 'Departamento';
        $vDepartamento = \DB::select("CALL sp_Departamento_S(NULL);");
        return view('Catalogos.uiDepartamento', compact('vDepartamento', 'vNomModulo'));
    }

    public function pfDepartamentoGuardar(Request $r)
    {
        $vPK_Departamento = $r->input('pPK_Departamento');
        $vDep_Nombre = $r->input('pDep_Nombre');
        $vDep_Abreviatura = $r->input('pDep_Abreviatura');
        $vDep_Estatus = 1;
        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_Departamento == -99) {
            $vDepartamento_I = \DB::select("CALL sp_Departamento_I('" . $vDep_Nombre . "', '" . $vDep_Abreviatura . "', " . $vFK_Usuario . ", '". $vObservacion ."')");
        } else {
            $vDepartamento_U = \DB::select("CALL sp_Departamento_U(" . $vPK_Departamento . ", '" . $vDep_Nombre . "', '" . $vDep_Abreviatura . "', ". $vDep_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."')");
        }

        $vMsj = 'Registro Guardado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfDepartamentoEliminar(Request $r)
    {
        $vPK_Departamento = $r->input('pPK_Departamento');
        $vDep_Nombre = '';
        $vDep_Abreviatura = '';
        $vDep_Estatus = 0;
        $vFK_Usuario = 1;
        $vObservacion = '';

        $vDepartamento_U = \DB::select("CALL sp_Departamento_U(" . $vPK_Departamento . ", '" . $vDep_Nombre . "', '" . $vDep_Abreviatura . "', ". $vDep_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."')");

        $vMsj = 'Registro Eliminado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfDepartamentoEditarForm(Request $r)
    {
        $vPK_Departamento = $r->input('pPK_Departamento');

        $vDepartamento = \DB::select("CALL sp_Departamento_S(" . $vPK_Departamento . ");");

        $vDep_Nombre = $vDepartamento[0]->Dep_Nombre;
        $vDep_Abreviatura = $vDepartamento[0]->Dep_Abreviatura;

        return response()->json(['pDep_Nombre' => $vDep_Nombre,'pDep_Abreviatura' => $vDep_Abreviatura]);
    }


}
