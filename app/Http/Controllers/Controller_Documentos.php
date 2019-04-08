<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Controller_Documentos extends Controller
{
    //
    public function pfDocumentos()
    {
        $vNomModulo = 'Documentos';
        $vDocumentos = \DB::select("CALL sp_Documentos_S(NULL);");
        $vFK_DocuClasificacion = \DB::select("CALL sp_DocumentoClasificacion_S(NULL);");
        $vFK_NivelReq = \DB::select("CALL sp_NivelRequerimiento_S(NULL);");
        return view('Catalogos.uiDocumentos', compact('vDocumentos', 'vNomModulo', 'vFK_DocuClasificacion', 'vFK_NivelReq'));
    }

    public function pfDocumentosGuardar(Request $r)
    {
        $vPK_Documentos = $r->input('pPK_Documentos');
        $vFK_DocuClasificacion = $r->input('pFK_DocuClasificacion');
        $vFK_NivelReq = $r->input('pFK_NivelReq');
        $vDoc_Nombre = $r->input('pDoc_Nombre');
        $vDoc_Indicacion = $r->input('pDoc_Indicacion');
        $vDoc_Estatus = 1;
        $vFK_Usuario = 1;
        $vObservacion = $r->input('pObservacion');

        if ($vPK_Documentos == -99) {
            $vQuery = "CALL sp_Documentos_I(" . $vFK_DocuClasificacion . ", " . $vFK_NivelReq . ", " . $vDoc_Nombre . ", " . $vDoc_Indicacion . " , " . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
            
            $vDocumentos_I = \DB::select("CALL sp_Documentos_I(" . $vFK_DocuClasificacion . ", " . $vFK_NivelReq . ", '" . $vDoc_Nombre . "', '" . $vDoc_Indicacion . "', " . $vFK_Usuario . ", '". $vObservacion ."', '" . $vQuery . "')");
        } else {
            $vQuery = "CALL sp_Documentos_U(" . $vPK_Documentos . ", " . $vFK_DocuClasificacion . ", " . $vFK_NivelReq . ", " . $vDoc_Nombre . ", " . $vDoc_Indicacion . " , " . $vDoc_Estatus . ", " . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
            
            $vDocumentos_U = \DB::select("CALL sp_Documentos_U(" . $vPK_Documentos . ", " . $vFK_DocuClasificacion . ", " . $vFK_NivelReq . ", '" . $vDoc_Nombre . "', '" . $vDoc_Indicacion . "', " . $vDoc_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."', '" . $vQuery . "')");
        }

        $vMsj = 'Registro Guardado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfDocumentosEliminar(Request $r)
    {
        $vPK_Documentos = $r->input('pPK_Documentos');
        $vFK_DocuClasificacion = 0;
        $vDoc_Nombre = '';
        $vDoc_Indicacion = '';
        $vFK_NivelReq = 0;
        $vDoc_Estatus = 0;
        $vFK_Usuario = 1;
        $vObservacion = '';

        $vQuery = "CALL sp_Documentos_U(" . $vPK_Documentos . "," . $vFK_DocuClasificacion . ", " . $vDoc_Nombre . ", " . $vDoc_Indicacion . " , " . $vFK_NivelReq . " , " . $vDoc_Estatus . "," . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
        $vDocumentos_U = \DB::select("CALL sp_Documentos_U(" . $vPK_Documentos . ", " . $vFK_DocuClasificacion . ", '" . $vDoc_Nombre . "', '" . $vDoc_Indicacion . "', " . $vFK_NivelReq . ", " . $vDoc_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."', '" . $vQuery . "')");

        $vMsj = 'Registro Eliminado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfDocumentosEditarForm(Request $r)
    {
        $vPK_Documentos = $r->input('pPK_Documentos');

        $vDocumentos = \DB::select("CALL sp_Documentos_S(" . $vPK_Documentos . ");");

        $vDoc_Nombre = $vDocumentos[0]->Doc_Nombre;
        $vDoc_Indicacion = $vDocumentos[0]->Doc_Indicacion;
        $vPK_DocuClasificacion = $vDocumentos[0]->PK_DocuClasificacion;
        $vPK_NivelReq = $vDocumentos[0]->PK_NivelReq;

        $vDocCla = \DB::select("CALL sp_DocumentoClasificacion_S(NULL)");

        $vSeDocuCla = '
            <div class="form-group">
                <label class="control-label"> Categoría <span class="symbol required"></span></label>
                <select class="js-example-basic-single js-states form-control SeClasificacion" name="SeClasificacion" id="SeClasificacion" style="width: 100% !important">
                    <option value="x1" disabled>Seleccionar</option>';

        foreach ($vDocCla as $vDocCla) {
            if ($vPK_DocuClasificacion == $vDocCla->PK_DocuClasificacion) {
                $vSeDocuCla .= '
                 <option selected value="' . $vDocCla->PK_DocuClasificacion . '" >' . $vDocCla->DCl_Nombre . '</option>';
            } else {
                $vSeDocuCla .= '
                    <option value="' . $vDocCla->PK_DocuClasificacion . '" >' . $vDocCla->DCl_Nombre . '</option>';
            }
        }

        $vSeDocuCla .= '
                </select>
            </div>';

        $vNivelReq = \DB::select("CALL sp_NivelRequerimiento_S(NULL)");

        $vSeNivel = '
            <div class="form-group">
                <label class="control-label"> Nivel de Requerimiento <span class="symbol required"></span></label>
                <select class="js-example-basic-single js-states form-control SeNivelRequerimiento" name="SeNivelRequerimiento" id="SeNivelRequerimiento" style="width: 100% !important">
                    <option value="x1" disabled>Seleccionar</option>';

        foreach ($vNivelReq as $vN) {
            if ($vPK_NivelReq == $vN->PK_NivelReq) {
                $vSeNivel .= '
                 <option selected value="' . $vN->PK_NivelReq . '" >' . $vN->NivelReq_Nombre. '</option>';
            } else {
                $vSeNivel .= '
                    <option value="' . $vN->PK_NivelReq . '" >' . $vN->NivelReq_Nombre . '</option>';
            }
        }

        $vSeNivel .= '
                </select>
            </div>';



        return response()->json(['pDoc_Nombre' => $vDoc_Nombre, 'pDoc_Indicacion' => $vDoc_Indicacion, 'pSeClasificacion' => $vSeDocuCla, 'pSeNivelRequerimiento' => $vSeNivel]);
    }


}
