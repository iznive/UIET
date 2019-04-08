<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Controller_Localidad extends Controller
{
    //
    public function pfLocalidad()
    {
        $vNomModulo = 'Localidad';
        $vLocalidad = \DB::select("CALL sp_Localidad_S(NULL,NULL);");
        $vMunicipio = \DB::select("CALL sp_Municipio_S(NULL, NULL);");
        return view('Catalogos.uiLocalidad', compact('vLocalidad', 'vNomModulo', 'vMunicipio'));
    }

    public function pfLocalidadGuardar(Request $r)
    {
        $vPK_Localidad = $r->input('pPK_Localidad');
        $vFK_Municipio = $r->input('pFK_Municipio');
        $vLoc_Nombre = $r->input('pLoc_Nombre');
        $vLoc_CP = $r->input('pLoc_CP');
        $vLoc_Estatus = 1;
        $vFK_Usuario = 1;
        $vObservacion = $r->input('pObservacion');

        if ($vPK_Localidad == -99) {
             $vQuery = "CALL sp_Localidad_I(" . $vFK_Municipio . ", " . $vLoc_Nombre . ", " . $vLoc_CP . " , " . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
            $vLocalidad_I = \DB::select("CALL sp_Localidad_I(" . $vFK_Municipio . ", '" . $vLoc_Nombre . "'," . $vLoc_CP . ", " . $vFK_Usuario . ", '". $vObservacion ."', '" . $vQuery . "')");
        } else {
            $vQuery = "CALL sp_Localidad_U(" . $vPK_Localidad . "," . $vFK_Municipio . ", " . $vLoc_Nombre . ", " . $vLoc_CP . " , " . $vLoc_Estatus . "," . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
            $vLocalidad_U = \DB::select("CALL sp_Localidad_U(" . $vPK_Localidad . ", " . $vFK_Municipio . ", '" . $vLoc_Nombre . "', " . $vLoc_CP . ", " . $vLoc_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."', '" . $vQuery . "')");
        }

        $vMsj = 'Registro Guardado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }
    public function pfLocalidadEliminar(Request $r)
    {
        $vPK_Localidad = $r->input('pPK_Localidad');
        $vFK_Municipio = 0;
        $vLoc_Nombre = '';
        $vLoc_CP = '';
        $vLoc_Estatus = 0;
        $vFK_Usuario = 1;
        $vObservacion = '';

        $vQuery = "CALL sp_Localidad_U(" . $vPK_Localidad . ", " . $vFK_Municipio . "," . $vLoc_Nombre . ", " . $vLoc_CP . "," . $vLoc_Estatus . ", " . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
        $vLocalidad_U = \DB::select("CALL sp_Localidad_U(" . $vPK_Localidad . ", " . $vFK_Municipio . ", '" . $vLoc_Nombre . "', '" . $vLoc_CP . "', " . $vLoc_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."', '" . $vQuery . "')");

        $vMsj = 'Registro Eliminado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }
   
    public function pfLocalidadEditarForm(Request $r)
    {
        $vPK_Localidad = $r->input('pPK_Localidad');

        $vLocalidad = \DB::select("CALL sp_Localidad_S(" . $vPK_Localidad . ", NULL);");

        $vLoc_Nombre = $vLocalidad[0]->Loc_Nombre;
        $vLoc_CP = $vLocalidad[0]->Loc_CP;
        $vPK_Municipio = $vLocalidad[0]->PK_Municipio;

        $vMunicipio = \DB::select("CALL sp_Municipio_S(NULL, NULL)");

        $vSeFK_Municipio = '
            <div class="form-group">
                <label class="control-label"> Municipio <span class="symbol required"></span></label>
                <select class="js-example-basic-single js-states form-control SeMunicipio" name="SeMunicipio" id="SeMunicipio" style="width: 100% !important">
                    <option value="x1" disabled>Seleccionar</option>';

        foreach ($vMunicipio as $vMun) {
            if ($vPK_Municipio == $vMun->PK_Municipio) {
                $vSeFK_Municipio .= '
                 <option selected value="' . $vMun->PK_Municipio . '" >' . $vMun->Mun_Nombre . '('. $vMun->EFe_Nombre . ', ' . $vMun->Pai_NombreCorto .')</option>';
            } else {
                $vSeFK_Municipio .= '
                    <option value="' . $vMun->PK_Municipio . '" >' . $vMun->Mun_Nombre . '('. $vMun->EFe_Nombre . ', ' . $vMun->Pai_NombreCorto .')</option>';
            }
        }

        $vSeFK_Municipio .= '
                </select>
            </div>';

        return response()->json(['pLoc_Nombre' => $vLoc_Nombre, 'pLoc_CP' => $vLoc_CP, 'pSeMunicipio' => $vSeFK_Municipio]);
    }

}
