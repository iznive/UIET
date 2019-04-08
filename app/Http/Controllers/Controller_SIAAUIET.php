<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controller_SIAAUIET extends Controller
{
    //
    public function pfPrincipal()
    {
        return view('uiPrincipal');
    }

    public function pfBitacora(Request $r)
    {
        $vBit_Tabla = $r->input('pBit_Tabla');
        $vBit_PK = $r->input('pBit_PK');
        $x = 1;

        $vBitacora = \DB::select("CALL sp_Bitacora_S('" . $vBit_Tabla . "', " . $vBit_PK . ");");

        $vTaBitacora = '
            <table class="table table-striped table-bordered table-hover table-full-width col-sm-12" id="sample_2" style="whith:100% !important;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Usuario</th>
                        <th>Acción</th>
                        <th>Observación</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($vBitacora as $vB) {
            $vTaBitacora .= '
                <tr id="tr_' . $vB->PK_Bitacora . '">
                    <td class="text-bold">
                        ' . $x . '
                    </td>
                    <td class="text-bold">
                    ' . $vB->Usuario_Nombre . '
                    </td>
                    <td>
                    ' . $vB->Bit_Accion_Def . '
                    </td>
                    <td>
                    ' . $vB->Bit_Observacion . '
                    </td>
                    <td>
                    ' . date('d/m/Y h:i a', strtotime($vB->Bit_Fecha)) . '
                    </td>
                </tr>';

            $x++;
        }

        $vTaBitacora .= '
            </tbody>
        </table>';

        return response()->json(['pTaBitacora' => $vTaBitacora]);
    }

    public function pfSeEntidad(Request $r)
    {
        $vPK_Pais = $r->input('pPK_Pais');

        $vEntidad = \DB::select("CALL sp_Entidad_S(NULL, " . $vPK_Pais . ")");

        $vSeEntidad = '
            <div class="form-group">
                <label> Entidad Federativa <span class="symbol required"></span></label>
                <select class="js-example-basic-single js-states form-control SeEntidad" name="SeEntidad" id="SeEntidad" style="width: 100% !important" onchange="funSeMunicipio()">
                    <option value="x1" selected disabled >Seleccionar</option>';

        foreach ($vEntidad as $vE) {
            $vSeEntidad .= '
                    <option value="' . $vE->PK_Entidad . '" >' . $vE->EFe_Nombre . '</option>';
        }

        $vSeEntidad .= '
                </select>
            </div>';

        return response()->json(['divSeEntidad' => $vSeEntidad]);
    }


    public function pfSeMunicipio(Request $r)
    {
        $vPK_Entidad = $r->input('pPK_Entidad');

        $vMunicipio = \DB::select("CALL sp_Municipio_S(NULL," . $vPK_Entidad . ")");

        $vSeMunicipio = '
            <div class="form-group">
                <label> Municipio <span class="symbol required"></span></label>
                <select class="js-example-basic-single js-states form-control SeMunicipio" name="SeMunicipio" id="SeMunicipio" style="width: 100% !important" onchange="funSeLocalidad()">
                    <option value="x1" disabled selected>Seleccionar</option>';

        foreach ($vMunicipio as $vM) {
            $vSeMunicipio .= '
                    <option value="' . $vM->PK_Municipio . '" >' . $vM->Mun_Nombre . '</option>';
        }

        $vSeMunicipio .= '
                </select>
            </div>';

        return response()->json(['divSeMunicipio' => $vSeMunicipio]);
    }


    public function pfSeLocalidad(Request $r)
    {
        $vPK_Municipio = $r->input('pPK_Municipio');

        $vLocalidad = \DB::select("CALL sp_Localidad_S(NULL, " . $vPK_Municipio . ")");

        $vSeLocalidad = '
            <div class="form-group">
                <label class="control-label"> Localidad <span class="symbol required"></span> </label>
                <select class="js-example-basic-single js-states form-control SeLocalidad" name="SeLocalidad" id="SeLocalidad" style="width: 100% !important">
                    <option value="x1" disabled selected>Seleccionar</option>';

        foreach ($vLocalidad as $vL) {
            $vSeLocalidad .= '
                    <option value="' . $vL->PK_Localidad . '" >' . $vL->Loc_Nombre . '</option>';
        }

        $vSeLocalidad .= '
                </select>
            </div>';


        return response()->json(['divSeLocalidad' => $vSeLocalidad]);
    }



    public function pfSeEntidad2(Request $r)
    {
        $vPK_Pais = $r->input('pPK_Pais');

        $vEntidad = \DB::select("CALL sp_Entidad_S(NULL, " . $vPK_Pais . ")");

        $vSeEntidad = '
            <div class="form-group">
                <label> Entidad Federativa <span class="symbol required"></span></label>
                <select class="js-example-basic-single js-states form-control SeEntidad2" name="SeEntidad2" id="SeEntidad2" style="width: 100% !important" onchange="funSeMunicipio2()">
                    <option value="x1" selected disabled >Seleccionar</option>';

        foreach ($vEntidad as $vE) {
            $vSeEntidad .= '
                    <option value="' . $vE->PK_Entidad . '" >' . $vE->EFe_Nombre . '</option>';
        }

        $vSeEntidad .= '
                </select>
            </div>';

        return response()->json(['divSeEntidad2' => $vSeEntidad]);
    }


    public function pfSeMunicipio2(Request $r)
    {
        $vPK_Entidad = $r->input('pPK_Entidad');

        $vMunicipio = \DB::select("CALL sp_Municipio_S(NULL, " . $vPK_Entidad . ")");

        $vSeMunicipio = '
            <div class="form-group">
                <label> Municipio <span class="symbol required"></span></label>
                <select class="js-example-basic-single js-states form-control SeMunicipio2" name="SeMunicipio2" id="SeMunicipio2" style="width: 100% !important" onchange="funSeLocalidad2()">
                    <option value="x1" disabled selected>Seleccionar</option>';

        foreach ($vMunicipio as $vM) {
            $vSeMunicipio .= '
                    <option value="' . $vM->PK_Municipio . '" >' . $vM->Mun_Nombre . '</option>';
        }

        $vSeMunicipio .= '
                </select>
            </div>';

        return response()->json(['divSeMunicipio2' => $vSeMunicipio]);
    }


    public function pfSeLocalidad2(Request $r)
    {
        $vPK_Municipio = $r->input('pPK_Municipio');

        $vLocalidad = \DB::select("CALL sp_Localidad_S(NULL, " . $vPK_Municipio . ")");

        $vSeLocalidad = '
            <div class="form-group">
                <label class="control-label"> Localidad <span class="symbol required"></span> </label>
                <select class="js-example-basic-single js-states form-control SeLocalidad2" name="SeLocalidad2" id="SeLocalidad2" style="width: 100% !important">
                    <option value="x1" disabled selected>Seleccionar</option>';

        foreach ($vLocalidad as $vL) {
            $vSeLocalidad .= '
                    <option value="' . $vL->PK_Localidad . '" >' . $vL->Loc_Nombre . '</option>';
        }

        $vSeLocalidad .= '
                </select>
            </div>';


        return response()->json(['divSeLocalidad2' => $vSeLocalidad]);
    }

}
