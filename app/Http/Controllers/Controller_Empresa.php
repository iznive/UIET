<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Controller_Empresa extends Controller
{
    //
    public function pfEmpresa()
    {
        $vNomModulo = 'Empresa';
        $vEmpresa = \DB::select("CALL sp_Empresa_S(NULL);");
        return view('Catalogos.uiEmpresa', compact('vEmpresa', 'vNomModulo'));
    }

    public function pfEmpresaGuardar(Request $r)
    {
        $vPK_Empresa = $r->input('pPK_Empresa');
        $vEmp_RFC = $r->input('pEmp_RFC');
        $vEmp_Nombre = $r->input('pEmp_Nombre');
        $vEmp_Direccion = $r->input('pEmp_Direccion');
        $vEmp_Web = $r->input('pEmp_Web');
        $vEmp_Estatus = 1;
        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_Empresa == -99) {
            $vEmpresa_I = \DB::select("CALL sp_Empresa_I('" . $vEmp_RFC . "', '" . $vEmp_Nombre . "', '" . $vEmp_Direccion . "', '" . $vEmp_Web . "', " . $vFK_Usuario . ", '". $vObservacion ."')");
        } else {
            $vEmpresa_U = \DB::select("CALL sp_Empresa_U(" . $vPK_Empresa . ", '" . $vEmp_RFC . "', '" . $vEmp_Nombre . "', '" . $vEmp_Direccion . "', '" . $vEmp_Web . "', " . $vEmp_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."')");
        }

        $vMsj = 'Registro Guardado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }


    public function pfEmpresaEditarForm(Request $r)
    {
        $vPK_Empresa = $r->input('pPK_Empresa');

        $vEmpresa = \DB::select("CALL sp_Empresa_S(" . $vPK_Empresa . ");");

        $vEmp_RFC = $vEmpresa[0]->Emp_RFC;
        $vEmp_Nombre = $vEmpresa[0]->Emp_Nombre;
        $vEmp_Direccion = $vEmpresa[0]->Emp_Direccion;
        $vEmp_Web = $vEmpresa[0]->Emp_Web;

        return response()->json(['pEmp_RFC' => $vEmp_RFC, 'pEmp_Nombre' => $vEmp_Nombre, 'pEmp_Direccion' => $vEmp_Direccion, 'pEmp_Web' => $vEmp_Web]);
    }


}
