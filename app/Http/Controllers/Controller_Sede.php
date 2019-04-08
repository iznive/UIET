<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Controller_Sede extends Controller
{
    //
    public function pfSede()
    {
        $vNomModulo = 'Sede';
        $vSede = \DB::select("CALL sp_Sede_S(NULL);");
        $vPais = \DB::select("CALL sp_Pais_S(NULL);");
        return view('Catalogos.uiSede', compact('vNomModulo','vSede', 'vPais'));
    }


    public function pfSedeGuardar(Request $r)
    {
        $vPK_Sede = $r->input('pPK_Sede');
        $vFK_Localidad = $r->input('pFK_Localidad');
        $vSed_Nombre = $r->input('pSed_Nombre');
        $vSed_Direccion = $r->input('pSed_Direccion');
        $vSed_Telefono = $r->input('pSed_Telefono');
        $vSed_Estatus = 1;
        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_Sede == -99) {
            $vSede_I = \DB::select("CALL sp_Sede_I(" . $vFK_Localidad . ", '" . $vSed_Nombre . "', '" . $vSed_Direccion . "', '" . $vSed_Telefono . "', " . $vFK_Usuario . ", '". $vObservacion ."')");
        } else {
            $vSede_U = \DB::select("CALL sp_Sede_U(" . $vPK_Sede . ", " . $vFK_Localidad . ", '" . $vSed_Nombre . "', '" . $vSed_Direccion . "', '" . $vSed_Telefono . "', " . $vSed_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."')");
        }

        $vMsj = 'Registro Guardado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfSedeEliminar(Request $r)
    {
        $vPK_Sede = $r->input('pPK_Sede');
        $vFK_Localidad = 0;
        $vSed_Nombre = '';
        $vSed_Direccion = '';
        $vSed_Telefono = '';
        $vSed_Estatus = 0;
        $vFK_Usuario = 1;
        $vObservacion = '';

        $vSede_U = \DB::select("CALL sp_Sede_U(" . $vPK_Sede . ", " . $vFK_Localidad . ", '" . $vSed_Nombre . "', '" . $vSed_Direccion . "', '" . $vSed_Telefono . "', " . $vSed_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."')");

        $vMsj = 'Registro Eliminado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfSedeEditarForm(Request $r)
    {
        $vPK_Sede = $r->input('pPK_Sede');

        $vSede = \DB::select("CALL sp_Sede_S(" . $vPK_Sede . ");");

        $vSed_Nombre = $vSede[0]->Sed_Nombre;
        $vSed_Direccion = $vSede[0]->Sed_Direccion;
        $vSed_Telefono = $vSede[0]->Sed_Telefono;
        $vPK_Pais = $vSede[0]->PK_Pais;
        $vPK_Entidad = $vSede[0]->PK_Entidad;
        $vPK_Municipio = $vSede[0]->PK_Municipio;
        $vPK_Localidad = $vSede[0]->PK_Localidad;


        $vPais = \DB::select("CALL sp_Pais_S(NULL)");

        $vSePais = '
            <div class="form-group">
                <label> Pais </label>
                <select class="js-example-basic-single js-states form-control SePais" name="SePais" id="SePais" style="width: 100% !important" onchange="funSeEntidad()">
                    <option value="x1" disabled >Seleccionar</option>';

        foreach ($vPais as $vP) {
            if ($vPK_Pais == $vP->PK_Pais) {
                $vSePais .= '
                 <option selected value="' . $vP->PK_Pais . '" >' . $vP->Pai_NombreCorto . '</option>';
            } else {
                $vSePais .= '
                    <option value="' . $vP->PK_Pais . '" >' . $vP->Pai_NombreCorto . '</option>';
            }
        }

        $vSePais .= '
                </select>
            </div>';


        $vEntidad = \DB::select("CALL sp_Entidad_S(NULL," . $vPK_Pais . ")");

        $vSeEntidad = '
            <div class="form-group">
                <label> Entidad Federativa </label>
                <select class="js-example-basic-single js-states form-control SeEntidad" name="SeEntidad" id="SeEntidad" style="width: 100% !important" onchange="funSeMunicipio()">
                    <option value="x1" disabled >Seleccionar</option>';

        foreach ($vEntidad as $vE) {
            if ($vPK_Entidad == $vE->PK_Entidad) {
                $vSeEntidad .= '
                    <option value="' . $vE->PK_Entidad . '" >' . $vE->EFe_Nombre . '</option>';
            } else {
                $vSeEntidad .= '
                    <option selected value="' . $vE->PK_Entidad . '" >' . $vE->EFe_Nombre . '</option>';
            }
        }

        $vSeEntidad .= '
                </select>
            </div>';


        $vMunicipio = \DB::select("CALL sp_Municipio_S(NULL," . $vPK_Entidad . ")");

        $vSeMunicipio = '
            <div class="form-group">
                <label> Municipio </label>
                <select class="js-example-basic-single js-states form-control SeMunicipio" name="SeMunicipio" id="SeMunicipio" style="width: 100% !important" onchange="funSeLocalidad()">
                    <option value="x1" disabled>Seleccionar</option>';

        foreach ($vMunicipio as $vM) {
            if ($vPK_Municipio == $vM->PK_Municipio) {
                $vSeMunicipio .= '
                    <option selected value="' . $vM->PK_Municipio . '" >' . $vM->Mun_Nombre . '</option>';
            } else {
                $vSeMunicipio .= '
                    <option value="' . $vM->PK_Municipio . '" >' . $vM->Mun_Nombre . '</option>';
            }
        }

        $vSeMunicipio .= '
                </select>
            </div>';



        $vLocalidad = \DB::select("CALL sp_Localidad_S(NULL," . $vPK_Municipio . ")");

        $vSeLocalidad = '
            <div class="form-group">
                <label class="control-label"> Localidad <span class="symbol required"></span> </label>
                <select class="js-example-basic-single js-states form-control SeLocalidad" name="SeLocalidad" id="SeLocalidad" style="width: 100% !important">
                    <option value="x1" disabled>Seleccionar</option>';

        foreach ($vLocalidad as $vL) {
            if ($vPK_Localidad == $vL->PK_Localidad) {
                $vSeLocalidad .= '
                    <option selected value="' . $vL->PK_Localidad . '" >' . $vL->Loc_Nombre . '</option>';
            } else {
                $vSeLocalidad .= '
                    <option value="' . $vL->PK_Localidad . '" >' . $vL->Loc_Nombre . '</option>';
            }
        }

        $vSeLocalidad .= '
                </select>
            </div>';

        return response()->json(['pSed_Nombre' => $vSed_Nombre, 'pSed_Direccion' => $vSed_Direccion, 'pSed_Telefono' => $vSed_Telefono, 'pSePais' => $vSePais, 'pSeEntidad' => $vSeEntidad, 'pSeMunicipio' => $vSeMunicipio, 'pSeLocalidad' => $vSeLocalidad]);
    }


}
