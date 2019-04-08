<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Controller_Municipio extends Controller
{
     //
    public function pfMunicipio()
    {
        $vNomModulo = 'Municipio';
        $vMunicipio = \DB::select("CALL sp_Municipio_S(NULL, NULL);");
        $vEntidad = \DB::select("CALL sp_Entidad_S(NULL, NULL);");
        return view('Catalogos.uiMunicipio', compact('vMunicipio', 'vNomModulo', 'vEntidad'));
    }


    public function pfMunicipioGuardar(Request $r)
    {
        $vPK_Municipio = $r->input('pPK_Municipio');
        $vFK_Entidad = $r->input('pFK_Entidad');
        $vMun_Nombre = $r->input('pMun_Nombre');
        $vMun_Estatus = 1;
        $vFK_Usuario = 1;
        $vObservacion = $r->input('pObservacion');

        if ($vPK_Municipio == -99) {
            $vQuery = "CALL sp_Municipio_I(" . $vFK_Entidad . ", " . $vMun_Nombre . ", " . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
            $vMunicipio_I = \DB::select("CALL sp_Municipio_I(" . $vFK_Entidad . ", '" . $vMun_Nombre . "', " . $vFK_Usuario . ", '". $vObservacion ."','" . $vQuery . "')");
        } else {
            $vQuery = "CALL sp_Municipio_U(" . $vPK_Municipio . "," . $vFK_Entidad . ", " . $vMun_Nombre . " , " . $vMun_Estatus . "," . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
            $vMunicipio_U = \DB::select("CALL sp_Municipio_U(" . $vPK_Municipio . ", " . $vFK_Entidad . ", '" . $vMun_Nombre . "', " . $vMun_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."','" . $vQuery . "')");
        }

        $vMsj = 'Registro Guardado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }
     public function pfMunicipioEliminar(Request $r)
    {
        $vPK_Municipio = $r->input('pPK_Municipio');
        $vFK_Entidad = 0;
        $vMun_Nombre = '';
        $vMun_Estatus = 0;
        $vFK_Usuario = 1;
        $vObservacion = '';

        $vQuery = "CALL sp_Municipio_U(" . $vPK_Municipio . ", " . $vFK_Entidad . "," . $vMun_Nombre . "," . $vMun_Estatus . ", " . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
        $vMunicipio_U = \DB::select("CALL sp_Municipio_U(" . $vPK_Municipio . ", " . $vFK_Entidad . ", '" . $vMun_Nombre . "', " . $vMun_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."', '" . $vQuery . "')");

        $vMsj = 'Registro Eliminado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfMunicipioEditarForm(Request $r)
    {
        $vPK_Municipio = $r->input('pPK_Municipio');

        $vMunicipio = \DB::select("CALL sp_Municipio_S(" . $vPK_Municipio . ", NULL);");

        $vMun_Nombre = $vMunicipio[0]->Mun_Nombre;
        $vPK_Entidad = $vMunicipio[0]->PK_Entidad;

        $vSeEntidad = \DB::select("CALL sp_Entidad_S(NULL,NULL)");

        $vSeFK_Entidad = '
            <div class="form-group">
                <label class="control-label"> Entidad <span class="symbol required"></span></label>
                <select class="js-example-basic-single js-states form-control SeFK_Entidad" name="SeFK_Entidad" id="SeFK_Entidad" style="width: 100% !important">
                    <option value="x1" disabled>Seleccionar</option>';

        foreach ($vSeEntidad as $vEnt) {
            if ($vPK_Entidad == $vEnt->PK_Entidad) {
                $vSeFK_Entidad .= '
                 <option selected value="' . $vEnt->PK_Entidad . '" >' . $vEnt->EFe_Nombre . ' (' . $vEnt->Pai_NombreCorto . ')</option>';
            } else {
                $vSeFK_Entidad .= '
                    <option value="' . $vEnt->PK_Entidad . '" >' . $vEnt->EFe_Nombre . ' (' . $vEnt->Pai_NombreCorto . ')</option>';
            }
        }

        $vSeFK_Entidad .= '
                </select>
            </div>';

        return response()->json(['pMun_Nombre' => $vMun_Nombre, 'pSeFK_Entidad' => $vSeFK_Entidad]);
    }
}
