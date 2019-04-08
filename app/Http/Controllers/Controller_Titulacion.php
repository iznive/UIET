<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Controller_Titulacion extends Controller
{
    //

    public function pfTitulacion_Alta()
    {
        $vNomModulo = 'Alta Titulación';

        $vProfAsoc = \DB::select("CALL sp_ProfesionalAsociado_S(NULL);");
        $vDepa = \DB::select("CALL sp_DepartamentoParaTitulacion_S();");
        $vAlum = \DB::select("CALL sp_AlumnoParaTitulacion_S(NULL, NULL, NULL, NULL, NULL);");
        $vTituModa = \DB::select("CALL sp_TitulacionModalidad_S(NULL);");
        $vPers = \DB::select("CALL sp_PersonalSimple_S(NULL)");

        return view('Titulacion.uiTitulacionAlta', compact('vNomModulo', 'vProfAsoc', 'vDepa', 'vAlum', 'vTituModa', 'vPers'));

    }
}
