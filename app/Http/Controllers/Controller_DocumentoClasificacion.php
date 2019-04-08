<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Controller_DocumentoClasificacion extends Controller
{
    //
    public function pfDocumentoClasificacion()
    {
        $vNomModulo = 'Clasificación de documentos';
        $vDocumentoClasificacion = \DB::select("CALL sp_DocumentoClasificacion_S(NULL);");
        return view('Catalogos.uiDocumentoClasificacion', compact('vDocumentoClasificacion', 'vNomModulo'));
    }

    public function pfDocumentoClasificacionGuardar(Request $r)
    {
        $vPK_DocumentoClasificacion = $r->input('pPK_DocuClasificacion');
        $vDCl_Nombre = $r->input('pDCl_Nombre');
        $vDCl_Estatus = 1;
        $vFK_Usuario = 1;
        $vObservacion = $r->input('pObservacion');

        if ($vPK_DocumentoClasificacion == -99) {
             $vQuery = "CALL sp_DocumentoClasificacion_I(" . $vDCl_Nombre . ", " . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
            $vDocumentoClasificacion_I = \DB::select("CALL sp_DocumentoClasificacion_I('" . $vDCl_Nombre . "', " . $vFK_Usuario . ", '". $vObservacion ."', '" . $vQuery . "')");
        } else {
             $vQuery = "CALL sp_DocumentoClasificacion_U(" . $vPK_DocumentoClasificacion . "," . $vDCl_Nombre . ", " . $vDCl_Estatus . "," . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
            $vDocumentoClasificacion_U = \DB::select("CALL sp_DocumentoClasificacion_U(" . $vPK_DocumentoClasificacion . ", '" . $vDCl_Nombre . "', " . $vDCl_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."', '" . $vQuery . "')");
        }

        $vMsj = 'Registro Guardado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfDocumentoClasificacionEliminar(Request $r)
    {
        $vPK_DocumentoClasificacion = $r->input('pPK_DocuClasificacion');
        $vDCl_Nombre = '';
        $vDCl_Estatus = 0;
        $vFK_Usuario = 1;
        $vObservacion = '';

        $vQuery = "CALL sp_DocumentoClasificacion_U(" . $vPK_DocumentoClasificacion . "," . $vDCl_Nombre . ", " . $vDCl_Estatus . "," . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";
        $vDocumentoClasificacion_U = \DB::select("CALL sp_DocumentoClasificacion_U(" . $vPK_DocumentoClasificacion . ", '" . $vDCl_Nombre . "', " . $vDCl_Estatus . ", " . $vFK_Usuario . ", '". $vObservacion ."', '" . $vQuery . "')");

        $vMsj = 'Registro Eliminado Correctamente.';
        $vTMsj = 'success';
        return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
    }

    public function pfDocumentoClasificacionEditarForm(Request $r)
    {
        $vPK_DocumentoClasificacion = $r->input('pPK_DocuClasificacion');

        $vDocumentoClasificacion = \DB::select("CALL sp_DocumentoClasificacion_S(" . $vPK_DocumentoClasificacion . ");");

        $vDCl_Nombre = $vDocumentoClasificacion[0]->DCl_Nombre;

        return response()->json(['pDCl_Nombre' => $vDCl_Nombre]);
    }


}
