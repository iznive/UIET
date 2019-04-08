<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Controller_Puesto extends Controller
{
    //
    public function pfPuesto()
    {
        $vNomModulo = 'Puesto';
        $vPuesto = \DB::select("CALL sp_Puesto_S(NULL);");
        $vCatPue = \DB::select("CALL sp_CategoriaPuesto_S(NULL);");
        return view('Catalogos.uiPuesto', compact('vPuesto', 'vNomModulo', 'vCatPue'));
    }

    public function pfPuestoGuardar(Request $r)
    {
        $vPK_Puesto = $r->input('pPK_Puesto');
        $vFK_CatePuesto = $r->input('pFK_CatePuesto');
        $vPue_Nombre = $r->input('pPue_Nombre');
        $vPue_Estatus = 1;
        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_Puesto == -99) {
            $vPuesto_I = \DB::select("CALL sp_Puesto_I(" . $vFK_CatePuesto . ", '" . $vPue_Nombre . "', " . $vFK_Usuario . ", '". $vObservacion ."')");
        } else {
            $vPuesto_U = \DB::select("CALL sp_Puesto_U(" . $vPK_Puesto . ", " . $vFK_CatePuesto . ", '" . $vPue_Nombre . "', " . $vPue_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."')");
        }

        $vMsj = 'Registro Guardado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfPuestoEliminar(Request $r)
    {
        $vPK_Puesto = $r->input('pPK_Puesto');
        $vFK_CatePuesto = 0;
        $vPue_Nombre = '';
        $vPue_Estatus = 0;
        $vFK_Usuario = 1;
        $vObservacion = '';

        $vPuesto_U = \DB::select("CALL sp_Puesto_U(" . $vPK_Puesto . ", " . $vFK_CatePuesto . ", '" . $vPue_Nombre . "', " . $vPue_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."')");

        $vMsj = 'Registro Eliminado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfPuestoEditarForm(Request $r)
    {
        $vPK_Puesto = $r->input('pPK_Puesto');

        $vPuesto = \DB::select("CALL sp_Puesto_S(" . $vPK_Puesto . ");");

        $vPue_Nombre = $vPuesto[0]->Pue_Nombre;
        $vPK_CatePuesto = $vPuesto[0]->PK_CatePuesto;

        $vCatPue = \DB::select("CALL sp_CategoriaPuesto_S(NULL)");

        $vSeCatPuesto = '
            <div class="form-group">
                <label class="control-label"> Categoría <span class="symbol required"></span></label>
                <select class="js-example-basic-single js-states form-control SeCatPuesto" name="SeCatPuesto" id="SeCatPuesto" style="width: 100% !important">
                    <option value="x1" disabled>Seleccionar</option>';

        foreach ($vCatPue as $vC) {
            if ($vPK_CatePuesto == $vC->PK_CatePuesto) {
                $vSeCatPuesto .= '
                 <option selected value="' . $vC->PK_CatePuesto . '" >' . $vC->CPu_Nombre . '</option>';
            } else {
                $vSeCatPuesto .= '
                    <option value="' . $vC->PK_CatePuesto . '" >' . $vC->CPu_Nombre . '</option>';
            }
        }

        $vSeCatPuesto .= '
                </select>
            </div>';

        return response()->json(['pPue_Nombre' => $vPue_Nombre, 'pSeCatPuesto' => $vSeCatPuesto]);
    }


}
