<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Controller_Entidad extends Controller
{
     //
    public function pfEntidad()
    {
        $vNomModulo = 'Entidad';
        $vEntidad = \DB::select("CALL sp_Entidad_S(NULL, NULL);");
        $vPais = \DB::select("CALL sp_Pais_S(NULL)");
        return view('Catalogos.uiEntidad', compact('vEntidad', 'vNomModulo', 'vPais'));
    }

    public function pfEntidadGuardar(Request $r)
    {
        $vPK_Entidad = $r->input('pPK_Entidad');
        $vFK_Pais = $r->input('pFK_Pais');
        $vEFe_Nombre = $r->input('pEFe_Nombre');
        $vEFe_Estatus = 1;
        $vFK_Usuario = 1;
        $vObservacion = $r->input('pObservacion');

        if ($vPK_Entidad == -99) {
            $vQuery = "CALL sp_Entidad_I(" . $vFK_Pais . ", " . $vEFe_Nombre . ", " . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
            $vEntidad_I = \DB::select("CALL sp_Entidad_I(" . $vFK_Pais . ", '" . $vEFe_Nombre . "', " . $vFK_Usuario . ", '". $vObservacion ."', '" . $vQuery . "')");
        } else {
            $vQuery = "CALL sp_Entidad_U(" . $vPK_Entidad . "," . $vFK_Pais . ", " . $vEFe_Nombre . ", " . $vEFe_Estatus . "," . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
            $vEntidad_U = \DB::select("CALL sp_Entidad_U(" . $vPK_Entidad . ", " . $vFK_Pais . ", '" . $vEFe_Nombre . "', " . $vEFe_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."', '" . $vQuery . "')");
        }

        $vMsj = 'Registro Guardado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfEntidadEliminar(Request $r)
    {
        $vPK_Entidad = $r->input('pPK_Entidad');
        $vFK_Pais = 0;
        $vEFe_Nombre = '';
        $vEFe_Estatus = 0;
        $vFK_Usuario = 1;
        $vObservacion = '';

        $vQuery_U = \DB::select("CALL sp_Entidad_U(" . $vPK_Entidad . ", " . $vFK_Pais . ", '" . $vEFe_Nombre . "', " . $vEFe_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."', vQuery)");
        $vEntidad_U = \DB::select("CALL sp_Entidad_U(" . $vPK_Entidad . ", '" . $vFK_Pais . "','" . $vEFe_Nombre . "'," . $vEFe_Estatus . ", " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");

        $vMsj = 'Registro Eliminado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfEntidadEditarForm(Request $r)
    {
        $vPK_Entidad = $r->input('pPK_Entidad');

        $vEntidad = \DB::select("CALL sp_Entidad_S(" . $vPK_Entidad . ", NULL);");

        $vEFe_Nombre = $vEntidad[0]->EFe_Nombre;
        $vPK_Pais = $vEntidad[0]->PK_Pais;

        $vPais = \DB::select("CALL sp_Pais_S(NULL);");

        $vSeFK_Pais = '
            <div class="form-group">
                <label class="control-label"> Pais <span class="symbol required"></span></label>
                <select class="js-example-basic-single js-states form-control SeFK_Pais" name="SeFK_Pais" id="SeFK_Pais" style="width: 100% !important">
                    <option value="x1" disabled>Seleccionar</option>';

        foreach ($vPais as $vPai) {
            if ($vPK_Pais == $vPai->PK_Pais) {
                $vSeFK_Pais .= '
                 <option selected value="' . $vPai->PK_Pais . '" >' . $vPai->Pai_NombreCorto . '</option>';
            } else {
                $vSeFK_Pais .= '
                    <option value="' . $vPai->PK_Pais . '" >' . $vPai->Pai_NombreCorto . '</option>';
            }
        }

        $vSeFK_Pais .= '
                </select>
            </div>';

        return response()->json(['pEFe_Nombre' => $vEFe_Nombre, 'pSeFK_Pais' => $vSeFK_Pais]);
    }
}
