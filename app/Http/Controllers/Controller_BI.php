<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Controller_BI extends Controller
{

    public function pfBI_RH_General()
    {
        $vNomModulo = 'BI: Recursos Humanos || General';
        $vRH_PersSede = \DB::select("CALL sp_Esta_RH_PersonalSede_S();");
        return view('Estadisticas.uiRH_General', compact('vRH_PersSede', 'vNomModulo'));
    }

    public function pfBI_RH_Personal()
    {
        $vNomModulo = 'BI: Recursos Humanos || Personal';
        $vSede = \DB::select("CALL sp_Sede_S(NULL);");
        $vTipoCont = \DB::select("CALL sp_TipoContrato_S(NULL);");
        $vSupeJera = \DB::select("CALL sp_SuperiorJerarquico_S(NULL);");
        $vCatePues = \DB::select("CALL sp_CategoriaPuesto_S(NULL);");
        $vDepa = \DB::select("CALL sp_Departamento_S(NULL, NULL);");
        $vEstaCivi = \DB::select("CALL sp_EstadoCivil_S(NULL);");
        $vEnti = \DB::select("CALL sp_Entidad_S(NULL, NULL);");

        $vReporte = \DB::select("CALL sp_Reporte_S(NULL, 'RH_Personal');");

        return view('BI.uiRH_Personal', compact('vSede', 'vTipoCont','vSupeJera', 'vDepa','vCatePues', 'vEstaCivi','vEnti','vReporte','vNomModulo'));
    }
}
