<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class Controller_Alumno extends Controller
{
    //

    public function pfSE_Alumno()
    {
        $vNomModulo = 'Alumnos';

        $vSede = \DB::select("CALL sp_Sede_S(NULL);");
        $vCarr = \DB::select("CALL sp_Carrera_S(NULL);");
        $vPeri = \DB::select("CALL sp_Periodo_S(NULL);");
        $vAlumSitu = \DB::select("CALL sp_AlumnoSituacion_S(NULL);");

        return view('Alumno.uiSE_Alumno', compact('vSede', 'vCarr','vPeri', 'vAlumSitu', 'vNomModulo'));
    }

    public function pfSeCarrGeneracion(Request $r)
    {
        $vPK_Carrera = $r->input('pPK_Carrera');

        $vCarrGene = \DB::select("CALL sp_CarreraGeneracion_S(NULL, " . $vPK_Carrera . ")");

        $vSeCarrGeneracion = '
            <div class="form-group">
                <label> Generación</label>
                <select class="js-example-basic-single js-states form-control SeCarrGeneracion" name="SeCarrGeneracion" id="SeCarrGeneracion" style="width: 100% !importan">
                    <option value="NULL" selected>Mostrar Todo</option>';

        foreach ($vCarrGene as $vCG) {
            $vSeCarrGeneracion .= '<option value="' . $vCG->PK_CarrGeneracion . '" >' . $vCG->CGe_Nombre . '(' . $vCG->CGe_Ano . ')</option>';
        }

        $vSeCarrGeneracion .= '
                </select>
            </div>';

        return response()->json(['pSeCarrGeneracion' => $vSeCarrGeneracion]);
    }

    public function pfSE_Alumno_Consultar(Request $r)
    {
        $vPK_Alumno = $r->input('pPK_Alumno');
        $vAlu_Matricula = $r->input('pAlu_Matricula');
        $vPK_Sede = $r->input('pPK_Sede');
        $vPK_Carrera = $r->input('pPK_Carrera');
        $vPK_CarrGeneracion = $r->input('pPK_CarrGeneracion');
        $vFK_Periodo_Inicio = $r->input('pFK_Periodo_Inicio');
        $vFK_Periodo_Fin = $r->input('pFK_Periodo_Fin');
        $vPK_AlumSituacion = $r->input('pPK_AlumSituacion');
        $vAlu_Sexo = $r->input('pAlu_Sexo');

        $vTabConsultar = $this->getTableData_Alumno($vPK_Alumno,$vAlu_Matricula,$vPK_Sede,$vPK_Carrera,$vPK_CarrGeneracion,$vFK_Periodo_Inicio,$vFK_Periodo_Fin,$vPK_AlumSituacion,$vAlu_Sexo);

        return response()->json(['pTabConsultar' => $vTabConsultar]);
    }

    protected function getTableData_Alumno($pPK_Alumno,$pAlu_Matricula,$pPK_Sede,$pPK_Carrera,$pPK_CarrGeneracion,$pFK_Periodo_Inicio,$pFK_Periodo_Fin,$pPK_AlumSituacion,$pAlu_Sexo)
    {
        $vPK_Alumno = $pPK_Alumno;
        $vAlu_Matricula = $pAlu_Matricula;
        $vPK_Sede = $pPK_Sede;
        $vPK_Carrera = $pPK_Carrera;
        $vPK_CarrGeneracion = $pPK_CarrGeneracion;
        $vFK_Periodo_Inicio = $pFK_Periodo_Inicio;
        $vFK_Periodo_Fin = $pFK_Periodo_Fin;
        $vPK_AlumSituacion = $pPK_AlumSituacion;
        $vAlu_Sexo = $pAlu_Sexo;

        $vAlu_S = \DB::select("CALL sp_Alumno_S(NULL, NULL, ".$vAlu_Sexo.", ".$vPK_Sede.", ".$vPK_Carrera.", ".$vPK_CarrGeneracion.", ".$vPK_AlumSituacion.", ".$vFK_Periodo_Inicio.", ".$vFK_Periodo_Fin.")");

        $vTabConAlu = '';
        $x = 1;

        foreach($vAlu_S as $vA)
        {
            $vTabConAlu .= '<tr  id="'. $vA->PK_Alumno .'">';
            $vTabConAlu .= '<td>'. $x .'</td> ';
            $vTabConAlu .= '<td class="text-bold">'. $vA->Alu_Matricula .'</td>';
            $vTabConAlu .= '<td>'. ucwords(strtolower($vA->Alu_Nombre)) .'</td>';
            $vTabConAlu .= '<td>'. ucwords(strtolower($vA->Alu_Paterno)) .'</td>';
            $vTabConAlu .= '<td>'. ucwords(strtolower($vA->Alu_Materno)) .'</td>';
            $vTabConAlu .= '<td>'. $vA->Alu_SexoDescripcion .'</td>';
            $vTabConAlu .= '<td>'. $vA->Car_Nombre .'</td>';
            $vTabConAlu .= '<td>'. $vA->Modalidad_Descripcion .'</td>';
            $vTabConAlu .= '<td>'. $vA->Alu_Semestre .'</td>';
            $vTabConAlu .= '<td>'. $vA->Sed_Nombre .'</td>';
            $vTabConAlu .= '<td>'. $vA->PIN_Periodo .'</td>';
            $vTabConAlu .= '<td>'. $vA->PFI_Periodo .'</td>';
            $vTabConAlu .= '<td>'. $vA->ASi_Nombre .'</td>';
            $vTabConAlu .= '<td>';
            $vTabConAlu .= '    <table>
                                    <tr>
                                        <th>
                                            <button onclick="funPersonal_FormacionBasicaEditarForm('.$vA->PK_Alumno.')" class="btn search-button" data-toggle="tooltip" title="Editar">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </th>
                                        <th>&nbsp;</th>
                                        <th>
                                            <button onclick="funPersonal_FormacionBasicaEliminar('.$vA->PK_Alumno.')"  class="btn search-button" data-toggle="tooltip" title="Eliminar">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </th>
                                        <th>&nbsp;</th>
                                        <th>
                                        <button onclick="funBitacora2(\'t_personal_formacionbasica\', '.$vA->PK_Alumno.')" data-toggle="modal" data-target=".Mod_Bitacora"  class="btn search-button" data-toggle="tooltip" title="Bitacora">
                                                <i class="fa fa-list-ol"></i>
                                            </button>
                                        </th>
                                    </tr>
                                </table>';
            $vTabConAlu .= '</td>';
            $vTabConAlu .= '</tr>';
            $x++;
        }

        $vTabAlu ='';
        $vTabAlu .= '<div class="table-responsive">';
        $vTabAlu .= '<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1" style="width:100% !important;" >';
        $vTabAlu .='<thead>';
            $vTabAlu .='<tr>';
                $vTabAlu .='<th>#</th>';
                $vTabAlu .='<th>Matrícula</th>';
                $vTabAlu .='<th>Nombre</th>';
                $vTabAlu .='<th>Paterno</th>';
                $vTabAlu .='<th>Materno</th>';
                $vTabAlu .='<th>Sexo</th>';
                $vTabAlu .='<th>Carrera</th>';
                $vTabAlu .='<th>Modalidad</th>';
                $vTabAlu .='<th>Sem</th>';
                $vTabAlu .='<th>Sede</th>';
                $vTabAlu .='<th>Periodo Inicio</th>';
                $vTabAlu .='<th>Periodo Fin</th>';
                $vTabAlu .='<th>Situación</th>';
                $vTabAlu .='<th></th>';
            $vTabAlu .='</tr>';
        $vTabAlu .='</thead>';

        $vTabAlu .='<tbody>';
        $vTabAlu .= $vTabConAlu;
        $vTabAlu .='</tbody>';
        $vTabAlu .='</table>';
        $vTabAlu .='</div>';

        return $vTabAlu;
    }

}
