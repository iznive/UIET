<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controller_Personal extends Controller
{
    //


    public function pfPersonal()
    {
        $vNomModulo = 'Recursos Humanos || Personal';

        $vSede = \DB::select("CALL sp_Sede_S(NULL);");
        $vTipoCont = \DB::select("CALL sp_TipoContrato_S(NULL);");
        $vSupeJera = \DB::select("CALL sp_SuperiorJerarquico_S(NULL);");
        $vCatePues = \DB::select("CALL sp_CategoriaPuesto_S(NULL);");
        $vDepa = \DB::select("CALL sp_Departamento_S(NULL, NULL);");
        $vEstaCivi = \DB::select("CALL sp_EstadoCivil_S(NULL);");
        $vSitu = \DB::select("CALL sp_PersonalSituacion_S(NULL);");

        return view('Personal.uiPersonal', compact('vPersonal', 'vSede', 'vTipoCont','vSupeJera', 'vDepa','vCatePues', 'vEstaCivi','vSitu','vNomModulo'));
    }


    public function pfPersonal_Alta_A()
    {
        $vNomModulo = 'Alta Personal';
        $vPais = \DB::select("CALL sp_Pais_S(NULL);");
        $vEstaCivil = \DB::select("CALL sp_EstadoCivil_S(NULL);");
        $vSede = \DB::select("CALL sp_Sede_S(NULL);");
        $vSuperior = \DB::select("CALL sp_SuperiorJerarquico_S(NULL);");
        $vCatePuesto = \DB::select("CALL sp_CategoriaPuesto_S(NULL);");
        $vPuesto = \DB::select("CALL sp_Puesto_S(NULL);");
        $vTipoContrato = \DB::select("CALL sp_TipoContrato_S(NULL);");

        $vAreaFormacion = \DB::select("CALL sp_AreaFormacion_S(NULL);");

        return view('Personal.uiPersonalAlta_A', compact('vNomModulo', 'vPais', 'vEstaCivil', 'vSede', 'vSuperior', 'vCatePuesto', 'vPuesto', 'vTipoContrato', 'vAreaFormacion'));
    }


    public function pfPersonal_Alta_B($pPK_Personal)
    {
        $vPK_Personal = $pPK_Personal;

        $vPer = \DB::select("CALL sp_PersonalSimple_S(" . $vPK_Personal . ")");
        $vPK_Personal = $vPer[0]->PK_Personal;
        $vPer_Nombre = $vPer[0]->Per_Nombre;
        $vPer_Paterno = $vPer[0]->Per_Paterno;
        $vPer_Materno = $vPer[0]->Per_Materno;

        $vNomModulo = 'Alta Personal';
        $vFormBasica = \DB::select("CALL sp_FormacionBasica_S(NULL);");
        $vPostSituacion = \DB::select("CALL sp_PostgradoSituacion_S(NULL);");
        $vPostTipo = \DB::select("CALL sp_PostgradoTipo_S(NULL);");
        $vConoComputo = \DB::select("CALL sp_ConocimientoComputo_S(NULL);");
        $vNiveEducativo = \DB::select("CALL sp_NivelEducativo_S(NULL);");
        $vInveNP = \DB::select("CALL sp_InvestigacionNivelParticipacion(NULL);");
        $vVincNP = \DB::select("CALL sp_VinculacionNivelParticipacion_S(NULL);");
        $vExperienciaDT = \DB::select("CALL sp_ExperienciaDisenoTipo_S(NULL);");
        $vDiscapacidad = \DB::select("CALL sp_Discapacidad_S(NULL);");

        return view('Personal.uiPersonalAlta_B', compact('vNomModulo', 'vFormBasica', 'vPostSituacion', 'vPostTipo', 'vConoComputo','vPK_Personal','vPer_Nombre','vPer_Paterno','vPer_Materno', 'vNiveEducativo', 'vInveNP', 'vVincNP', 'vExperienciaDT', 'vDiscapacidad'));
    }

    public function fpPersonalGuardar(Request $r)
    {
        $vPK_Personal = $r->input('pPK_Personal');
        $vFK_Sede = $r->input('pFK_Sede');
        $vFK_SupeJerarquico = $r->input('pFK_SupeJerarquico');
        $vFK_Departamento = $r->input('pFK_Departamento');
        $vFK_CatePuesto = $r->input('pFK_CatePuesto');
        $vFK_Puesto = $r->input('pFK_Puesto');
        $vFK_TipoContrato = $r->input('pFK_TipoContrato');
        $vFK_EstaCivil = $r->input('pFK_EstaCivil');
        $vFK_LocalidadNac = $r->input('pFK_LocalidadNac');
        $vFK_LocalidadDA = $r->input('pFK_LocalidadDA');
        $vFK_AreaFormacion = $r->input('pFK_AreaFormacion');
        $vPer_Nombre = $r->input('pPer_Nombre');
        $vPer_Paterno = $r->input('pPer_Paterno');
        $vPer_Materno = $r->input('pPer_Materno');
        $vPer_CURP = $r->input('pPer_CURP');
        $vPer_RFC = $r->input('pPer_RFC');
        $vPer_NSS = $r->input('pPer_NSS');
        $vPer_CredInfonavit = $r->input('pPer_CredInfonavit');
        $vPer_CredFonacot = $r->input('pPer_CredFonacot');
        $vPer_Sexo = $r->input('pPer_Sexo');
        $vPer_FecNacimiento = $r->input('pPer_FecNacimiento');
        $vPer_Correo = $r->input('pPer_Correo');
        $vPer_Telefono = $r->input('pPer_Telefono');
        $vPer_Celular = $r->input('pPer_Celular');
        $vPer_FecIngreso = $r->input('pPer_FecIngreso');
        $vPer_DA_Calle = $r->input('pPer_DA_Calle');
        $vPer_DA_NumExt = $r->input('pPer_DA_NumExt');
        $vPer_DA_NumInt = $r->input('pPer_DA_NumInt');

        $vFK_Usuario = 1;
        $vObservacion = '';


        if ($vPK_Personal == -99) {
            $vQuery = "CALL sp_Personal_I(" . $vFK_Sede . ", " . $vFK_SupeJerarquico . ", " . $vFK_Departamento . ", " . $vFK_CatePuesto . ", " . $vFK_Puesto . ", " . $vFK_TipoContrato . "," . $vFK_EstaCivil . ", " .
            $vFK_LocalidadNac . ", " . $vFK_LocalidadDA . ", " . $vFK_AreaFormacion . ", " . $vPer_Nombre . ", " . $vPer_Paterno . ", " . $vPer_Materno . ", " . $vPer_CURP . ", " . $vPer_RFC . ", " . $vPer_NSS . ", " .
            $vPer_CredInfonavit . ", " . $vPer_CredFonacot . ", " . $vPer_Sexo . ", " . $vPer_FecNacimiento . ", " . $vPer_Correo . ", " . $vPer_Telefono . ", " . $vPer_Celular . ", " . $vPer_FecIngreso . ", " .
            $vPer_DA_Calle . ", " . $vPer_DA_NumExt . ", " . $vPer_DA_NumInt . ", " . $vFK_Usuario . ", " . $vObservacion . ",  vQuery )";

            $vP = \DB::select("CALL sp_Personal_I(" . $vFK_Sede . ", " . $vFK_SupeJerarquico . ", " . $vFK_Departamento . ", " . $vFK_CatePuesto . ", " . $vFK_Puesto . ", " . $vFK_TipoContrato . "," . $vFK_EstaCivil . ", " .
                $vFK_LocalidadNac . ", " . $vFK_LocalidadDA . ", " . $vFK_AreaFormacion . ", '" . $vPer_Nombre . "', '" . $vPer_Paterno . "', '" . $vPer_Materno . "', '" . $vPer_CURP . "', '" . $vPer_RFC . "', '" . $vPer_NSS . "', 
                '" . $vPer_CredInfonavit . "', '" . $vPer_CredFonacot . "', " . $vPer_Sexo . ", '" . $vPer_FecNacimiento . "', '" . $vPer_Correo . "', '" . $vPer_Telefono . "', '" . $vPer_Celular . "', '" . $vPer_FecIngreso . "', 
                '" . $vPer_DA_Calle . "', '" . $vPer_DA_NumExt . "', '" . $vPer_DA_NumInt . "', " . $vFK_Usuario . ", '" . $vObservacion . "', '". $vQuery ."')");

                $vPK_PersonalG = $vP[0]->PK_Personal;

            if($vPK_PersonalG == 'CURP')
            {
                $vMsj = 'CURP Existente.';
                $vTMsj = 'warning';
            }
            else
            {
                $vMsj = 'Registro Guardado Correctamente.';
                $vTMsj = 'success';
            }
            return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj, 'pPK_Personal' => $vPK_PersonalG]);

        }
        else{
            $vQuery = "CALL sp_Personal_U(pPK_Personal, pFK_Sede, pFK_SupeJerarquico, pFK_Departamento, pFK_CatePuesto, pFK_Puesto, pFK_TipoContrato, pFK_EstaCivil, pFK_LocalidadNac, pFK_LocalidadDA, pFK_AreaFormacion, pPer_Nombre, pPer_Paterno, pPer_Materno, pPer_CURP, pPer_RFC, pPer_NSS, pPer_CredInfonavit, pPer_CredFonacot, pPer_Sexo, pPer_FecNacimiento, pPer_Correo, pPer_Telefono, pPer_Celular, pPer_FecIngreso, pPer_DA_Calle, pPer_DA_NumExt, pPer_DA_NumInt, pPer_Estatus, pFK_Usuario, pObservacion, pQuery)";
            $vP = \DB::select("CALL sp_Personal_U(" . $vPK_Personal . "," . $vFK_Sede . "," . $vFK_SupeJerarquico . "," . $vFK_Departamento . "," . $vFK_CatePuesto . "," . $vFK_Puesto . "," . $vFK_TipoContrato . ", " . $vFK_EstaCivil . "," . $vFK_LocalidadNac . "," . $vFK_LocalidadDA . "," . $vFK_AreaFormacion . ", '" . $vPer_Nombre . "', '" . $vPer_Paterno . "', '" . $vPer_Materno . "', '" . $vPer_CURP . "', '" . $vPer_RFC . "', '" . $vPer_NSS . "', '" . $vPer_CredInfonavit . "', '" . $vPer_CredFonacot . "', " . $vPer_Sexo . ", '" . $vPer_FecNacimiento . "', '" . $vPer_Correo . "', '" . $vPer_Telefono . "', '" . $vPer_Celular . "', '" . $vPer_FecIngreso . "', '" . $vPer_DA_Calle . "', '" . $vPer_DA_NumExt . "', '" . $vPer_DA_NumInt . "', 1, " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");

            $vMsj = 'Registro Guardado Correctamente.';
            $vTMsj = 'success';

            return response()->json(['Msj' => $vMsj, 'TMsj' => $vTMsj]);
        }
    }

    public function fpPersonalConsultar(Request $r)
    {
        $vPK_PersSituacion = $r->input('pPK_PersSituacion');
        $vPK_Sede = $r->input('pPK_Sede');
        $vPK_SupeJerarquico = $r->input('pPK_SupeJerarquico');
        $vPK_CatePuesto = $r->input('pPK_CatePuesto');
        $vPK_TipoContrato = $r->input('pPK_TipoContrato');
        $vPK_Departamento = $r->input('pPK_Departamento');
        $vPK_EstaCivil = $r->input('pPK_EstaCivil');
        $vPer_Sexo = $r->input('pPer_Sexo');

        $vPer_S = \DB::select("CALL sp_Personal2_S($vPK_Sede, $vPK_TipoContrato, $vPK_SupeJerarquico, $vPK_CatePuesto, $vPer_Sexo, $vPK_Departamento, $vPK_PersSituacion, $vPK_EstaCivil)");

        $vTabConPer = '';
        $x = 1;

        foreach($vPer_S as $vP)
        {
            $vTabConPer .= '
            <tr  id="'. $vP->PK_Personal .'">
                <td>'. $x .'</td>
                <td>'. $vP->Per_Nombre . ' ' . $vP->Per_Paterno . ' ' . $vP->Per_Materno .'</td>
                <td>'. $vP->Per_CURP .'</td>
                <td>'. $vP->Per_RFC .'</td>
                <td>'. $vP->Per_SexoDescripcion .'</td>
                <td>'. $vP->Sed_Nombre .'</td>
                <td>'. $vP->PSi_Nombre .'</td>
                <td>
                    <table>
                        <tr>
                            <th>
                                <button onclick="funPersonalConsultarForm('.$vP->PK_Personal.')" class="btn search-button" data-toggle="tooltip" title="Consultar">
                                    <i class="fa fa-search-plus"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                                <button onclick="funPersonalEditarForm('.$vP->PK_Personal.')" class="btn search-button" data-toggle="tooltip" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                                <button onclick="funPersonalEliminar('.$vP->PK_Personal.')"  class="btn search-button" data-toggle="tooltip" title="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                                <button onclick="funBitacora(\'t_personal\', '.$vP->PK_Personal.')" data-toggle="modal" data-target=".Mod_Bitacora"  class="btn search-button" data-toggle="tooltip" title="Bitacora">
                                    <i class="fa fa-list-ol"></i>
                                </button>
                            </th>
                        </tr>
                    </table>
                </td>
            </tr>';
            $x++;
        }

        $vTabPer = '
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1" style="width:100% !important;" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre Completo</th>
                        <th>CURP</th>
                        <th>RFC</th>
                        <th>Género</th>
                        <th>Sede</th>
                        <th>Situación</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>'
                    . $vTabConPer .
                '</tbody>
            </table>
        </div>';

        return response()->json(['pTabPer' => $vTabPer]);
    }

    public function fpPersonalEliminar(Request $r)
    {
        $vPK_Personal = $r->input('pPK_Personal');
        $vFK_Usuario = 1;
        $vObservacion = '';
        $vQuery = "CALL sp_Personal_U(" . $vPK_Personal . ", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, , , , , , , , , 0, , , , , , , , , 0, " . $vFK_Usuario . ", " . $vObservacion . ", vQuery)";

        $vPer_U = \DB::select("CALL sp_Personal_U(" . $vPK_Personal . ", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', 0, " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");

        return response()->json(['pPK_Personal' => $vPK_Personal]);
    }

    public function pfPersonal_EditarForm($pPK_Personal)
    {
        $vPK_Personal = $pPK_Personal;

        $vPer = \DB::select("CALL sp_PersonalSimple_S(" . $vPK_Personal . ")");
        $vPK_Personal = $vPer[0]->PK_Personal;
        $vPer_Nombre = $vPer[0]->Per_Nombre;
        $vPer_Paterno = $vPer[0]->Per_Paterno;
        $vPer_Materno = $vPer[0]->Per_Materno;
        $vPer_CURP = $vPer[0]->Per_CURP;
        $vPer_RFC = $vPer[0]->Per_RFC;
        $vPer_NSS = $vPer[0]->Per_NSS;
        $vPer_CredInfonavit = $vPer[0]->Per_CredInfonavit;
        $vPer_CredFonacot = $vPer[0]->Per_CredFonacot;
        $vPer_Correo = $vPer[0]->Per_Correo;
        $vPer_Telefono = $vPer[0]->Per_Telefono;
        $vPer_Celular = $vPer[0]->Per_Celular;
        $vPer_DA_Calle = $vPer[0]->Per_DA_Calle;
        $vPer_DA_NumExt = $vPer[0]->Per_DA_NumExt;
        $vPer_DA_NumInt = $vPer[0]->Per_DA_NumInt;
        $vPer_Sexo = $vPer[0]->Per_Sexo;
        $vPer_FecNacimiento = $vPer[0]->Per_FecNacimiento;
        $vPer_FecIngreso = $vPer[0]->Per_FecIngreso;

        $vPer_FecNacimiento = date("d/m/Y", strtotime($vPer_FecNacimiento));
        $vPer_FecIngreso = date("d/m/Y", strtotime($vPer_FecIngreso));

        $vFK_Sede = $vPer[0]->FK_Sede;
        $vFK_SupeJerarquico = $vPer[0]->FK_SupeJerarquico;
        $vFK_Departamento = $vPer[0]->FK_Departamento;
        $vFK_CatePuesto = $vPer[0]->FK_CatePuesto;
        $vFK_Puesto = $vPer[0]->FK_Puesto;
        $vFK_TipoContrato = $vPer[0]->FK_TipoContrato;
        $vFK_EstaCivil = $vPer[0]->FK_EstaCivil;
        $vFK_AreaFormacion = $vPer[0]->FK_AreaFormacion;
        $vFK_PersSituacion = $vPer[0]->FK_PersSituacion;

        $vENA_PK_Pais = $vPer[0]->ENA_PK_Pais;
        $vENA_PK_Entidad = $vPer[0]->ENA_PK_Entidad;
        $vMNA_PK_Municipio = $vPer[0]->MNA_PK_Municipio;
        $vLNA_PK_Localidad = $vPer[0]->LNA_PK_Localidad;

        $vEDA_PK_Pais = $vPer[0]->EDA_PK_Pais;
        $vEDA_PK_Entidad = $vPer[0]->EDA_PK_Entidad;
        $vMDA_PK_Municipio = $vPer[0]->MDA_PK_Municipio;
        $vLDA_PK_Localidad = $vPer[0]->LDA_PK_Localidad;

        $vNomModulo = 'Editar Personal';

        $vPais = \DB::select("CALL sp_Pais_S(NULL);");
        $vEntidadNA = \DB::select("CALL sp_Entidad_S(NULL, ".$vENA_PK_Pais.");");
        $vEntidadDA = \DB::select("CALL sp_Entidad_S(NULL, ".$vEDA_PK_Pais.");");
        $vMunicipioNA = \DB::select("CALL sp_Municipio_S(NULL, " . $vENA_PK_Entidad . ");");
        $vMunicipioDA = \DB::select("CALL sp_Municipio_S(NULL, " . $vEDA_PK_Entidad . ");");
        $vLocalidadNA = \DB::select("CALL sp_Localidad_S(NULL, " . $vMNA_PK_Municipio . ");");
        $vLocalidadDA = \DB::select("CALL sp_Localidad_S(NULL, " . $vMDA_PK_Municipio . ");");

        $vEstaCivil = \DB::select("CALL sp_EstadoCivil_S(NULL);");
        $vSede = \DB::select("CALL sp_Sede_S(NULL);");
        $vSuperior = \DB::select("CALL sp_SuperiorJerarquico_S(NULL);");
        $vDepartamento = \DB::select("CALL sp_Departamento_S(NULL , " . $vFK_SupeJerarquico . ");");
        $vCatePuesto = \DB::select("CALL sp_CategoriaPuesto_S(NULL);");
        $vPuesto = \DB::select("CALL sp_Puesto_S(NULL);");
        $vTipoContrato = \DB::select("CALL sp_TipoContrato_S(NULL);");

        $vFormBasica = \DB::select("CALL sp_FormacionBasica_S(NULL);");
        $vPostSituacion = \DB::select("CALL sp_PostgradoSituacion_S(NULL);");
        $vPostTipo = \DB::select("CALL sp_PostgradoTipo_S(NULL);");
        $vConoComputo = \DB::select("CALL sp_ConocimientoComputo_S(NULL);");
        $vNiveEducativo = \DB::select("CALL sp_NivelEducativo_S(NULL);");
        $vInveNP = \DB::select("CALL sp_InvestigacionNivelParticipacion(NULL);");
        $vVincNP = \DB::select("CALL sp_VinculacionNivelParticipacion_S(NULL);");
        $vExperienciaDT = \DB::select("CALL sp_ExperienciaDisenoTipo_S(NULL);");
        $vDiscapacidad = \DB::select("CALL sp_Discapacidad_S(NULL);");

        $vAreaFormacion = \DB::select("CALL sp_AreaFormacion_S(NULL);");

        return view('Personal.uiPersonalEditar', compact('vNomModulo', 'vAreaFormacion', 'vPais', 'vEntidadNA', 'vEntidadDA', 'vMunicipioNA', 'vMunicipioDA', 'vLocalidadNA', 'vLocalidadDA', 'vEstaCivil', 'vSede', 'vSuperior', 'vDepartamento', 'vCatePuesto', 'vPuesto', 'vTipoContrato', 'vFormBasica', 'vPostSituacion', 'vPostTipo', 'vConoComputo','vPK_Personal','vPer_Nombre','vPer_Paterno','vPer_Materno', 'vPer_CURP', 'vPer_RFC', 'vPer_NSS', 'vPer_CredInfonavit', 'vPer_CredFonacot', 'vPer_Correo', 'vPer_Telefono', 'vPer_Celular', 'vPer_DA_Calle', 'vPer_DA_NumExt', 'vPer_DA_NumInt', 'vPer_Sexo', 'vPer_FecNacimiento', 'vPer_FecIngreso', 'vFK_Sede', 'vFK_SupeJerarquico', 'vFK_Departamento', 'vFK_CatePuesto', 'vFK_Puesto', 'vFK_TipoContrato', 'vFK_EstaCivil', 'vFK_AreaFormacion', 'vFK_PersSituacion', 'vEDA_PK_Pais', 'vEDA_PK_Entidad', 'vMDA_PK_Municipio', 'vLDA_PK_Localidad', 'vENA_PK_Pais', 'vENA_PK_Entidad', 'vMNA_PK_Municipio', 'vLNA_PK_Localidad', 'vNiveEducativo', 'vInveNP', 'vVincNP', 'vExperienciaDT', 'vDiscapacidad', 'vFK_AreaFormacion'));
    }


    public function pfPersonal_ConsultarForm($pPK_Personal)
    {
        $vPK_Personal = $pPK_Personal;

        $vPer = \DB::select("CALL sp_PersonalSimple_S(" . $vPK_Personal . ")");
        $vPK_Personal = $vPer[0]->PK_Personal;
        $vPer_Nombre = $vPer[0]->Per_Nombre;
        $vPer_Paterno = $vPer[0]->Per_Paterno;
        $vPer_Materno = $vPer[0]->Per_Materno;
        $vPer_CURP = $vPer[0]->Per_CURP;
        $vPer_RFC = $vPer[0]->Per_RFC;
        $vPer_NSS = $vPer[0]->Per_NSS;
        $vPer_CredInfonavit = $vPer[0]->Per_CredInfonavit;
        $vPer_CredFonacot = $vPer[0]->Per_CredFonacot;
        $vPer_Correo = $vPer[0]->Per_Correo;
        $vPer_Telefono = $vPer[0]->Per_Telefono;
        $vPer_Celular = $vPer[0]->Per_Celular;
        $vPer_DA_Calle = $vPer[0]->Per_DA_Calle;
        $vPer_DA_NumExt = $vPer[0]->Per_DA_NumExt;
        $vPer_DA_NumInt = $vPer[0]->Per_DA_NumInt;
        $vPer_Sexo = $vPer[0]->Per_Sexo;
        $vPer_FecNacimiento = $vPer[0]->Per_FecNacimiento;
        $vPer_FecIngreso = $vPer[0]->Per_FecIngreso;

        $vPer_FecNacimiento = date("d/m/Y", strtotime($vPer_FecNacimiento));
        $vPer_FecIngreso = date("d/m/Y", strtotime($vPer_FecIngreso));

        $vFK_Sede = $vPer[0]->FK_Sede;
        $vFK_SupeJerarquico = $vPer[0]->FK_SupeJerarquico;
        $vFK_Departamento = $vPer[0]->FK_Departamento;
        $vFK_CatePuesto = $vPer[0]->FK_CatePuesto;
        $vFK_Puesto = $vPer[0]->FK_Puesto;
        $vFK_TipoContrato = $vPer[0]->FK_TipoContrato;
        $vFK_EstaCivil = $vPer[0]->FK_EstaCivil;
        $vFK_AreaFormacion = $vPer[0]->FK_AreaFormacion;
        $vFK_PersSituacion = $vPer[0]->FK_PersSituacion;

        $vENA_PK_Pais = $vPer[0]->ENA_PK_Pais;
        $vENA_PK_Entidad = $vPer[0]->ENA_PK_Entidad;
        $vMNA_PK_Municipio = $vPer[0]->MNA_PK_Municipio;
        $vLNA_PK_Localidad = $vPer[0]->LNA_PK_Localidad;

        $vEDA_PK_Pais = $vPer[0]->EDA_PK_Pais;
        $vEDA_PK_Entidad = $vPer[0]->EDA_PK_Entidad;
        $vMDA_PK_Municipio = $vPer[0]->MDA_PK_Municipio;
        $vLDA_PK_Localidad = $vPer[0]->LDA_PK_Localidad;

        $vNomModulo = 'Consultar Personal';

        $vPais = \DB::select("CALL sp_Pais_S(NULL);");
        $vEntidadNA = \DB::select("CALL sp_Entidad_S(NULL, ".$vENA_PK_Pais.");");
        $vEntidadDA = \DB::select("CALL sp_Entidad_S(NULL, ".$vEDA_PK_Pais.");");
        $vMunicipioNA = \DB::select("CALL sp_Municipio_S(NULL, " . $vENA_PK_Entidad . ");");
        $vMunicipioDA = \DB::select("CALL sp_Municipio_S(NULL, " . $vEDA_PK_Entidad . ");");
        $vLocalidadNA = \DB::select("CALL sp_Localidad_S(NULL, " . $vMNA_PK_Municipio . ");");
        $vLocalidadDA = \DB::select("CALL sp_Localidad_S(NULL, " . $vMDA_PK_Municipio . ");");

        $vEstaCivil = \DB::select("CALL sp_EstadoCivil_S(NULL);");
        $vSede = \DB::select("CALL sp_Sede_S(NULL);");
        $vSuperior = \DB::select("CALL sp_SuperiorJerarquico_S(NULL);");
        $vDepartamento = \DB::select("CALL sp_Departamento_S(NULL , " . $vFK_SupeJerarquico . ");");
        $vCatePuesto = \DB::select("CALL sp_CategoriaPuesto_S(NULL);");
        $vPuesto = \DB::select("CALL sp_Puesto_S(NULL);");
        $vTipoContrato = \DB::select("CALL sp_TipoContrato_S(NULL);");

        $vFormBasica = \DB::select("CALL sp_FormacionBasica_S(NULL);");
        $vPostSituacion = \DB::select("CALL sp_PostgradoSituacion_S(NULL);");
        $vPostTipo = \DB::select("CALL sp_PostgradoTipo_S(NULL);");
        $vConoComputo = \DB::select("CALL sp_ConocimientoComputo_S(NULL);");
        $vNiveEducativo = \DB::select("CALL sp_NivelEducativo_S(NULL);");
        $vInveNP = \DB::select("CALL sp_InvestigacionNivelParticipacion(NULL);");
        $vVincNP = \DB::select("CALL sp_VinculacionNivelParticipacion_S(NULL);");
        $vExperienciaDT = \DB::select("CALL sp_ExperienciaDisenoTipo_S(NULL);");
        $vDiscapacidad = \DB::select("CALL sp_Discapacidad_S(NULL);");

        $vAreaFormacion = \DB::select("CALL sp_AreaFormacion_S(NULL);");

        return view('Personal.uiPersonalConsultar', compact('vNomModulo', 'vAreaFormacion', 'vPais', 'vEntidadNA', 'vEntidadDA', 'vMunicipioNA', 'vMunicipioDA', 'vLocalidadNA', 'vLocalidadDA', 'vEstaCivil', 'vSede', 'vSuperior', 'vDepartamento', 'vCatePuesto', 'vPuesto', 'vTipoContrato', 'vFormBasica', 'vPostSituacion', 'vPostTipo', 'vConoComputo','vPK_Personal','vPer_Nombre','vPer_Paterno','vPer_Materno', 'vPer_CURP', 'vPer_RFC', 'vPer_NSS', 'vPer_CredInfonavit', 'vPer_CredFonacot', 'vPer_Correo', 'vPer_Telefono', 'vPer_Celular', 'vPer_DA_Calle', 'vPer_DA_NumExt', 'vPer_DA_NumInt', 'vPer_Sexo', 'vPer_FecNacimiento', 'vPer_FecIngreso', 'vFK_Sede', 'vFK_SupeJerarquico', 'vFK_Departamento', 'vFK_CatePuesto', 'vFK_Puesto', 'vFK_TipoContrato', 'vFK_EstaCivil', 'vFK_AreaFormacion', 'vFK_PersSituacion', 'vEDA_PK_Pais', 'vEDA_PK_Entidad', 'vMDA_PK_Municipio', 'vLDA_PK_Localidad', 'vENA_PK_Pais', 'vENA_PK_Entidad', 'vMNA_PK_Municipio', 'vLNA_PK_Localidad', 'vNiveEducativo', 'vInveNP', 'vVincNP', 'vExperienciaDT', 'vDiscapacidad', 'vFK_AreaFormacion'));
    }





    public function fpSeDepartamento(Request $r)
    {
        $vPK_SupeJerarquico = $r->input('pPK_SupeJerarquico');

        $vDepartamento = \DB::select("CALL sp_Departamento_S(NULL, " . $vPK_SupeJerarquico . ")");

        $vSeDepartamento = '
            <div class="form-group">
                <label> Departamento</label>
                <select class="js-example-basic-single js-states form-control SeDepartamento" name="SeDepartamento" id="SeDepartamento" style="width: 100% !importan">
                    <option value="x1" selected disabled >Seleccionar</option>';

        foreach ($vDepartamento as $vD) {
            $vSeDepartamento .= '
                    <option value="' . $vD->PK_Departamento . '" >' . $vD->Dep_Nombre . '(' . $vD->Dep_Abreviatura . ')</option>';
        }

        $vSeDepartamento .= '
                </select>
            </div>';

        return response()->json(['pSeDepartamento' => $vSeDepartamento]);
    }

    public function fpSeLengua(Request $r)
    {
        $vLenTipo = $r->input('pLenTipo');

        $vLengua = \DB::select("CALL sp_Lengua_S(NULL, " . $vLenTipo . ")");

        $vSeLengua = '
            <div class="form-group">
                <label> Lengua <span class="symbol required"></span> </label>
                <select class="js-example-basic-single js-states form-control SeLengua" name="SeLengua" id="SeLengua" style="width: 100% !importan" onchange="funLen_Nombre()">
                    <option value="x1" selected disabled >Seleccionar</option>';

        foreach ($vLengua as $vL) {
            $vSeLengua .= '
                    <option value="' . $vL->PK_Lengua . '" >' . $vL->Len_Nombre . '</option>';
        }

        $vSeLengua .= '
                </select>
            </div>';

        return response()->json(['pSeLengua' => $vSeLengua]);
    }










    public function fpPersonal_FormacionBasicaGuardar(Request $r)
    {
        $vPK_PersFB = $r->input('pPK_PersFB');
        $vPK_Personal = $r->input('pPK_Personal');
        $vNivelEducativo = $r->input('pNivelEducativo');
        $vPFB_Instituto = $r->input('pPFB_Instituto');
        $vPFB_PeriodoInicio = $r->input('pPFB_PeriodoInicio');
        $vPFB_PeriodoFin = $r->input('pPFB_PeriodoFin');
        $vPFB_Promedio = $r->input('pPFB_Promedio');
        $vPFB_UG = $r->input('pPFB_UG');

        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_PersFB == -99) {
            $vQuery = '';
            $vPFB_I = \DB::select("CALL sp_Personal_FormacionBasica_I(".$vPK_Personal .", ".$vNivelEducativo.", '".$vPFB_Instituto."', ".$vPFB_PeriodoInicio.", ".$vPFB_PeriodoFin.", ".$vPFB_Promedio .", ".$vPFB_UG.", ".$vFK_Usuario.", '".$vObservacion."', '".$vQuery."')");
        }
        else {
            $vQuery = '';
            $vPFB_U = \DB::select("CALL sp_Personal_FormacionBasica_U(".$vPK_PersFB.", ". $vNivelEducativo.", '".$vPFB_Instituto."', ".$vPFB_PeriodoInicio.", ".$vPFB_PeriodoFin.", ".$vPFB_Promedio .", ".$vPFB_UG.", 1, ".$vFK_Usuario.", '".$vObservacion."', '".$vQuery."')");
        }

        $vTabPFB = $this->getTableData_PFB($vPK_Personal, 1);


        return response()->json(['pTabPFB' => $vTabPFB]);

    }

    public function fpPersonal_FormacionBasicaConsultar(Request $r)
    {
        $vPK_Personal = $r->input('pPK_Personal');
        $vFlagCM = $r->input('pFlagCM');

        $vTabPFB = $this->getTableData_PFB($vPK_Personal, $vFlagCM);

        return response()->json(['pTabPFB' => $vTabPFB]);
    }

    public function pfPersonal_FormacionBasicaEliminar(Request $r)
    {
        $vPK_PersFB = $r->input('pPK_PersFB');
        $vPK_Personal = $r->input('pPK_Personal');
        $vFK_Usuario = 1;
        $vObservacion = '';
        $vQuery = '';

        $vPFB_U = \DB::select("CALL sp_Personal_FormacionBasica_U(".$vPK_PersFB.", 0, '', 0, 0, 0, 0, 0, ".$vFK_Usuario.", '".$vObservacion."', '".$vQuery."')");

        $vTabPFB = $this->getTableData_PFB($vPK_Personal, 1);

        return response()->json(['pTabPFB' => $vTabPFB]);
    }

    protected function getTableData_PFB($pPK_Personal, $pFlagCM)
    {
        $vPK_Personal = $pPK_Personal;
        $vFlagCM = $pFlagCM;
        $vPFB_S = \DB::select("CALL sp_Personal_FormacionBasica_S(NULL, ". $vPK_Personal .")");

        $vTabConPFB = '';
        $x = 1;

        foreach($vPFB_S as $vP)
        {
            $vTabConPFB .= '
            <tr  id="'. $vP->PK_PersFB .'">
                <td>'. $x .'</td>
                <td>'. $vP->FBa_Nombre .'</td>
                <td>'. $vP->PFB_Instituto .'</td>
                <td>'. $vP->PFB_Promedio .'</td>
                <td>'. $vP->PFB_PeriodoInicio . ' - ' . $vP->PFB_PeriodoFin  .'</td>
                <td>'. $vP->PFB_UGDescripcion .'</td>';
                if($vFlagCM == 1)
                {
                    $vTabConPFB .= '
                        <td>
                            <table>
                                <tr>
                                    <th>
                                        <button onclick="funPersonal_FormacionBasicaEditarForm('.$vP->PK_PersFB.')" class="btn search-button" data-toggle="tooltip" title="Editar">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </th>
                                    <th>&nbsp;</th>
                                    <th>
                                        <button onclick="funPersonal_FormacionBasicaEliminar('.$vP->PK_PersFB.')"  class="btn search-button" data-toggle="tooltip" title="Eliminar">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </th>
                                    <th>&nbsp;</th>
                                    <th>
                                    <button onclick="funBitacora2(\'t_personal_formacionbasica\', '.$vP->PK_PersFB.')" data-toggle="modal" data-target=".Mod_Bitacora"  class="btn search-button" data-toggle="tooltip" title="Bitacora">
                                            <i class="fa fa-list-ol"></i>
                                        </button>
                                    </th>
                                </tr>
                            </table>
                        </td>';
                }

            $vTabConPFB .= '</tr>';
            $x++;
        }

        $vTabPFB = '
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-full-width" id="sample_4" style="width:100% !important;" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nivel Educativo</th>
                        <th>Instituto</th>
                        <th>Promedio</th>
                        <th>Periodo</th>
                        <th>Ultimo Grado</th>';
        if($vFlagCM == 1)
        {
            $vTabPFB .= '<th></th>';
        }

        $vTabPFB .= '</tr>
                </thead>
                <tbody>'
                    . $vTabConPFB .
                '</tbody>
            </table>
        </div>';

        return $vTabPFB;
    }

    public function pfPersonal_FormacionBasicaEditarForm(Request $r)
    {
        $vPK_PersFB = $r->input('pPK_PersFB');
        $vPK_Personal = $r->input('pPK_Personal');

        $vPFB = \DB::select("CALL sp_Personal_FormacionBasica_S(" . $vPK_PersFB . ", ". $vPK_Personal .");");

        $vPK_PersFB = $vPFB[0]->PK_PersFB;
        $vPFB_Instituto = $vPFB[0]->PFB_Instituto;
        $vPFB_PeriodoInicio = $vPFB[0]->PFB_PeriodoInicio;
        $vPFB_PeriodoFin = $vPFB[0]->PFB_PeriodoFin;
        $vPFB_Promedio = $vPFB[0]->PFB_Promedio;
        $vPFB_UG = $vPFB[0]->PFB_UG;
        $vPK_FormBasica = $vPFB[0]->PK_FormBasica;

        return response()->json(['pPK_PersFB' => $vPK_PersFB, 'pPFB_Instituto' => $vPFB_Instituto, 'pPFB_PeriodoInicio' => $vPFB_PeriodoInicio, 'pPFB_PeriodoFin' => $vPFB_PeriodoFin, 'pPFB_Promedio' => $vPFB_Promedio, 'pPFB_UG' => $vPFB_UG, 'pPK_FormBasica' => $vPK_FormBasica]);
    }



    public function fpPersonal_FormacionProfesionalGuardar(Request $r)
    {
        $vPK_PersFP = $r->input('pPK_PersFP');
        $vPK_Personal = $r->input('pPK_Personal');
        $vPFP_Tipo = $r->input('pPFP_Tipo');
        $vPFP_Instituto = $r->input('pPFP_Instituto');
        $vPFP_Estudio = $r->input('pPFP_Estudio');
        $vPFP_CedulaProfesional = $r->input('pPFP_CedulaProfesional');
        $vPFP_PeriodoInicio = $r->input('pPFP_PeriodoInicio');
        $vPFP_PeriodoFin = $r->input('pPFP_PeriodoFin');
        $vPFP_Promedio = $r->input('pPFP_Promedio');
        $vPFP_UG = $r->input('pPFP_UG');

        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_PersFP == -99) {
            $vQuery = '';
            $vPFP_I = \DB::select("CALL sp_Personal_FormacionProfesional_I(".$vPK_Personal.", ".$vPFP_Tipo.", '".$vPFP_Instituto."', '".$vPFP_Estudio."', '".$vPFP_CedulaProfesional."', ".$vPFP_PeriodoInicio.", ".$vPFP_PeriodoFin.", ".$vPFP_Promedio.", ".$vPFP_UG.", ".$vFK_Usuario.", '".$vObservacion."', '".$vQuery."')");
        }
        else {
            $vQuery = '';
            $vPFP_U = \DB::select("CALL sp_Personal_FormacionProfesional_U(".$vPK_PersFP .", ".$vPFP_Tipo.", '".$vPFP_Instituto."', '".$vPFP_Estudio ."', '".$vPFP_CedulaProfesional ."', ".$vPFP_PeriodoInicio.",".$vPFP_PeriodoFin.", ".$vPFP_Promedio .", ".$vPFP_UG.", 1, ".$vFK_Usuario.", '". $vObservacion."', '".$vQuery."')");
        }

        $vTabPFP = $this->getTableData_PFP($vPK_Personal);

        return response()->json(['pTabPFP' => $vTabPFP]);
    }

    public function fpPersonal_FormacionProfesionalConsultar(Request $r)
    {
        $vPK_Personal = $r->input('pPK_Personal');

        $vTabPFP = $this->getTableData_PFP($vPK_Personal);

        return response()->json(['pTabPFP' => $vTabPFP]);
    }

    public function pfPersonal_FormacionProfesionalEliminar(Request $r)
    {
        $vPK_PersFP = $r->input('pPK_PersFP');
        $vPK_Personal = $r->input('pPK_Personal');

        $vFK_Usuario = 1;
        $vObservacion = '';
        $vQuery = '';

        $vPFP_U = \DB::select("CALL sp_Personal_FormacionProfesional_U(".$vPK_PersFP .", 0, '', '', '', 0, 0, 0, 0, 0, ".$vFK_Usuario.", '". $vObservacion."', '".$vQuery."')");

        $vTabPFP = $this->getTableData_PFP($vPK_Personal);

        return response()->json(['pTabPFP' => $vTabPFP]);
    }

    protected function getTableData_PFP($pPK_Personal)
    {
        $vPK_Personal = $pPK_Personal;
        $vPFP_S = \DB::select("CALL sp_Personal_FormacionProfesional_S(NULL, ". $vPK_Personal .")");

        $vTabConPFP = '';
        $x = 1;

        foreach($vPFP_S as $vP)
        {
            $vTabConPFP .= '
            <tr  id="'. $vP->PK_PersFP .'">
                <td>'. $x .'</td>
                <td>'. $vP->PFP_TipoDescripcion .'</td>
                <td>'. $vP->PFP_Instituto .'</td>
                <td>'. $vP->PFP_Estudio .'</td>
                <td>'. $vP->PFP_CedulaProfesional .'</td>
                <td>'. $vP->PFP_Promedio .'</td>
                <td>'. $vP->PFP_PeriodoInicio . ' - ' . $vP->PFP_PeriodoFin  .'</td>
                <td>'. $vP->PFP_UGDescripcion .'</td>
                <td>
                    <table>
                        <tr>
                            <th>
                                <button onclick="funPersonal_FormacionProfesionalEditarForm('.$vP->PK_PersFP.')" class="btn search-button" data-toggle="tooltip" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                                <button onclick="funPersonal_FormacionProfesionalEliminar('.$vP->PK_PersFP.')"  class="btn search-button" data-toggle="tooltip" title="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                            <button onclick="funBitacora2(\'t_personal_formacionprofesional\', '.$vP->PK_PersFP.')" data-toggle="modal" data-target=".Mod_Bitacora"  class="btn search-button" data-toggle="tooltip" title="Bitacora">
                                    <i class="fa fa-list-ol"></i>
                                </button>
                            </th>
                        </tr>
                    </table>
                </td>
            </tr>';
            $x++;
        }

        $vTabPFP = '
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-full-width" id="sample_4" style="width:100% !important;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tipo</th>
                        <th>Instituto</th>
                        <th>Estudio</th>
                        <th>Célula</th>
                        <th>Promedio</th>
                        <th>Periodo</th>
                        <th>Ultimo Grado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>'
                    . $vTabConPFP .
                '</tbody>
            </table>
        </div>';

        return $vTabPFP;
    }

    public function pfPersonal_FormacionProfesionalEditarForm(Request $r)
    {
        $vPK_PersFP = $r->input('pPK_PersFP');
        $vPK_Personal = $r->input('pPK_Personal');

        $vPFP = \DB::select("CALL sp_Personal_FormacionProfesional_S(" . $vPK_PersFP . ", ". $vPK_Personal .");");

        $vPK_PersFP = $vPFP[0]->PK_PersFP;
        $vPFP_Tipo = $vPFP[0]->PFP_Tipo;
        $vPFP_Instituto = $vPFP[0]->PFP_Instituto;
        $vPFP_Estudio = $vPFP[0]->PFP_Estudio;
        $vPFP_CedulaProfesional = $vPFP[0]->PFP_CedulaProfesional;
        $vPFP_PeriodoInicio = $vPFP[0]->PFP_PeriodoInicio;
        $vPFP_PeriodoFin = $vPFP[0]->PFP_PeriodoFin;
        $vPFP_Promedio = $vPFP[0]->PFP_Promedio;
        $vPFP_UG = $vPFP[0]->PFP_UG;

        return response()->json(['pPK_PersFP' => $vPK_PersFP, 'pPFP_Tipo' => $vPFP_Tipo, 'pPFP_Instituto' => $vPFP_Instituto, 'pPFP_Estudio' => $vPFP_Estudio, 'pPFP_CedulaProfesional' => $vPFP_CedulaProfesional, 'pPFP_PeriodoInicio' => $vPFP_PeriodoInicio, 'pPFP_PeriodoFin' => $vPFP_PeriodoFin, 'pPFP_Promedio' => $vPFP_Promedio, 'pPFP_UG' => $vPFP_UG]);
    }



    public function fpPersonal_FormacionPostgradosGuardar(Request $r)
    {
        $vPK_PerPos = $r->input('pPK_PerPos');
        $vPK_Personal = $r->input('pPK_Personal');
        $vPostTipo = $r->input('pPostTipo');
        $vPostSituacion = $r->input('pPostSituacion');
        $vPPo_Instituto = $r->input('pPPo_Instituto');
        $vPPo_Nombre = $r->input('pPPo_Nombre');
        $vPPo_CedulaProfesional = $r->input('pPPo_CedulaProfesional');
        $vPPo_PeriodoInicio = $r->input('pPPo_PeriodoInicio');
        $vPPo_PeriodoFin = $r->input('pPPo_PeriodoFin');
        $vPPo_UG = $r->input('pPPo_UG');

        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_PerPos == -99) {
            $vQuery = "CALL sp_Personal_FormacionPostgrados_I(" . $vPK_Personal . ", ". $vPostTipo . ", ". $vPostSituacion . ", ". $vPPo_Instituto . "," . $vPPo_CedulaProfesional . ", " . $vPPo_Nombre . ", " . $vPPo_PeriodoInicio . ", " . $vPPo_PeriodoFin . ", " . $vPPo_UG . ", " . $vFK_Usuario . ", " . $vObservacion . ", " . "vQuery)";
            $vPPo_I = \DB::select("CALL sp_Personal_FormacionPostgrados_I(".$vPK_Personal.", ". $vPostTipo . ", ". $vPostSituacion . ", '". $vPPo_Instituto . "','" . $vPPo_CedulaProfesional . "', '" . $vPPo_Nombre . "', " . $vPPo_PeriodoInicio . ", " . $vPPo_PeriodoFin . ", " . $vPPo_UG . ", " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");
        }
        else {
            $vQuery = "CALL sp_Personal_FormacionPostgrados_U(" . $vPK_PerPos . ", " . $vPostTipo . "," . $vPostSituacion . "," . $vPPo_Instituto . "," . $vPPo_CedulaProfesional . "," . $vPPo_Nombre . "," . $vPPo_PeriodoInicio . "," . $vPPo_PeriodoFin . "," . $vPPo_UG . ", 1,".$vFK_Usuario ."," . $vObservacion . ", vQuery)";
            $vPPo_U = \DB::select("CALL sp_Personal_FormacionPostgrados_U(".$vPK_PerPos.", " . $vPostTipo . "," . $vPostSituacion . ",'" . $vPPo_Instituto . "','" . $vPPo_CedulaProfesional . "','" . $vPPo_Nombre . "'," . $vPPo_PeriodoInicio . "," . $vPPo_PeriodoFin . "," . $vPPo_UG . ", 1,".$vFK_Usuario .",'" . $vObservacion . "','" . $vQuery . "')");
        }

        $vTabPPo = $this->getTableData_PPo($vPK_Personal);

        return response()->json(['pTabPPo' => $vTabPPo]);
    }

    public function fpPersonal_FormacionPostgradosConsultar(Request $r)
    {
        $vPK_Personal = $r->input('pPK_Personal');

        $vTabPPo = $this->getTableData_PPo($vPK_Personal);

        return response()->json(['pTabPPo' => $vTabPPo]);
    }

    public function pfPersonal_FormacionPostgradosEliminar(Request $r)
    {
        $vPK_PerPos = $r->input('pPK_PerPos');
        $vPK_Personal = $r->input('pPK_Personal');

        $vFK_Usuario = 1;
        $vObservacion = '';
        $vQuery = "CALL sp_Personal_FormacionPostgrados_U(" . $vPK_PerPos . ", 0, 0, , , , 0, 0, 0, 0, ". $vFK_Usuario . "," . $vObservacion . ", vQuery)";

        $vPPo_U = \DB::select("CALL sp_Personal_FormacionPostgrados_U(".$vPK_PerPos.", 0, 0, '', '', '', 0, 0, 0, 0, ". $vFK_Usuario . ",'" . $vObservacion ."','". $vQuery ."')");

        $vTabPPo = $this->getTableData_PPo($vPK_Personal);

        return response()->json(['pTabPPo' => $vTabPPo]);
    }

    protected function getTableData_PPo($pPK_Personal)
    {
        $vPK_Personal = $pPK_Personal;
        $vPPo_S = \DB::select("CALL sp_Personal_FormacionPostgrados_S(NULL, ". $vPK_Personal .")");

        $x = 1;
        $vTabConPPo = '';
        foreach($vPPo_S as $vP)
        {
            $vTabConPPo .= '
            <tr  id="'. $vP->PK_PerPos .'">
                <td>'. $x .'</td>
                <td>'. $vP->PTi_Nombre .'</td>
                <td>'. $vP->PSi_Nombre .'</td>
                <td>'. $vP->PPo_Instituto .'</td>
                <td>'. $vP->PPo_Nombre .'</td>
                <td>'. $vP->PPo_CedulaProfesional .'</td>
                <td>'. $vP->PPo_PeriodoInicio . ' - ' . $vP->PPo_PeriodoFin  .'</td>
                <td>'. $vP->PPo_UGDescripcion .'</td>
                <td>
                    <table>
                        <tr>
                            <th>
                                <button onclick="funPersonal_FormacionPostgradosEditarForm('.$vP->PK_PerPos.')" class="btn search-button" data-toggle="tooltip" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                                <button onclick="funPersonal_FormacionPostgradosEliminar('.$vP->PK_PerPos.')"  class="btn search-button" data-toggle="tooltip" title="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                            <button onclick="funBitacora2(\'t_personal_formacionpostgrados\', '.$vP->PK_PerPos.')" data-toggle="modal" data-target=".Mod_Bitacora"  class="btn search-button" data-toggle="tooltip" title="Bitacora">
                                    <i class="fa fa-list-ol"></i>
                                </button>
                            </th>
                        </tr>
                    </table>
                </td>
            </tr>';
            $x++;
        }

        $vTabPPo = '
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-full-width" id="sample_4" style="width:100% !important;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tipo</th>
                        <th>Situación</th>
                        <th>Instituto</th>
                        <th>Nombre Postgrados</th>
                        <th>Célula Profesional</th>
                        <th>Periodo</th>
                        <th>Ultimo Grado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>'
                    . $vTabConPPo .
                '</tbody>
            </table>
        </div>';

        return $vTabPPo;
    }

    public function pfPersonal_FormacionPostgradosEditarForm(Request $r)
    {
        $vPK_PerPos = $r->input('pPK_PerPos');
        $vPK_Personal = $r->input('pPK_Personal');

        $vPPo = \DB::select("CALL sp_Personal_FormacionPostgrados_S(" . $vPK_PerPos . ", ". $vPK_Personal .");");

        $vPK_PerPos = $vPPo[0]->PK_PerPos;
        $vPK_PostTipo = $vPPo[0]->PK_PostTipo;
        $vPK_PostSituacion = $vPPo[0]->PK_PostSituacion;
        $vPPo_Instituto = $vPPo[0]->PPo_Instituto;
        $vPPo_Nombre = $vPPo[0]->PPo_Nombre;
        $vPPo_CedulaProfesional = $vPPo[0]->PPo_CedulaProfesional;
        $vPPo_PeriodoInicio = $vPPo[0]->PPo_PeriodoInicio;
        $vPPo_PeriodoFin = $vPPo[0]->PPo_PeriodoFin;
        $vPPo_UG = $vPPo[0]->PPo_UG;

        return response()->json(['pPK_PerPos' => $vPK_PerPos, 'pPK_PostTipo' => $vPK_PostTipo, 'pPK_PostSituacion' => $vPK_PostSituacion, 'pPPo_Instituto' => $vPPo_Instituto, 'pPPo_Nombre' => $vPPo_Nombre, 'pPPo_CedulaProfesional' => $vPPo_CedulaProfesional, 'pPPo_PeriodoInicio' => $vPPo_PeriodoInicio, 'pPPo_PeriodoFin' => $vPPo_PeriodoFin, 'pPPo_UG' => $vPPo_UG]);
    }



    public function fpPersonal_TesisGuardar(Request $r)
    {
        $vPK_PerTes = $r->input('pPK_PerTes');
        $vPK_Personal = $r->input('pPK_Personal');
        $vPTe_Titulo = $r->input('pPTe_Titulo');
        $vPTe_Instituto = $r->input('pPTe_Instituto');
        $vPTe_PeriodoInicio = $r->input('pPTe_PeriodoInicio');
        $vPTe_PeriodoFin = $r->input('pPTe_PeriodoFin');
        $vPTe_GradoObtenido = $r->input('pPTe_GradoObtenido');

        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_PerTes == -99) {
            $vQuery = 'CALL sp_Personal_Tesis_I';
            $vPTe_I = \DB::select("CALL sp_Personal_Tesis_I(". $vPK_Personal .",'" . $vPTe_Titulo ."', '" . $vPTe_Instituto . "', " . $vPTe_PeriodoInicio . ", " . $vPTe_PeriodoFin . ", '" . $vPTe_GradoObtenido . "'," . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");
        }
        else {
            $vQuery = 'CALL sp_Personal_Tesis_U';
            $vPTe_U = \DB::select("CALL sp_Personal_Tesis_U(".$vPK_PerTes.",'" .$vPTe_Titulo."','" .$vPTe_Instituto."', ".$vPTe_PeriodoInicio.", ". $vPTe_PeriodoFin . ", '" . $vPTe_GradoObtenido . "', 1, ". $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");
        }

        $vTabPTe = $this->getTableData_PTe($vPK_Personal);

        return response()->json(['pTabPTe' => $vTabPTe]);
    }

    public function fpPersonal_TesisConsultar(Request $r)
    {
        $vPK_Personal = $r->input('pPK_Personal');

        $vTabPTe = $this->getTableData_PTe($vPK_Personal);

        return response()->json(['pTabPTe' => $vTabPTe]);
    }

    public function pfPersonal_TesisEliminar(Request $r)
    {
        $vPK_PerTes = $r->input('pPK_PerTes');
        $vPK_Personal = $r->input('pPK_Personal');

        $vFK_Usuario = 1;
        $vObservacion = '';
        $vQuery = 'sp_Personal_Tesis_U';

        $vPTe_U = \DB::select("CALL sp_Personal_Tesis_U(".$vPK_PerTes.",'','', 0, 0, '', 0, ". $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");

        $vTabPTe = $this->getTableData_PTe($vPK_Personal);

        return response()->json(['pTabPTe' => $vTabPTe]);
    }

    protected function getTableData_PTe($pPK_Personal)
    {
        $vPK_Personal = $pPK_Personal;
        $vPPo_S = \DB::select("CALL sp_Personal_Tesis_S(NULL, ". $vPK_Personal .")");

        $vTabConPTe = '';
        $x = 1;

        foreach($vPPo_S as $vP)
        {
            $vTabConPTe .= '
            <tr  id="'. $vP->PK_PerTes .'">
                <td>'. $x .'</td>
                <td>'. $vP->PTe_Titulo .'</td>
                <td>'. $vP->PTe_Instituto .'</td>
                <td>'. $vP->PTe_PeriodoInicio . ' - ' . $vP->PTe_PeriodoFin  .'</td>
                <td>'. $vP->PTe_GradoObtenido .'</td>
                <td>
                    <table>
                        <tr>
                            <th>
                                <button onclick="funPersonal_TesisEditarForm('.$vP->PK_PerTes.')" class="btn search-button" data-toggle="tooltip" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                                <button onclick="funPersonal_TesisEliminar('.$vP->PK_PerTes.')"  class="btn search-button" data-toggle="tooltip" title="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                            <button onclick="funBitacora2(\'t_personal_tesis\', '.$vP->PK_PerTes.')" data-toggle="modal" data-target=".Mod_Bitacora"  class="btn search-button" data-toggle="tooltip" title="Bitacora">
                                    <i class="fa fa-list-ol"></i>
                                </button>
                            </th>
                        </tr>
                    </table>
                </td>
            </tr>';
            $x++;
        }


        $vTabPTe = '
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_4" style="width:100% !important;" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titulo</th>
                            <th>Instituto</th>
                            <th>Periodo</th>
                            <th>Grado Obtenido</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>'
                    . $vTabConPTe .
                    '</tbody>
                </table>
            </div>';

        return $vTabPTe;
    }

    public function pfPersonal_TesisEditarForm(Request $r)
    {
        $vPK_PerTes = $r->input('pPK_PerTes');
        $vPK_Personal = $r->input('pPK_Personal');

        $vPTe = \DB::select("CALL sp_Personal_Tesis_S(" . $vPK_PerTes . ", ". $vPK_Personal .");");

        $vPK_PerTes = $vPTe[0]->PK_PerTes;
        $vPTe_Titulo = $vPTe[0]->PTe_Titulo;
        $vPTe_Instituto = $vPTe[0]->PTe_Instituto;
        $vPTe_PeriodoInicio = $vPTe[0]->PTe_PeriodoInicio;
        $vPTe_PeriodoFin = $vPTe[0]->PTe_PeriodoFin;
        $vPTe_GradoObtenido = $vPTe[0]->PTe_GradoObtenido;

        return response()->json(['pPK_PerTes' => $vPK_PerTes, 'pPTe_Titulo' => $vPTe_Titulo, 'pPTe_Instituto' => $vPTe_Instituto, 'pPTe_PeriodoInicio' => $vPTe_PeriodoInicio, 'pPTe_PeriodoFin' => $vPTe_PeriodoFin, 'pPTe_GradoObtenido' => $vPTe_GradoObtenido]);
    }



    public function fpPersonal_FormacionComplementariaGuardar(Request $r)
    {
        $vPK_PerFCo = $r->input('pPK_PerFCo');
        $vPK_Personal = $r->input('pPK_Personal');
        $vPFC_Instituto = $r->input('pPFC_Instituto');
        $vPFC_Nombre = $r->input('pPFC_Nombre');
        $vPFC_Tipo = $r->input('pPFC_Tipo');
        $vPFC_DocumentoProbatorio = $r->input('pPFC_DocumentoProbatorio');
        $vPFC_PeriodoInicio = $r->input('pPFC_PeriodoInicio');
        $vPFC_PeriodoFin = $r->input('pPFC_PeriodoFin');

        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_PerFCo == -99) {
            $vQuery = 'CALL sp_Personal_FormacionComplementaria_I';
            $vPFC_I = \DB::select("CALL sp_Personal_FormacionComplementaria_I(" . $vPK_Personal . ", '" . $vPFC_Instituto . "', '" . $vPFC_Nombre . "', '" . $vPFC_Tipo . "', '" . $vPFC_DocumentoProbatorio . "', " . $vPFC_PeriodoInicio . ", " . $vPFC_PeriodoFin . ", " . $vFK_Usuario . ", '" . $vObservacion . "','" . $vQuery . "')");
        }
        else {
            $vQuery = 'CALL sp_Personal_FormacionComplementaria_U';
            $vPFC_U = \DB::select("CALL sp_Personal_FormacionComplementaria_U(" . $vPK_PerFCo .", '" . $vPFC_Instituto . "', '" . $vPFC_Nombre . "', '" . $vPFC_Tipo . "', '" . $vPFC_DocumentoProbatorio . "', " . $vPFC_PeriodoInicio . ", " . $vPFC_PeriodoFin . ", 1, " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");
        }

        $vTabPFC = $this->getTableData_PFC($vPK_Personal);

        return response()->json(['pTabPFC' => $vTabPFC]);
    }

    public function fpPersonal_FormacionComplementariaConsultar(Request $r)
    {
        $vPK_Personal = $r->input('pPK_Personal');

        $vTabPFC = $this->getTableData_PFC($vPK_Personal);

        return response()->json(['pTabPFC' => $vTabPFC]);
    }

    public function pfPersonal_FormacionComplementariaEliminar(Request $r)
    {
        $vPK_PerFCo = $r->input('pPK_PerFCo');
        $vPK_Personal = $r->input('pPK_Personal');

        $vFK_Usuario = 1;
        $vObservacion = '';
        $vQuery = 'CALL sp_Personal_FormacionComplementaria_U';

        $vPFC_U = \DB::select("CALL sp_Personal_FormacionComplementaria_U( ". $vPK_PerFCo . ", '', '', '', '', 0, 0, 0, ". $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");

        $vTabPFC = $this->getTableData_PFC($vPK_Personal);

        return response()->json(['pTabPFC' => $vTabPFC]);
    }

    protected function getTableData_PFC($pPK_Personal)
    {
        $vPK_Personal = $pPK_Personal;
        $vPFC_S = \DB::select("CALL sp_Personal_FormacionComplementaria_S(NULL, ". $vPK_Personal .")");

        $x = 1;
        $vTabConPFC = '';
        foreach($vPFC_S as $vP)
        {
            $vTabConPFC .= '
            <tr  id="'. $vP->PK_PerFCo .'">
                <td>'. $x .'</td>
                <td>'. $vP->PFC_Instituto .'</td>
                <td>'. $vP->PFC_Nombre .'</td>
                <td>'. $vP->PFC_Tipo .'</td>
                <td>'. $vP->PFC_DocumentoProbatorio .'</td>
                <td>'. $vP->PFC_PeriodoInicio . ' - ' . $vP->PFC_PeriodoFin  .'</td>
                <td>
                    <table>
                        <tr>
                            <th>
                                <button onclick="funPersonal_FormacionComplementariaEditarForm('. $vP->PK_PerFCo .')" class="btn search-button" data-toggle="tooltip" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                                <button onclick="funPersonal_FormacionComplementariaEliminar('. $vP->PK_PerFCo .')"  class="btn search-button" data-toggle="tooltip" title="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                            <button onclick="funBitacora2(\'t_personal_formacioncomplementaria\', '. $vP->PK_PerFCo .')" data-toggle="modal" data-target=".Mod_Bitacora"  class="btn search-button" data-toggle="tooltip" title="Bitacora">
                                    <i class="fa fa-list-ol"></i>
                                </button>
                            </th>
                        </tr>
                    </table>
                </td>
            </tr>';
            $x++;
        }

        $vTabPFC = '
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-full-width" id="sample_4" style="width:100% !important;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Instituto</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Documento Probatorio</th>
                        <th>Periodo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>'
                    . $vTabConPFC .
                '</tbody>
            </table>
        </div>';

        return $vTabPFC;
    }

    public function pfPersonal_FormacionComplementariaEditarForm(Request $r)
    {
        $vPK_PerFCo = $r->input('pPK_PerFCo');
        $vPK_Personal = $r->input('pPK_Personal');

        $vPFC = \DB::select("CALL sp_Personal_FormacionComplementaria_S(" . $vPK_PerFCo . ", ". $vPK_Personal .");");

        $vPK_PerFCo = $vPFC[0]->PK_PerFCo;
        $vPFC_Instituto = $vPFC[0]->PFC_Instituto;
        $vPFC_Nombre = $vPFC[0]->PFC_Nombre;
        $vPFC_Tipo = $vPFC[0]->PFC_Tipo;
        $vPFC_DocumentoProbatorio = $vPFC[0]->PFC_DocumentoProbatorio;
        $vPFC_PeriodoInicio = $vPFC[0]->PFC_PeriodoInicio;
        $vPFC_PeriodoFin = $vPFC[0]->PFC_PeriodoFin;

        return response()->json(['pPK_PerFCo' => $vPK_PerFCo, 'pPFC_Instituto' => $vPFC_Instituto, 'pPFC_Nombre' => $vPFC_Nombre, 'pPFC_Tipo' => $vPFC_Tipo, 'pPFC_DocumentoProbatorio' => $vPFC_DocumentoProbatorio, 'pPFC_PeriodoInicio' => $vPFC_PeriodoInicio, 'pPFC_PeriodoFin' => $vPFC_PeriodoFin]);
    }



    public function fpPersonal_LenguaGuardar(Request $r)
    {
        $vPK_PersLengua = $r->input('pPK_PersLengua');
        $vPK_Personal = $r->input('pPK_Personal');
        $vLengua = $r->input('pLengua');
        $vLen_Nombre = $r->input('pLen_Nombre');
        $vHabla = $r->input('pHabla');
        $vLee = $r->input('pLee');
        $vEscribe = $r->input('pEscribe');
        $vComprende = $r->input('pComprende');

        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_PersLengua == -99) {
            $vQuery = 'CALL sp_Personal_Lengua_I(pFK_Personal, pFK_Lengua, pPLe_Habla, pPLe_Lee, pPLe_Escribe, pPLe_Comprende, pFK_Usuario, pObservacion, pQuery)';
            $vPLe_I = \DB::select("CALL sp_Personal_Lengua_I(" . $vPK_Personal . ", " . $vLengua . ", '" . $vHabla . "', '" . $vLee . "', '" . $vEscribe . "', '" . $vComprende . "', " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");
        }
        else {
            $vQuery = 'CALL sp_Personal_Lengua_U(pPK_PersLengua, pFK_Lengua, pPLe_Habla, pPLe_Lee, pPLe_Escribe, pPLe_Comprende, pPLe_Estatus, pFK_Usuario, pObservacion, pQuery)';
            $vPLe_U = \DB::select("CALL sp_Personal_Lengua_U(". $vPK_PersLengua . ", " . $vLengua . ", '" . $vHabla . "', '" . $vLee . "', '" . $vEscribe . "', '" . $vComprende . "', 1, " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");
        }

        $vTabPLe = $this->getTableData_PLe($vPK_Personal);

        return response()->json(['pTabPLe' => $vTabPLe]);
    }

    public function fpPersonal_LenguaConsultar(Request $r)
    {
        $vPK_Personal = $r->input('pPK_Personal');

        $vTabPLe = $this->getTableData_PLe($vPK_Personal);

        return response()->json(['pTabPLe' => $vTabPLe]);
    }

    public function pfPersonal_LenguaEliminar(Request $r)
    {
        $vPK_PersLengua = $r->input('pPK_PersLengua');
        $vPK_Personal = $r->input('pPK_Personal');

        $vFK_Usuario = 1;
        $vObservacion = '';
        $vQuery = 'CALL sp_Personal_Lengua_U';

        $vPLe_U = \DB::select("CALL sp_Personal_Lengua_U(". $vPK_PersLengua . ", 0, '', '', '', '', 0, " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");

        $vTabPLe = $this->getTableData_PLe($vPK_Personal);

        return response()->json(['pTabPLe' => $vTabPLe]);
    }

    protected function getTableData_PLe($pPK_Personal)
    {
        $vPK_Personal = $pPK_Personal;
        $vPLe_S = \DB::select("CALL sp_Personal_Lengua_S(NULL, ". $vPK_Personal .")");

        $x = 1;
        $vTabConPLe = '';

        foreach($vPLe_S as $vP)
        {
            $vTabConPLe .= '
            <tr  id="'. $vP->PK_PersLengua .'">
                <td>'. $x .'</td>
                <td>'. $vP->Len_TipoDescripcion .'</td>
                <td>'. $vP->Len_Nombre .'</td>
                <td>'. $vP->PLe_Habla .'</td>
                <td>'. $vP->PLe_Lee .'</td>
                <td>'. $vP->PLe_Escribe .'</td>
                <td>'. $vP->PLe_Comprende .'</td>
                <td>
                    <table>
                        <tr>
                            <th>
                                <button onclick="funPersonal_LenguaEditarForm('. $vP->PK_PersLengua .')" class="btn search-button" data-toggle="tooltip" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                                <button onclick="funPersonal_LenguaEliminar('. $vP->PK_PersLengua .')"  class="btn search-button" data-toggle="tooltip" title="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                            <button onclick="funBitacora2(\'t_personal_lengua\', '. $vP->PK_PersLengua .')" data-toggle="modal" data-target=".Mod_Bitacora"  class="btn search-button" data-toggle="tooltip" title="Bitacora">
                                    <i class="fa fa-list-ol"></i>
                                </button>
                            </th>
                        </tr>
                    </table>
                </td>
            </tr>';
            $x++;
        }

        $vTabPLe = '
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-full-width" id="sample_4" style="width:100% !important;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tipo</th>
                        <th>Lengua</th>
                        <th>Habla</th>
                        <th>Lee</th>
                        <th>Escribe</th>
                        <th>Comprende Auditivamente </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>'
                    . $vTabConPLe .
                '</tbody>
            </table>
        </div>';

        return $vTabPLe;
    }

    public function pfPersonal_LenguaEditarForm(Request $r)
    {
        $vPK_PersLengua = $r->input('pPK_PersLengua');
        $vPK_Personal = $r->input('pPK_Personal');

        $vPLe = \DB::select("CALL sp_Personal_Lengua_S(" . $vPK_PersLengua . ", ". $vPK_Personal .");");

        $vPK_PersLengua = $vPLe[0]->PK_PersLengua;
        $vLen_Tipo = $vPLe[0]->Len_Tipo;
        $vPK_Lengua = $vPLe[0]->PK_Lengua;
        $vPLe_Habla = $vPLe[0]->PLe_Habla;
        $vPLe_Lee = $vPLe[0]->PLe_Lee;
        $vPLe_Escribe = $vPLe[0]->PLe_Escribe;
        $vPLe_Comprende = $vPLe[0]->PLe_Comprende;


        $vLengua = \DB::select("CALL sp_Lengua_S(NULL, " . $vLen_Tipo . ")");

        $vSeLengua = '
            <div class="form-group">
                <label> Lengua <span class="symbol required"></span> </label>
                <select class="js-example-basic-single js-states form-control SeLengua" name="SeLengua" id="SeLengua" style="width: 100% !importan" onchange="funLen_Nombre()">';

        foreach ($vLengua as $vL) {
            if ($vPK_Lengua == $vL->PK_Lengua) {
                $vSeLengua .= '<option selected value="' . $vL->PK_Lengua . '" >' . $vL->Len_Nombre . '</option>';
            } else {
                $vSeLengua .= '<option value="' . $vL->PK_Lengua . '" >' . $vL->Len_Nombre . '</option>';
            }

        }

        $vSeLengua .= '
                </select>
            </div>';


        return response()->json(['pPK_PersLengua' => $vPK_PersLengua, 'pLen_Tipo' => $vLen_Tipo, 'pSeLengua' => $vSeLengua, 'pPLe_Habla' => $vPLe_Habla, 'pPLe_Lee' => $vPLe_Lee, 'pPLe_Escribe' => $vPLe_Escribe, 'pPLe_Comprende' => $vPLe_Comprende]);
    }



    public function fpPersonal_ConocimientoComputoGuardar(Request $r)
    {
        $vPK_PerCCo = $r->input('pPK_PerCCo');
        $vPK_Personal = $r->input('pPK_Personal');
        $vItems = $r->input('pConoComputo');
        $vLong = count($vItems);
        $vNivel = $r->input('pNivel');

        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_PerCCo == -99) {
            for($i=0; $i<$vLong; $i++)
            {
                $vQuery = 'CALL sp_Personal_ConocimientoComputo_I(pFK_Personal, pFK_ConoComputo, pCCo_Nivel, pFK_Usuario, pObservacion, pQuery)';
                $vPCC_I = \DB::select("CALL sp_Personal_ConocimientoComputo_I(" . $vPK_Personal . ", " . $vItems[$i] .", '". $vNivel . "', ". $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");
            }
        }
        else {
            for($i=0; $i<$vLong; $i++)
            {
                $vQuery = 'CALL sp_Personal_ConocimientoComputo_U(pPK_PerCCo, pFK_ConoComputo, pCCo_Nivel, pCCo_Estatus, pFK_Usuario, pObservacion, pQuery)';
                $vPCC_U = \DB::select("CALL sp_Personal_ConocimientoComputo_U(" . $vPK_PerCCo . ", " . $vItems[$i] .", '" . $vNivel . "', 1, ". $vFK_Usuario . ", '" . $vObservacion . "', '". $vQuery. "')");
            }
        }

        $vTabPCC = $this->getTableData_PCC($vPK_Personal);

        return response()->json(['pTabPCC' => $vTabPCC]);
    }

    public function fpPersonal_ConocimientoComputoConsultar(Request $r)
    {
        $vPK_Personal = $r->input('pPK_Personal');

        $vTabPCC = $this->getTableData_PCC($vPK_Personal);

        return response()->json(['pTabPCC' => $vTabPCC]);
    }

    public function pfPersonal_ConocimientoComputoEliminar(Request $r)
    {
        $vPK_PerCCo = $r->input('pPK_PerCCo');
        $vPK_Personal = $r->input('pPK_Personal');

        $vFK_Usuario = 1;
        $vObservacion = '';

        $vQuery = 'CALL sp_Personal_ConocimientoComputo_U(pPK_PerCCo, pFK_ConoComputo, pCCo_Nivel, pFK_Usuario, pObservacion, pQuery)';
        $vPCC_U = \DB::select("CALL sp_Personal_ConocimientoComputo_U(" . $vPK_PerCCo . ", 0, '', 0, ". $vFK_Usuario . ", '" . $vObservacion . "', '". $vQuery. "')");

        $vTabPCC = $this->getTableData_PCC($vPK_Personal);

        return response()->json(['pTabPCC' => $vTabPCC]);
    }

    protected function getTableData_PCC($pPK_Personal)
    {
        $vPK_Personal = $pPK_Personal;
        $vPFC_S = \DB::select("CALL sp_Personal_ConocimientoComputo_S(NULL, ". $vPK_Personal .")");

        $x = 1;
        $vTabConPCC = '';

        foreach($vPFC_S as $vP)
        {
            $vTabConPCC .= '
            <tr  id="'. $vP->PK_PerCCo .'">
                <td>'. $x .'</td>
                <td>'. $vP->CCo_Nombre .'</td>
                <td>'. $vP->CCo_Nivel .'</td>
                <td>
                    <table>
                        <tr>
                            <th>
                                <button onclick="funPersonal_ConocimientoComputoEditarForm('. $vP->PK_PerCCo .')" class="btn search-button" data-toggle="tooltip" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                                <button onclick="funPersonal_ConocimientoComputoEliminar('. $vP->PK_PerCCo .')"  class="btn search-button" data-toggle="tooltip" title="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                            <button onclick="funBitacora2(\'t_personal_conocimientocomputo\', '. $vP->PK_PerCCo .')" data-toggle="modal" data-target=".Mod_Bitacora"  class="btn search-button" data-toggle="tooltip" title="Bitacora">
                                    <i class="fa fa-list-ol"></i>
                                </button>
                            </th>
                        </tr>
                    </table>
                </td>
            </tr>';
            $x++;
        }

        $vTabPCC = '
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-full-width" id="sample_4" style="width:100% !important;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Programa o Paquete</th>
                        <th>Nivel Manejo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>'
                    . $vTabConPCC .
                '</tbody>
            </table>
        </div>';

        return $vTabPCC;
    }

    public function pfPersonal_ConocimientoComputoEditarForm(Request $r)
    {
        $vPK_PerCCo = $r->input('pPK_PerCCo');
        $vPK_Personal = $r->input('pPK_Personal');

        $vPCC = \DB::select("CALL sp_Personal_ConocimientoComputo_S(" . $vPK_PerCCo . ", ". $vPK_Personal .");");

        $vPK_PerCCo = $vPCC[0]->PK_PerCCo;
        $vCCo_Nivel = $vPCC[0]->CCo_Nivel;
        $vPK_ConoComputo = $vPCC[0]->PK_ConoComputo;

        return response()->json(['pPK_PerCCo' => $vPK_PerCCo, 'pCCo_Nivel' => $vCCo_Nivel, 'pPK_ConoComputo' => $vPK_ConoComputo]);
    }



    public function fpPersonal_ActualizacionGuardar(Request $r)
    {
        $vPK_PerAct = $r->input('pPK_PerAct');
        $vPK_Personal = $r->input('pPK_Personal');
        $vPAc_Instituto = $r->input('pPAc_Instituto');
        $vPAc_Nombre = $r->input('pPAc_Nombre');
        $vPAc_DuracionHoras = $r->input('pPAc_DuracionHoras');
        $vPAc_PeriodoInicio = $r->input('pPAc_PeriodoInicio');
        $vPAc_PeriodoFin = $r->input('pPAc_PeriodoFin');

        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_PerAct == -99) {
            $vQuery = 'CALL sp_Personal_Actualizacion_I(pFK_Personal, pPAc_Instituto, pPAc_Nombre, pPAc_PeriodoInicio, pPAc_PeriodoFin, pPAc_DuracionHoras, pFK_Usuario, pObservacion, pQuery)';
            $vPAc_I = \DB::select("CALL sp_Personal_Actualizacion_I(". $vPK_Personal. ", '" . $vPAc_Instituto. "', '". $vPAc_Nombre . "', '". $vPAc_PeriodoInicio. "', '" . $vPAc_PeriodoFin . "', ". $vPAc_DuracionHoras . ", " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery. "')");
        }
        else {
            $vQuery = 'CALL sp_Personal_Actualizacion_U(pPK_PerAct, pPAc_Instituto, pPAc_Nombre, pPAc_PeriodoInicio, pPAc_PeriodoFin, pPAc_DuracionHoras, pPAc_Estatus, pFK_Usuario, pObservacion, pQuery)';
            $vPAc_U = \DB::select("CALL sp_Personal_Actualizacion_U(" . $vPK_PerAct . ", '" . $vPAc_Instituto . "', '" . $vPAc_Nombre . "', '" . $vPAc_PeriodoInicio . "', '" . $vPAc_PeriodoFin . "', " . $vPAc_DuracionHoras . ", 1, " . $vFK_Usuario . ", '" . $vObservacion . "', '". $vQuery . "')");
        }

        $vTabPAc = $this->getTableData_PAc($vPK_Personal);

        return response()->json(['pTabPAc' => $vTabPAc]);
    }

    public function fpPersonal_ActualizacionConsultar(Request $r)
    {
        $vPK_Personal = $r->input('pPK_Personal');

        $vTabPAc = $this->getTableData_PAc($vPK_Personal);

        return response()->json(['pTabPAc' => $vTabPAc]);
    }

    public function pfPersonal_ActualizacionEliminar(Request $r)
    {
        $vPK_PerAct = $r->input('pPK_PerAct');
        $vPK_Personal = $r->input('pPK_Personal');

        $vFK_Usuario = 1;
        $vObservacion = '';
        $vQuery = 'CALL sp_Personal_Actualizacion_U(pPK_PerAct, pPAc_Instituto, pPAc_Nombre, pPAc_PeriodoInicio, pPAc_PeriodoFin, pPAc_DuracionHoras, pPAc_Estatus, pFK_Usuario, pObservacion, pQuery)';

        $vPAc_U = \DB::select("CALL sp_Personal_Actualizacion_U(" . $vPK_PerAct . ", '', '', '', '',0, 0, " . $vFK_Usuario . ", '" . $vObservacion . "', '". $vQuery . "')");

        $vTabPAc = $this->getTableData_PAc($vPK_Personal);

        return response()->json(['pTabPAc' => $vTabPAc]);
    }

    protected function getTableData_PAc($pPK_Personal)
    {
        $vPK_Personal = $pPK_Personal;
        $vPAc_S = \DB::select("CALL sp_Personal_Actualizacion_S(NULL, ". $vPK_Personal .")");

        $vTabConPAc = '';
        $x = 1;

        foreach($vPAc_S as $vP)
        {
            $vTabConPAc .= '
            <tr  id="'. $vP->PK_PerAct .'">
                <td>'. $x .'</td>
                <td>'. $vP->PAc_Instituto .'</td>
                <td>'. $vP->PAc_Nombre .'</td>
                <td>'. $vP->PAc_DuracionHoras .'</td>
                <td>'.  date('d/m/Y', strtotime($vP->PAc_PeriodoInicio)) . ' - ' . date('d/m/Y', strtotime($vP->PAc_PeriodoFin))  .'</td>
                <td>
                    <table>
                        <tr>
                            <th>
                                <button onclick="funPersonal_ActualizacionEditarForm('.$vP->PK_PerAct.')" class="btn search-button" data-toggle="tooltip" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                                <button onclick="funPersonal_ActualizacionEliminar('.$vP->PK_PerAct.')"  class="btn search-button" data-toggle="tooltip" title="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                            <button onclick="funBitacora2(\'t_personal_actualizacion\', '.$vP->PK_PerAct.')" data-toggle="modal" data-target=".Mod_Bitacora"  class="btn search-button" data-toggle="tooltip" title="Bitacora">
                                    <i class="fa fa-list-ol"></i>
                                </button>
                            </th>
                        </tr>
                    </table>
                </td>
            </tr>';
            $x++;
        }


        $vTabPAc = '
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_4" style="width:100% !important;" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Instituto</th>
                            <th>Nombre</th>
                            <th>Duración</th>
                            <th>Periodo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>'
                    . $vTabConPAc .
                    '</tbody>
                </table>
            </div>';

        return $vTabPAc;
    }

    public function pfPersonal_ActualizacionEditarForm(Request $r)
    {
        $vPK_PerAct = $r->input('pPK_PerAct');
        $vPK_Personal = $r->input('pPK_Personal');

        $vPAc = \DB::select("CALL sp_Personal_Actualizacion_S(" . $vPK_PerAct . ", ". $vPK_Personal .");");

        $vPK_PerAct = $vPAc[0]->PK_PerAct;
        $vPAc_Instituto = $vPAc[0]->PAc_Instituto;
        $vPAc_Nombre = $vPAc[0]->PAc_Nombre;
        $vPAc_PeriodoInicio = $vPAc[0]->PAc_PeriodoInicio;
        $vPAc_PeriodoFin = $vPAc[0]->PAc_PeriodoFin;
        $vPAc_DuracionHoras = $vPAc[0]->PAc_DuracionHoras;

        return response()->json(['pPK_PerAct' => $vPK_PerAct, 'pPAc_Instituto' => $vPAc_Instituto, 'pPAc_Nombre' => $vPAc_Nombre, 'pPAc_PeriodoInicio' => $vPAc_PeriodoInicio, 'pPAc_PeriodoFin' => $vPAc_PeriodoFin, 'pPAc_DuracionHoras' => $vPAc_DuracionHoras]);
    }



    public function fpPersonal_ExperienciaProfesionalGuardar(Request $r)
    {
        $vPK_PerEPr = $r->input('pPK_PerEPr');
        $vPK_Personal = $r->input('pPK_Personal');
        $vEPr_Instituto = $r->input('pEPr_Instituto');
        $vEPr_Puesto = $r->input('pEPr_Puesto');
        $vEPr_PeriodoInicio = $r->input('pEPr_PeriodoInicio');
        $vEPr_PeriodoFin = $r->input('pEPr_PeriodoFin');
        $vEPr_Funciones = $r->input('pEPr_Funciones');

        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_PerEPr == -99) {
            $vQuery = 'CALL sp_Personal_ExperienciaProfesional_I(pFK_Personal, pEPr_Instituto, pEPr_Puesto, pEPr_PeriodoInicio, pEPr_PeriodoFin, pEPr_Funciones, pFK_Usuario, pObservacion, pQuery)';
            $vPEP_I = \DB::select("CALL sp_Personal_ExperienciaProfesional_I(" . $vPK_Personal . ", '" . $vEPr_Instituto . "', '". $vEPr_Puesto . "', '" . $vEPr_PeriodoInicio . "', '" . $vEPr_PeriodoFin . "', '" . $vEPr_Funciones . "', " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");
        }
        else {
            $vQuery = 'CALL sp_Personal_ExperienciaProfesional_U(pPK_PerEPr, pEPr_Instituto, pEPr_Puesto, pEPr_PeriodoInicio, pEPr_PeriodoFin, pEPr_Funciones, pEPr_Estatus, pFK_Usuario, pObservacion, pQuery)';
            $vPEP_U = \DB::select("CALL sp_Personal_ExperienciaProfesional_U(" . $vPK_PerEPr . ", '" . $vEPr_Instituto. "', '" . $vEPr_Puesto . "', '" . $vEPr_PeriodoInicio . "', '" . $vEPr_PeriodoFin . "', '" . $vEPr_Funciones . "', 1, ". $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");
        }

        $vTabPEP = $this->getTableData_PEP($vPK_Personal);

        return response()->json(['pTabPEP' => $vTabPEP]);
    }

    public function fpPersonal_ExperienciaProfesionalConsultar(Request $r)
    {
        $vPK_Personal = $r->input('pPK_Personal');

        $vTabPEP = $this->getTableData_PEP($vPK_Personal);

        return response()->json(['pTabPEP' => $vTabPEP]);
    }

    public function pfPersonal_ExperienciaProfesionalEliminar(Request $r)
    {
        $vPK_PerEPr = $r->input('pPK_PerEPr');
        $vPK_Personal = $r->input('pPK_Personal');

        $vFK_Usuario = 1;
        $vObservacion = '';
        $vQuery = 'CALL sp_Personal_ExperienciaProfesional_U(pPK_PerEPr, pEPr_Instituto, pEPr_Puesto, pEPr_PeriodoInicio, pEPr_PeriodoFin, pEPr_Funciones, pEPr_Estatus, pFK_Usuario, pObservacion, pQuery)';

        $vPEP_U = \DB::select("CALL sp_Personal_ExperienciaProfesional_U(" . $vPK_PerEPr . ", '', '', '', '', '', 0, " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");

        $vTabPEP = $this->getTableData_PEP($vPK_Personal);

        return response()->json(['pTabPEP' => $vTabPEP]);
    }

    protected function getTableData_PEP($pPK_Personal)
    {
        $vPK_Personal = $pPK_Personal;
        $vPEP_S = \DB::select("CALL sp_Personal_ExperienciaProfesional_S(NULL, ". $vPK_Personal .")");

        $vTabConPEP = '';
        $x = 1;

        foreach($vPEP_S as $vP)
        {
            $vTabConPEP .= '
            <tr  id="'. $vP->PK_PerEPr .'">
                <td>'. $x .'</td>
                <td>'. $vP->EPr_Instituto .'</td>
                <td>'. $vP->EPr_Puesto .'</td>
                <td>'. $vP->EPr_Funciones .'</td>
                <td>'.  date('d/m/Y', strtotime($vP->EPr_PeriodoInicio)) . ' - ' . date('d/m/Y', strtotime($vP->EPr_PeriodoFin))  .'</td>
                <td>
                    <table>
                        <tr>
                            <th>
                                <button onclick="funPersonal_ExperienciaProfesionalEditarForm('.$vP->PK_PerEPr.')" class="btn search-button" data-toggle="tooltip" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                                <button onclick="funPersonal_ExperienciaProfesionalEliminar('.$vP->PK_PerEPr.')"  class="btn search-button" data-toggle="tooltip" title="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                            <button onclick="funBitacora2(\'t_personal_experienciaprofesional\', '.$vP->PK_PerEPr.')" data-toggle="modal" data-target=".Mod_Bitacora"  class="btn search-button" data-toggle="tooltip" title="Bitacora">
                                    <i class="fa fa-list-ol"></i>
                                </button>
                            </th>
                        </tr>
                    </table>
                </td>
            </tr>';
            $x++;
        }


        $vTabPEP = '
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_4" style="width:100% !important;" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Instituto</th>
                            <th>Puesto</th>
                            <th>Función</th>
                            <th>Periodo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>'
                    . $vTabConPEP .
                    '</tbody>
                </table>
            </div>';

        return $vTabPEP;
    }

    public function pfPersonal_ExperienciaProfesionalEditarForm(Request $r)
    {
        $vPK_PerEPr = $r->input('pPK_PerEPr');
        $vPK_Personal = $r->input('pPK_Personal');

        $vPEP = \DB::select("CALL sp_Personal_ExperienciaProfesional_S(" . $vPK_PerEPr . ", ". $vPK_Personal .");");

        $vPK_PerEPr = $vPEP[0]->PK_PerEPr;
        $vEPr_Instituto = $vPEP[0]->EPr_Instituto;
        $vEPr_Puesto = $vPEP[0]->EPr_Puesto;
        $vEPr_PeriodoInicio = $vPEP[0]->EPr_PeriodoInicio;
        $vEPr_PeriodoFin = $vPEP[0]->EPr_PeriodoFin;
        $vEPr_Funciones = $vPEP[0]->EPr_Funciones;

        return response()->json(['pPK_PerEPr' => $vPK_PerEPr, 'pEPr_Instituto' => $vEPr_Instituto, 'pEPr_Puesto' => $vEPr_Puesto, 'pEPr_PeriodoInicio' => $vEPr_PeriodoInicio, 'pEPr_PeriodoFin' => $vEPr_PeriodoFin, 'pEPr_Funciones' => $vEPr_Funciones]);
    }


    public function fpPersonal_ExperienciaDocenteGuardar(Request $r)
    {
        $vPK_PerEDo = $r->input('pPK_PerEDo');
        $vPK_Personal = $r->input('pPK_Personal');
        $vPDo_Instituto = $r->input('pPDo_Instituto');
        $vFK_NivEducativo = $r->input('pNivEducativo');
        $vPDo_PeriodoInicio = $r->input('pPDo_PeriodoInicio');
        $vPDo_PeriodoFin = $r->input('pPDo_PeriodoFin');
        $vPDo_Asignaturas = $r->input('pPDo_Asignaturas');

        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_PerEDo == -99) {
            $vQuery = 'CALL sp_Personal_ExperienciaDocente_I(pFK_Personal, pFK_NivEducativo, pPDo_Instituto, pPDo_PeriodoInicio, pPDo_PeriodoFin, pPDo_Asignaturas, pFK_Usuario, pObservacion, pQuery)';
            $vPED_I = \DB::select("CALL sp_Personal_ExperienciaDocente_I(" . $vPK_Personal . ", " . $vFK_NivEducativo . ", '" . $vPDo_Instituto . "', '" . $vPDo_PeriodoInicio . "', '" . $vPDo_PeriodoFin . "', '" . $vPDo_Asignaturas . "', " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");
        }
        else {
            $vQuery = 'sp_Personal_ExperienciaDocente_U(pPK_PerEDo, pFK_NivEducativo, pPDo_Instituto, pPDo_PeriodoInicio, pPDo_PeriodoFin, pPDo_Asignaturas, pPDo_Estatus, pFK_Usuario, pObservacion, pQuery)';
            $vPED_U = \DB::select("CALL sp_Personal_ExperienciaDocente_U(" . $vPK_PerEDo . ", " . $vFK_NivEducativo . ", '" . $vPDo_Instituto . "', '" . $vPDo_PeriodoInicio . "', '" . $vPDo_PeriodoFin . "', '" . $vPDo_Asignaturas . "', 1, " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");
        }

        $vTabPED = $this->getTableData_PED($vPK_Personal);

        return response()->json(['pTabPED' => $vTabPED]);
    }

    public function fpPersonal_ExperienciaDocenteConsultar(Request $r)
    {
        $vPK_Personal = $r->input('pPK_Personal');

        $vTabPED = $this->getTableData_PED($vPK_Personal);

        return response()->json(['pTabPED' => $vTabPED]);
    }

    public function pfPersonal_ExperienciaDocenteEliminar(Request $r)
    {
        $vPK_PerEDo = $r->input('pPK_PerEDo');
        $vPK_Personal = $r->input('pPK_Personal');

        $vFK_Usuario = 1;
        $vObservacion = '';
        $vQuery = 'sp_Personal_ExperienciaDocente_U(pPK_PerEDo, pFK_NivEducativo, pPDo_Instituto, pPDo_PeriodoInicio, pPDo_PeriodoFin, pPDo_Asignaturas, pPDo_Estatus, pFK_Usuario, pObservacion, pQuery)';

        $vPED_U = \DB::select("CALL sp_Personal_ExperienciaDocente_U(" . $vPK_PerEDo . ", 0, '', '', '', '', 0," . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");

        $vTabPED = $this->getTableData_PED($vPK_Personal);

        return response()->json(['pTabPED' => $vTabPED]);
    }

    protected function getTableData_PED($pPK_Personal)
    {
        $vPK_Personal = $pPK_Personal;
        $vPED_S = \DB::select("CALL sp_Personal_ExperienciaDocente_S(NULL, ". $vPK_Personal .")");

        $vTabConPED = '';
        $x = 1;

        foreach($vPED_S as $vP)
        {
            $vTabConPED .= '
            <tr  id="'. $vP->PK_PerEDo .'">
                <td>'. $x .'</td>
                <td>'. $vP->PDo_Instituto .'</td>
                <td>'. $vP->NEd_Nombre .'</td>
                <td>'. $vP->PDo_Asignaturas .'</td>
                <td>'. date('d/m/Y', strtotime($vP->PDo_PeriodoInicio)) . ' - ' . date('d/m/Y', strtotime($vP->PDo_PeriodoFin)) .'</td>
                <td>
                    <table>
                        <tr>
                            <th>
                                <button onclick="funPersonal_ExperienciaDocenteEditarForm('.$vP->PK_PerEDo.')" class="btn search-button" data-toggle="tooltip" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                                <button onclick="funPersonal_ExperienciaDocenteEliminar('.$vP->PK_PerEDo.')"  class="btn search-button" data-toggle="tooltip" title="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                            <button onclick="funBitacora2(\'t_personal_experienciadocente\', '.$vP->PK_PerEDo.')" data-toggle="modal" data-target=".Mod_Bitacora"  class="btn search-button" data-toggle="tooltip" title="Bitacora">
                                    <i class="fa fa-list-ol"></i>
                                </button>
                            </th>
                        </tr>
                    </table>
                </td>
            </tr>';
            $x++;
        }


        $vTabPED = '
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_4" style="width:100% !important;" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Instituto</th>
                            <th>Nivel Educativo</th>
                            <th>Asignaturas Impartidas</th>
                            <th>Periodo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>'
                    . $vTabConPED .
                    '</tbody>
                </table>
            </div>';

        return $vTabPED;
    }

    public function pfPersonal_ExperienciaDocenteEditarForm(Request $r)
    {
        $vPK_PerEDo = $r->input('pPK_PerEDo');
        $vPK_Personal = $r->input('pPK_Personal');

        $vPED = \DB::select("CALL sp_Personal_ExperienciaDocente_S(" . $vPK_PerEDo . ", ". $vPK_Personal .");");

        $vPK_PerEDo = $vPED[0]->PK_PerEDo;
        $vPDo_Instituto = $vPED[0]->PDo_Instituto;
        $vPDo_PeriodoInicio = $vPED[0]->PDo_PeriodoInicio;
        $vPDo_PeriodoFin = $vPED[0]->PDo_PeriodoFin;
        $vPDo_Asignaturas = $vPED[0]->PDo_Asignaturas;
        $vPK_NivEducativo = $vPED[0]->PK_NivEducativo;

        return response()->json(['pPK_PerEDo' => $vPK_PerEDo, 'pPDo_Instituto' => $vPDo_Instituto, 'pPDo_PeriodoInicio' => $vPDo_PeriodoInicio, 'pPDo_PeriodoFin' => $vPDo_PeriodoFin, 'pPDo_Asignaturas' => $vPDo_Asignaturas, 'pPK_NivEducativo' => $vPK_NivEducativo]);
    }





    public function fpPersonal_AsesoriaTesisGuardar(Request $r)
    {
        $vPK_PerATe = $r->input('pPK_PerATe');
        $vPK_Personal = $r->input('pPK_Personal');
        $vPAT_Instituto = $r->input('pPAT_Instituto');
        $vPAT_Nombre = $r->input('pPAT_Nombre');
        $vPAT_CarreraPosgrado = $r->input('pPAT_CarreraPosgrado');
        $vPAT_PeriodoInicio = $r->input('pPAT_PeriodoInicio');
        $vPAT_PeriodoFin = $r->input('pPAT_PeriodoFin');

        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_PerATe == -99) {
            $vQuery = 'CALL sp_Personal_AsesoriaTesis_I(pFK_Personal, pPAT_Instituto, pPAT_Nombre, pPAT_CarreraPosgrado, pPAT_PeriodoInicio, pPAT_PeriodoFin, pFK_Usuario, pObservacion, pQuery)';
            $vPAT_I = \DB::select("CALL sp_Personal_AsesoriaTesis_I(" . $vPK_Personal . ", '" . $vPAT_Instituto . "', '" . $vPAT_Nombre . "', '" . $vPAT_CarreraPosgrado . "', " . $vPAT_PeriodoInicio . "," . $vPAT_PeriodoFin . "," . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");
        }
        else {
            $vQuery = 'CALL sp_Personal_AsesoriaTesis_U(pPK_PerATe, pPAT_Instituto, pPAT_Nombre, pPAT_CarreraPosgrado, pPAT_PeriodoInicio, pPAT_PeriodoFin, pPAT_Estatus, pFK_Usuario, pObservacion, pQuery)';
            $vPAT_U = \DB::select("CALL sp_Personal_AsesoriaTesis_U(" . $vPK_PerATe . ", '" . $vPAT_Instituto . "', '" . $vPAT_Nombre . "', '" . $vPAT_CarreraPosgrado . "', " . $vPAT_PeriodoInicio . "," . $vPAT_PeriodoFin . ", 1, " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery. "')");
        }

        $vTabPAT = $this->getTableData_PAT($vPK_Personal);

        return response()->json(['pTabPAT' => $vTabPAT]);
    }

    public function fpPersonal_AsesoriaTesisConsultar(Request $r)
    {
        $vPK_Personal = $r->input('pPK_Personal');

        $vTabPAT = $this->getTableData_PAT($vPK_Personal);

        return response()->json(['pTabPAT' => $vTabPAT]);
    }

    public function pfPersonal_AsesoriaTesisEliminar(Request $r)
    {
        $vPK_PerATe = $r->input('pPK_PerATe');
        $vPK_Personal = $r->input('pPK_Personal');

        $vFK_Usuario = 1;
        $vObservacion = '';
        $vQuery = 'CALL sp_Personal_AsesoriaTesis_U(pPK_PerATe, pPAT_Instituto, pPAT_Nombre, pPAT_CarreraPosgrado, pPAT_PeriodoInicio, pPAT_PeriodoFin, pPAT_Estatus, pFK_Usuario, pObservacion, pQuery)';

        $vPAT_U = \DB::select("CALL sp_Personal_AsesoriaTesis_U(" . $vPK_PerATe . ", '', '', '', 0, 0, 0, " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery. "')");

        $vTabPAT = $this->getTableData_PAT($vPK_Personal);

        return response()->json(['pTabPAT' => $vTabPAT]);
    }

    protected function getTableData_PAT($pPK_Personal)
    {
        $vPK_Personal = $pPK_Personal;
        $vPAT_S = \DB::select("CALL sp_Personal_AsesoriaTesis_S(NULL, ". $vPK_Personal .")");

        $vTabConPAT = '';
        $x = 1;

        foreach($vPAT_S as $vP)
        {
            $vTabConPAT .= '
            <tr  id="'. $vP->PK_PerATe .'">
                <td>'. $x .'</td>
                <td>'. $vP->PAT_Instituto .'</td>
                <td>'. $vP->PAT_Nombre .'</td>
                <td>'. $vP->PAT_CarreraPosgrado .'</td>
                <td>'.  $vP->PAT_PeriodoInicio . ' - ' . $vP->PAT_PeriodoFin .'</td>
                <td>
                    <table>
                        <tr>
                            <th>
                                <button onclick="funPersonal_AsesoriaTesisEditarForm('.$vP->PK_PerATe.')" class="btn search-button" data-toggle="tooltip" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                                <button onclick="funPersonal_AsesoriaTesisEliminar('.$vP->PK_PerATe.')"  class="btn search-button" data-toggle="tooltip" title="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                            <button onclick="funBitacora2(\'t_personal_asesoriatesis\', '.$vP->PK_PerATe.')" data-toggle="modal" data-target=".Mod_Bitacora"  class="btn search-button" data-toggle="tooltip" title="Bitacora">
                                    <i class="fa fa-list-ol"></i>
                                </button>
                            </th>
                        </tr>
                    </table>
                </td>
            </tr>';
            $x++;
        }


        $vTabPAT = '
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_4" style="width:100% !important;" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Instituto</th>
                            <th>Nombre</th>
                            <th>Carrera o Posgrado</th>
                            <th>Periodo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>'
                    . $vTabConPAT .
                    '</tbody>
                </table>
            </div>';

        return $vTabPAT;
    }

    public function pfPersonal_AsesoriaTesisEditarForm(Request $r)
    {
        $vPK_PerATe = $r->input('pPK_PerATe');
        $vPK_Personal = $r->input('pPK_Personal');

        $vPAT = \DB::select("CALL sp_Personal_AsesoriaTesis_S(" . $vPK_PerATe . ", ". $vPK_Personal .");");

        $vPK_PerATe = $vPAT[0]->PK_PerATe;
        $vPAT_Instituto = $vPAT[0]->PAT_Instituto;
        $vPAT_Nombre = $vPAT[0]->PAT_Nombre;
        $vPAT_CarreraPosgrado = $vPAT[0]->PAT_CarreraPosgrado;
        $vPAT_PeriodoInicio = $vPAT[0]->PAT_PeriodoInicio;
        $vPAT_PeriodoFin = $vPAT[0]->PAT_PeriodoFin;

        return response()->json(['pPK_PerATe' => $vPK_PerATe, 'pPAT_Instituto' => $vPAT_Instituto, 'pPAT_Nombre' => $vPAT_Nombre, 'pPAT_CarreraPosgrado' => $vPAT_CarreraPosgrado, 'pPAT_PeriodoInicio' => $vPAT_PeriodoInicio, 'pPAT_PeriodoFin' => $vPAT_PeriodoFin]);
    }



    public function fpPersonal_ExperienciaInnovadoraGuardar(Request $r)
    {
        $vPK_PerEIn = $r->input('pPK_PerEIn');
        $vPK_Personal = $r->input('pPK_Personal');
        $vPEI_Instituto = $r->input('pPEI_Instituto');
        $vPEI_PeriodoInicio = $r->input('pPEI_PeriodoInicio');
        $vPEI_PeriodoFin = $r->input('pPEI_PeriodoFin');
        $vPEI_Descripcion = $r->input('pPEI_Descripcion');

        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_PerEIn == -99) {
            $vQuery = 'CALL sp_Personal_ExperienciaInnovadora_I(pFK_Personal, pPEI_Instituto, pPEI_PeriodoInicio, pPEI_PeriodoFin, pPEI_Descripcion, pFK_Usuario, pObservacion, pQuery)';
            $vPEI_I = \DB::select("CALL sp_Personal_ExperienciaInnovadora_I(". $vPK_Personal . ", '" . $vPEI_Instituto. "', " . $vPEI_PeriodoInicio. ", " . $vPEI_PeriodoFin . ", '" . $vPEI_Descripcion . "', " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");
        }
        else {
            $vQuery = 'CALL sp_Personal_ExperienciaInnovadora_U(pPK_PerEIn, pPEI_Instituto, pPEI_PeriodoInicio, pPEI_PeriodoFin, pPEI_Descripcion, pPEI_Estatus, pFK_Usuario, pObservacion, pQuery)';
            $vPEI_U = \DB::select("CALL sp_Personal_ExperienciaInnovadora_U(" . $vPK_PerEIn . ", '" . $vPEI_Instituto . "', " . $vPEI_PeriodoInicio . "," . $vPEI_PeriodoFin . ", '" . $vPEI_Descripcion . "', 1, ". $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery. "')");
        }

        $vTabPEI = $this->getTableData_PEI($vPK_Personal);

        return response()->json(['pTabPEI' => $vTabPEI]);
    }

    public function fpPersonal_ExperienciaInnovadoraConsultar(Request $r)
    {
        $vPK_Personal = $r->input('pPK_Personal');

        $vTabPEI = $this->getTableData_PEI($vPK_Personal);

        return response()->json(['pTabPEI' => $vTabPEI]);
    }

    public function pfPersonal_ExperienciaInnovadoraEliminar(Request $r)
    {
        $vPK_PerEIn = $r->input('pPK_PerEIn');
        $vPK_Personal = $r->input('pPK_Personal');

        $vFK_Usuario = 1;
        $vObservacion = '';
        $vQuery = 'CALL sp_Personal_ExperienciaInnovadora_U(pPK_PerATe, pPAT_Instituto, pPAT_Nombre, pPAT_CarreraPosgrado, pPAT_PeriodoInicio, pPAT_PeriodoFin, pPAT_Estatus, pFK_Usuario, pObservacion, pQuery)';

        $vPEI_U = \DB::select("CALL sp_Personal_ExperienciaInnovadora_U(" . $vPK_PerEIn . ", '', 0, 0, '', 0, " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");

        $vTabPEI = $this->getTableData_PEI($vPK_Personal);

        return response()->json(['pTabPEI' => $vTabPEI]);
    }

    protected function getTableData_PEI($pPK_Personal)
    {
        $vPK_Personal = $pPK_Personal;
        $vPEI_S = \DB::select("CALL sp_Personal_ExperienciaInnovadora_S(NULL, ". $vPK_Personal .")");

        $vTabConPEI = '';
        $x = 1;

        foreach($vPEI_S as $vP)
        {
            $vTabConPEI .= '
            <tr  id="'. $vP->PK_PerEIn .'">
                <td>'. $x .'</td>
                <td>'. $vP->PEI_Instituto .'</td>
                <td>'. $vP->PEI_Descripcion .'</td>
                <td>'.  $vP->PEI_PeriodoInicio . ' - ' . $vP->PEI_PeriodoFin .'</td>
                <td>
                    <table>
                        <tr>
                            <th>
                                <button onclick="funPersonal_ExperienciaInnovadoraEditarForm('.$vP->PK_PerEIn.')" class="btn search-button" data-toggle="tooltip" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                                <button onclick="funPersonal_ExperienciaInnovadoraEliminar('.$vP->PK_PerEIn.')"  class="btn search-button" data-toggle="tooltip" title="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                            <button onclick="funBitacora2(\'t_personal_experienciainnovadora\', '.$vP->PK_PerEIn.')" data-toggle="modal" data-target=".Mod_Bitacora"  class="btn search-button" data-toggle="tooltip" title="Bitacora">
                                    <i class="fa fa-list-ol"></i>
                                </button>
                            </th>
                        </tr>
                    </table>
                </td>
            </tr>';
            $x++;
        }


        $vTabPEI = '
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_4" style="width:100% !important;" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Instituto</th>
                            <th>Descripción</th>
                            <th>Periodo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>'
                    . $vTabConPEI .
                    '</tbody>
                </table>
            </div>';

        return $vTabPEI;
    }

    public function pfPersonal_ExperienciaInnovadoraEditarForm(Request $r)
    {
        $vPK_PerEIn = $r->input('pPK_PerEIn');
        $vPK_Personal = $r->input('pPK_Personal');

        $vPEI = \DB::select("CALL sp_Personal_ExperienciaInnovadora_S(" . $vPK_PerEIn . ", ". $vPK_Personal .");");

        $vPK_PerEIn = $vPEI[0]->PK_PerEIn;
        $vPEI_Instituto = $vPEI[0]->PEI_Instituto;
        $vPEI_PeriodoInicio = $vPEI[0]->PEI_PeriodoInicio;
        $vPEI_PeriodoFin = $vPEI[0]->PEI_PeriodoFin;
        $vPEI_Descripcion = $vPEI[0]->PEI_Descripcion;

        return response()->json(['pPK_PerEIn' => $vPK_PerEIn, 'pPEI_Instituto' => $vPEI_Instituto, 'pPEI_PeriodoInicio' => $vPEI_PeriodoInicio, 'pPEI_PeriodoFin' => $vPEI_PeriodoFin, 'pPEI_Descripcion' => $vPEI_Descripcion]);
    }



    public function fpPersonal_CursoTallerGuardar(Request $r)
    {
        $vPK_PerCTI = $r->input('pPK_PerCTI');
        $vPK_Personal = $r->input('pPK_Personal');
        $vPCT_Instituto = $r->input('pPCT_Instituto');
        $vPCT_Nombre = $r->input('pPCT_Nombre');
        $vPCT_DuracionHora = $r->input('pPCT_DuracionHora');
        $vPCT_PeriodoInicio = $r->input('pPCT_PeriodoInicio');
        $vPCT_PeriodoFin = $r->input('pPCT_PeriodoFin');

        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_PerCTI == -99) {
            $vQuery = 'CALL sp_Personal_CursoTaller_I(pFK_Personal, pPCT_Instituto, pPCT_Nombre, pPCT_PeriodoInicio, pPCT_PeriodoFin, pPCT_DuracionHora, pFK_Usuario, pObservacion, pQuery)';
            $vPCT_I = \DB::select("CALL sp_Personal_CursoTaller_I(" . $vPK_Personal . ", '" . $vPCT_Instituto . "', '" . $vPCT_Nombre . "', '" . $vPCT_PeriodoInicio . "', '" . $vPCT_PeriodoFin . "', " . $vPCT_DuracionHora . ", " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery. "')");
        }
        else {
            $vQuery = 'CALL sp_Personal_CursoTaller_U(pPK_PerCTI, pPCT_Instituto, pPCT_Nombre, pPCT_PeriodoInicio, pPCT_PeriodoFin, pPCT_DuracionHora, pPCT_Estatus, pFK_Usuario, pObservacion, pQuery)';
            $vPCT_U = \DB::select("CALL sp_Personal_CursoTaller_U(" . $vPK_PerCTI . ", '" . $vPCT_Instituto . "', '" . $vPCT_Nombre . "', '" . $vPCT_PeriodoInicio . "', '" . $vPCT_PeriodoFin . "', " . $vPCT_DuracionHora . ", 1, " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");
        }

        $vTabPCT = $this->getTableData_PCT($vPK_Personal);

        return response()->json(['pTabPCT' => $vTabPCT]);
    }

    public function fpPersonal_CursoTallerConsultar(Request $r)
    {
        $vPK_Personal = $r->input('pPK_Personal');

        $vTabPCT = $this->getTableData_PCT($vPK_Personal);

        return response()->json(['pTabPCT' => $vTabPCT]);
    }

    public function pfPersonal_CursoTallerEliminar(Request $r)
    {
        $vPK_PerCTI = $r->input('pPK_PerCTI');
        $vPK_Personal = $r->input('pPK_Personal');

        $vFK_Usuario = 1;
        $vObservacion = '';
        $vQuery = 'CALL sp_Personal_CursoTaller_U(pPK_PerCTI, pPCT_Instituto, pPCT_Nombre, pPCT_PeriodoInicio, pPCT_PeriodoFin, pPCT_DuracionHora, pPCT_Estatus, pFK_Usuario, pObservacion, pQuery)';

        $vPCT_U = \DB::select("CALL sp_Personal_CursoTaller_U(" . $vPK_PerCTI. ", '', '', '', '', 0, 0," . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");

        $vTabPCT = $this->getTableData_PCT($vPK_Personal);

        return response()->json(['pTabPCT' => $vTabPCT]);
    }

    protected function getTableData_PCT($pPK_Personal)
    {
        $vPK_Personal = $pPK_Personal;
        $vPCT_S = \DB::select("CALL sp_Personal_CursoTaller_S(NULL, ". $vPK_Personal .")");

        $vTabConPCT = '';
        $x = 1;

        foreach($vPCT_S as $vP)
        {
            $vTabConPCT .= '
            <tr  id="'. $vP->PK_PerCTI .'">
                <td>'. $x .'</td>
                <td>'. $vP->PCT_Instituto .'</td>
                <td>'. $vP->PCT_Nombre .'</td>
                <td>'. $vP->PCT_DuracionHora .'</td>
                <td>'. date('d/m/Y', strtotime($vP->PCT_PeriodoInicio)) . ' - ' . date('d/m/Y', strtotime($vP->PCT_PeriodoFin)) .'</td>
                <td>
                    <table>
                        <tr>
                            <th>
                                <button onclick="funPersonal_CursoTallerEditarForm('.$vP->PK_PerCTI.')" class="btn search-button" data-toggle="tooltip" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                                <button onclick="funPersonal_CursoTallerEliminar('.$vP->PK_PerCTI.')"  class="btn search-button" data-toggle="tooltip" title="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                            <button onclick="funBitacora2(\'t_personal_cursotaller\', '.$vP->PK_PerCTI.')" data-toggle="modal" data-target=".Mod_Bitacora"  class="btn search-button" data-toggle="tooltip" title="Bitacora">
                                    <i class="fa fa-list-ol"></i>
                                </button>
                            </th>
                        </tr>
                    </table>
                </td>
            </tr>';
            $x++;
        }


        $vTabPCT = '
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_4" style="width:100% !important;" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Instituto</th>
                            <th>Descripción</th>
                            <th>Duración Hora</th>
                            <th>Periodo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>'
                    . $vTabConPCT .
                    '</tbody>
                </table>
            </div>';

        return $vTabPCT;
    }

    public function pfPersonal_CursoTallerEditarForm(Request $r)
    {
        $vPK_PerCTI = $r->input('pPK_PerCTI');
        $vPK_Personal = $r->input('pPK_Personal');

        $vPCT = \DB::select("CALL sp_Personal_CursoTaller_S(" . $vPK_PerCTI . ", ". $vPK_Personal .");");

        $vPK_PerCTI = $vPCT[0]->PK_PerCTI;
        $vPCT_Instituto = $vPCT[0]->PCT_Instituto;
        $vPCT_Nombre = $vPCT[0]->PCT_Nombre;
        $vPCT_PeriodoInicio = $vPCT[0]->PCT_PeriodoInicio;
        $vPCT_PeriodoFin = $vPCT[0]->PCT_PeriodoFin;
        $vPCT_DuracionHora = $vPCT[0]->PCT_DuracionHora;

        return response()->json(['pPK_PerCTI' => $vPK_PerCTI, 'pPCT_Instituto' => $vPCT_Instituto, 'pPCT_Nombre' => $vPCT_Nombre, 'pPCT_PeriodoInicio' => $vPCT_PeriodoInicio, 'pPCT_PeriodoFin' => $vPCT_PeriodoFin, 'pPCT_DuracionHora' => $vPCT_DuracionHora]);
    }



    public function fpPersonal_ExperienciaDisenoCurricularGuardar(Request $r)
    {
        $vPK_PerEDC = $r->input('pPK_PerEDC');
        $vPK_Personal = $r->input('pPK_Personal');
        $vEDC_Instituto = $r->input('pEDC_Instituto');
        $vEDC_Nombre = $r->input('pEDC_Nombre');
        $vEDC_PeriodoInicio = $r->input('pEDC_PeriodoInicio');
        $vEDC_PeriodoFin = $r->input('pEDC_PeriodoFin');
        $vExperienciaDT = $r->input('pExperienciaDT');

        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_PerEDC == -99) {
            $vQuery = 'CALL sp_personal_ExperienciaDisenoCurricular_I(pFK_Personal, pFK_EDCTipo, pEDC_Instituto, pEDC_Nombre, pEDC_PeriodoInicio, pEDC_PeriodoFin, pFK_Usuario, pObservacion, pQuery)';
            $vPED_I = \DB::select("CALL sp_personal_ExperienciaDisenoCurricular_I(" . $vPK_Personal . ", " . $vExperienciaDT . ", '" . $vEDC_Instituto . "', '" . $vEDC_Nombre . "', '" . $vEDC_PeriodoInicio . "', '" . $vEDC_PeriodoFin . "', " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");
        }
        else {
            $vQuery = 'CALL sp_personal_ExperienciaDisenoCurricular_U(pPK_PerEDC, pFK_EDCTipo, pEDC_Instituto, pEDC_Nombre, pEDC_PeriodoInicio, pEDC_PeriodoFin, pEDC_Estatus, pFK_Usuario, pObservacion, pQuery)';
            $vPED_U = \DB::select("CALL sp_personal_ExperienciaDisenoCurricular_U(" . $vPK_PerEDC . ", " . $vExperienciaDT . ", '" . $vEDC_Instituto . "', '" . $vEDC_Nombre . "', '" . $vEDC_PeriodoInicio . "', '" . $vEDC_PeriodoFin. "', 1, " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");
        }

        $vTabPDC = $this->getTableData_PDC($vPK_Personal);

        return response()->json(['pTabPDC' => $vTabPDC]);
    }

    public function fpPersonal_ExperienciaDisenoCurricularConsultar(Request $r)
    {
        $vPK_Personal = $r->input('pPK_Personal');

        $vTabPDC = $this->getTableData_PDC($vPK_Personal);

        return response()->json(['pTabPDC' => $vTabPDC]);
    }

    public function pfPersonal_ExperienciaDisenoCurricularEliminar(Request $r)
    {
        $vPK_PerEDC = $r->input('pPK_PerEDC');
        $vPK_Personal = $r->input('pPK_Personal');

        $vFK_Usuario = 1;
        $vObservacion = '';
        $vQuery = 'CALL sp_personal_ExperienciaDisenoCurricular_U(pPK_PerEDC, pFK_EDCTipo, pEDC_Instituto, pEDC_Nombre, pEDC_PeriodoInicio, pEDC_PeriodoFin, pEDC_Estatus, pFK_Usuario, pObservacion, pQuery)';

        $vPCT_U = \DB::select("CALL sp_personal_ExperienciaDisenoCurricular_U(" . $vPK_PerEDC . ", 0, '', '', '', '', 0," . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");

        $vTabPDC = $this->getTableData_PDC($vPK_Personal);

        return response()->json(['pTabPDC' => $vTabPDC]);
    }

    protected function getTableData_PDC($pPK_Personal)
    {
        $vPK_Personal = $pPK_Personal;
        $vPED_S = \DB::select("CALL sp_Personal_ExperienciaDisenoCurricular_S(NULL, ". $vPK_Personal .")");

        $vTabConPED = '';
        $x = 1;

        foreach($vPED_S as $vP)
        {
            $vTabConPED .= '
            <tr  id="'. $vP->PK_PerEDC .'">
                <td>'. $x .'</td>
                <td>'. $vP->EDC_Instituto .'</td>
                <td>'. $vP->EDC_Nombre .'</td>
                <td>'. $vP->EDCT_Nombre .'</td>
                <td>'. date('d/m/Y', strtotime($vP->EDC_PeriodoInicio)) . ' - ' . date('d/m/Y', strtotime($vP->EDC_PeriodoFin)) .'</td>
                <td>
                    <table>
                        <tr>
                            <th>
                                <button onclick="funPersonal_ExperienciaDisenoCurricularEditarForm('.$vP->PK_PerEDC.')" class="btn search-button" data-toggle="tooltip" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                                <button onclick="funPersonal_ExperienciaDisenoCurricularEliminar('.$vP->PK_PerEDC.')"  class="btn search-button" data-toggle="tooltip" title="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                            <button onclick="funBitacora2(\'t_personal_experienciadisenocurricular\', '.$vP->PK_PerEDC.')" data-toggle="modal" data-target=".Mod_Bitacora"  class="btn search-button" data-toggle="tooltip" title="Bitacora">
                                    <i class="fa fa-list-ol"></i>
                                </button>
                            </th>
                        </tr>
                    </table>
                </td>
            </tr>';
            $x++;
        }


        $vTabPED = '
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_4" style="width:100% !important;" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Instituto</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Periodo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>'
                    . $vTabConPED .
                    '</tbody>
                </table>
            </div>';

        return $vTabPED;
    }

    public function pfPersonal_ExperienciaDisenoCurricularEditarForm(Request $r)
    {
        $vPK_PerEDC= $r->input('pPK_PerEDC');
        $vPK_Personal = $r->input('pPK_Personal');

        $vPED = \DB::select("CALL sp_personal_ExperienciaDisenoCurricular_S(" . $vPK_PerEDC . ", ". $vPK_Personal .");");

        $vPK_PerEDC = $vPED[0]->PK_PerEDC;
        $vEDC_Instituto = $vPED[0]->EDC_Instituto;
        $vEDC_Nombre = $vPED[0]->EDC_Nombre;
        $vEDC_PeriodoInicio = $vPED[0]->EDC_PeriodoInicio;
        $vEDC_PeriodoFin = $vPED[0]->EDC_PeriodoFin;
        $vPK_EDCTipo = $vPED[0]->PK_EDCTipo;

        return response()->json(['pPK_PerEDC' => $vPK_PerEDC, 'pEDC_Instituto' => $vEDC_Instituto, 'pEDC_Nombre' => $vEDC_Nombre, 'pEDC_PeriodoInicio' => $vEDC_PeriodoInicio, 'pEDC_PeriodoFin' => $vEDC_PeriodoFin, 'pPK_EDCTipo' => $vPK_EDCTipo]);
    }



    public function fpPersonal_ExperienciaInvestigacionGuardar(Request $r)
    {
        $vPK_PerEInv = $r->input('pPK_PerEInv');
        $vPK_Personal = $r->input('pPK_Personal');
        $vPEI_Instituto = $r->input('pPEInv_Instituto');
        $vPEI_Titulo = $r->input('pPEI_Titulo');
        $vFK_InveNivePart = $r->input('pNivelParticipacion');
        $vPEI_PeriodoInicio = $r->input('pPEInv_PeriodoInicio');
        $vPEI_PeriodoFin = $r->input('pPEInv_PeriodoFin');

        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_PerEInv == -99) {
            $vQuery = 'CALL sp_Personal_ExperienciaInvestigacion_I(pFK_Personal, pFK_InveNivePart, pPEI_Instituto, pPEI_Titulo, pPEI_PeriodoInicio, pPEI_PeriodoFin, pFK_Usuario, pObservacion, pQuery)';
            $vPEI_I = \DB::select("CALL sp_Personal_ExperienciaInvestigacion_I(" . $vPK_Personal . "," . $vFK_InveNivePart . ", '" . $vPEI_Instituto . "', '" . $vPEI_Titulo . "', '" . $vPEI_PeriodoInicio . "', '" . $vPEI_PeriodoFin . "', " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");
        }
        else {
            $vQuery = 'CALL sp_Personal_ExperienciaInvestigacion_U(pPK_PerEIn, pFK_InveNivePart, pPEI_Instituto, pPEI_Titulo, pPEI_PeriodoInicio, pPEI_PeriodoFin, pPEI_Estatus, pFK_Usuario, pObservacion, pQuery)';
            $vPEI_U = \DB::select("CALL sp_Personal_ExperienciaInvestigacion_U(" . $vPK_PerEInv . ", " . $vFK_InveNivePart . ", '" .$vPEI_Instituto . "', '" . $vPEI_Titulo . "', '" . $vPEI_PeriodoInicio . "', '" . $vPEI_PeriodoFin . "', 1," . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");
        }

        $vTabPEIn = $this->getTableData_PEIn($vPK_Personal);

        return response()->json(['pTabPEIn' => $vTabPEIn]);
    }

    public function fpPersonal_ExperienciaInvestigacionConsultar(Request $r)
    {
        $vPK_Personal = $r->input('pPK_Personal');

        $vTabPEIn = $this->getTableData_PEIn($vPK_Personal);

        return response()->json(['pTabPEIn' => $vTabPEIn]);
    }

    public function pfPersonal_ExperienciaInvestigacionEliminar(Request $r)
    {
        $vPK_PerEIn = $r->input('pPK_PerEInv');
        $vPK_Personal = $r->input('pPK_Personal');

        $vFK_Usuario = 1;
        $vObservacion = '';
        $vQuery = 'CALL sp_Personal_ExperienciaInvestigacion_U(pPK_PerEIn, pFK_InveNivePart, pPEI_Instituto, pPEI_Titulo, pPEI_PeriodoInicio, pPEI_PeriodoFin, pPEI_Estatus, pFK_Usuario, pObservacion, pQuery)';

        $vPEI_U = \DB::select("CALL sp_Personal_ExperienciaInvestigacion_U(" . $vPK_PerEIn . ", 0, '', '', '', '', 0," . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");

        $vTabPEIn = $this->getTableData_PEIn($vPK_Personal);

        return response()->json(['pTabPEIn' => $vTabPEIn]);
    }

    protected function getTableData_PEIn($pPK_Personal)
    {
        $vPK_Personal = $pPK_Personal;
        $vPEI_S = \DB::select("CALL sp_Personal_ExperienciaInvestigacion_S(NULL, ". $vPK_Personal .")");

        $vTabConPEI = '';
        $x = 1;

        foreach($vPEI_S as $vP)
        {
            $vTabConPEI .= '
            <tr  id="'. $vP->PK_PerEIn .'">
                <td>'. $x .'</td>
                <td>'. $vP->PEI_Instituto .'</td>
                <td>'. $vP->PEI_Titulo .'</td>
                <td>'. $vP->INP_Nombre .'</td>
                <td>'. date('d/m/Y', strtotime($vP->PEI_PeriodoInicio)) . ' - ' . date('d/m/Y', strtotime($vP->PEI_PeriodoFin)) .'</td>
                <td>
                    <table>
                        <tr>
                            <th>
                                <button onclick="funPersonal_ExperienciaInvestigacionEditarForm('.$vP->PK_PerEIn.')" class="btn search-button" data-toggle="tooltip" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                                <button onclick="funPersonal_ExperienciaInvestigacionEliminar('.$vP->PK_PerEIn.')"  class="btn search-button" data-toggle="tooltip" title="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                            <button onclick="funBitacora2(\'t_personal_experienciainvestigacion\', '.$vP->PK_PerEIn.')" data-toggle="modal" data-target=".Mod_Bitacora"  class="btn search-button" data-toggle="tooltip" title="Bitacora">
                                    <i class="fa fa-list-ol"></i>
                                </button>
                            </th>
                        </tr>
                    </table>
                </td>
            </tr>';
            $x++;
        }


        $vTabPEI = '
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_4" style="width:100% !important;" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Instituto</th>
                            <th>Título</th>
                            <th>Nivel Participación</th>
                            <th>Periodo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>'
                    . $vTabConPEI .
                    '</tbody>
                </table>
            </div>';

        return $vTabPEI;
    }

    public function pfPersonal_ExperienciaInvestigacionEditarForm(Request $r)
    {
        $vPK_PerEIn= $r->input('pPK_PerEInv');
        $vPK_Personal = $r->input('pPK_Personal');

        $vPEI = \DB::select("CALL sp_Personal_ExperienciaInvestigacion_S(" . $vPK_PerEIn . ", ". $vPK_Personal .");");

        $vPK_PerEIn = $vPEI[0]->PK_PerEIn;
        $vPEI_Instituto = $vPEI[0]->PEI_Instituto;
        $vPEI_Titulo = $vPEI[0]->PEI_Titulo;
        $vPEI_PeriodoInicio = $vPEI[0]->PEI_PeriodoInicio;
        $vPEI_PeriodoFin = $vPEI[0]->PEI_PeriodoFin;
        $vPK_InveNivePart = $vPEI[0]->PK_InveNivePart;

        return response()->json(['pPK_PerEIn' => $vPK_PerEIn, 'pPEI_Instituto' => $vPEI_Instituto, 'pPEI_Titulo' => $vPEI_Titulo, 'pPEI_PeriodoInicio' => $vPEI_PeriodoInicio, 'pPEI_PeriodoFin' => $vPEI_PeriodoFin, 'pPK_InveNivePart' => $vPK_InveNivePart]);
    }



    public function fpPersonal_ExperienciaVinculacionGuardar(Request $r)
    {
        $vPK_PerEV = $r->input('pPK_PerEV');
        $vPK_Personal = $r->input('pPK_Personal');
        $vPEV_Instituto = $r->input('pPEV_Instituto');
        $vPEV_Titulo = $r->input('pPEV_Titulo');
        $vFK_VincNivePart = $r->input('pVincNivePart');
        $vPEV_PeriodoInicio = $r->input('pPEV_PeriodoInicio');
        $vPEV_PeriodoFin = $r->input('pPEV_PeriodoFin');

        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_PerEV == -99) {
            $vQuery = 'CALL sp_Personal_ExperienciaVinculacion_I(pFK_Personal, pFK_VincNivePart, pPEV_Instituto, pPEV_Titulo, pPEV_PeriodoInicio, pPEV_PeriodoFin, pFK_Usuario, pObservacion, pQuery)';
            $vPEV_I = \DB::select("CALL sp_Personal_ExperienciaVinculacion_I(" . $vPK_Personal . ", " . $vFK_VincNivePart . ", '" . $vPEV_Instituto . "', '" . $vPEV_Titulo . "', '" . $vPEV_PeriodoInicio . "', '" . $vPEV_PeriodoFin . "', " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");
        }
        else {
            $vQuery = 'CALL sp_Personal_ExperienciaVinculacion_U(pPK_PerEV, pFK_VincNivePart, pPEV_Instituto, pPEV_Titulo, pPEV_PeriodoInicio, pPEV_PeriodoFin, pPEV_Estatus, pFK_Usuario, pObservacion, pQuery)';
            $vPEV_U = \DB::select("CALL sp_Personal_ExperienciaVinculacion_U(" . $vPK_PerEV . ", " . $vFK_VincNivePart . ", '" . $vPEV_Instituto . "', '" . $vPEV_Titulo . "', '" . $vPEV_PeriodoInicio . "', '" . $vPEV_PeriodoFin . "', 1, " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");
        }

        $vTabPEV = $this->getTableData_PEV($vPK_Personal);

        return response()->json(['pTabPEV' => $vTabPEV]);
    }

    public function fpPersonal_ExperienciaVinculacionConsultar(Request $r)
    {
        $vPK_Personal = $r->input('pPK_Personal');

        $vTabPEV = $this->getTableData_PEV($vPK_Personal);

        return response()->json(['pTabPEV' => $vTabPEV]);
    }

    public function pfPersonal_ExperienciaVinculacionEliminar(Request $r)
    {
        $vPK_PerEV = $r->input('pPK_PerEV');
        $vPK_Personal = $r->input('pPK_Personal');

        $vFK_Usuario = 1;
        $vObservacion = '';
        $vQuery = 'CALL sp_Personal_ExperienciaVinculacion_U(pPK_PerEV, pFK_VincNivePart, pPEV_Instituto, pPEV_Titulo, pPEV_PeriodoInicio, pPEV_PeriodoFin, pPEV_Estatus, pFK_Usuario, pObservacion, pQuery)';

        $vPEV_U = \DB::select("CALL sp_Personal_ExperienciaVinculacion_U(" . $vPK_PerEV . ", 0, '', '', '', '', 0, " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");

        $vTabPEV = $this->getTableData_PEV($vPK_Personal);

        return response()->json(['pTabPEV' => $vTabPEV]);
    }

    protected function getTableData_PEV($pPK_Personal)
    {
        $vPK_Personal = $pPK_Personal;
        $vPEV_S = \DB::select("CALL sp_Personal_ExperienciaVinculacion_S(NULL, ". $vPK_Personal .")");

        $vTabConPEV = '';
        $x = 1;

        foreach($vPEV_S as $vP)
        {
            $vTabConPEV .= '
            <tr  id="'. $vP->PK_PerEV .'">
                <td>'. $x .'</td>
                <td>'. $vP->PEV_Instituto .'</td>
                <td>'. $vP->PEV_Titulo .'</td>
                <td>'. $vP->VNP_Nombre .'</td>
                <td>'. date('d/m/Y', strtotime($vP->PEV_PeriodoInicio)) . ' - ' . date('d/m/Y', strtotime($vP->PEV_PeriodoFin)) .'</td>
                <td>
                    <table>
                        <tr>
                            <th>
                                <button onclick="funPersonal_ExperienciaVinculacionEditarForm('.$vP->PK_PerEV.')" class="btn search-button" data-toggle="tooltip" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                                <button onclick="funPersonal_ExperienciaVinculacionEliminar('.$vP->PK_PerEV.')"  class="btn search-button" data-toggle="tooltip" title="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                            <button onclick="funBitacora2(\'t_personal_experienciavinculacion\', '.$vP->PK_PerEV.')" data-toggle="modal" data-target=".Mod_Bitacora"  class="btn search-button" data-toggle="tooltip" title="Bitacora">
                                    <i class="fa fa-list-ol"></i>
                                </button>
                            </th>
                        </tr>
                    </table>
                </td>
            </tr>';
            $x++;
        }


        $vTabPEV = '
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_4" style="width:100% !important;" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Instituto</th>
                            <th>Título Proyecto</th>
                            <th>Nivel Participación</th>
                            <th>Periodo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>'
                    . $vTabConPEV .
                    '</tbody>
                </table>
            </div>';

        return $vTabPEV;
    }

    public function pfPersonal_ExperienciaVinculacionEditarForm(Request $r)
    {
        $vPK_PerEV = $r->input('pPK_PerEV');
        $vPK_Personal = $r->input('pPK_Personal');

        $vPEV = \DB::select("CALL sp_Personal_ExperienciaVinculacion_S(" . $vPK_PerEV . ", ". $vPK_Personal .");");

        $vPK_PerEV = $vPEV[0]->PK_PerEV;
        $vPEV_Instituto = $vPEV[0]->PEV_Instituto;
        $vPEV_Titulo = $vPEV[0]->PEV_Titulo;
        $vPEV_PeriodoInicio = $vPEV[0]->PEV_PeriodoInicio;
        $vPEV_PeriodoFin = $vPEV[0]->PEV_PeriodoFin;
        $vPK_VincNivePart = $vPEV[0]->PK_VincNivePart;

        return response()->json(['pPK_PerEV' => $vPK_PerEV, 'pPEV_Instituto' => $vPEV_Instituto, 'pPEV_Titulo' => $vPEV_Titulo, 'pPEV_PeriodoInicio' => $vPEV_PeriodoInicio, 'pPEV_PeriodoFin' => $vPEV_PeriodoFin, 'pPK_VincNivePart' => $vPK_VincNivePart]);
    }



    public function fpPersonal_PublicacionesGuardar(Request $r)
    {
        $vPK_PerPub = $r->input('pPK_PerPub');
        $vPK_Personal = $r->input('pPK_Personal');
        $vPPu_Titulo = $r->input('pPPu_Titulo');
        $vPPu_Fecha = $r->input('pPPu_Fecha');
        $vPPu_ReferenciaBibliografica = $r->input('pPPu_ReferenciaBibliografica');

        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_PerPub == -99) {
            $vQuery = 'CALL sp_Personal_Publicaciones_I(pFK_Personal, pPPu_Titulo, pPPu_Fecha, pPPu_ReferenciaBibliografica, pFK_Usuario, pObservacion, pQuery)';
            $vPPU_I = \DB::select("CALL sp_Personal_Publicaciones_I(". $vPK_Personal. ", '" . $vPPu_Titulo . "', '" . $vPPu_Fecha . "', '" . $vPPu_ReferenciaBibliografica . "', " . $vFK_Usuario . ", ' ". $vObservacion . "', '" . $vQuery . "')");
        }
        else {
            $vQuery = 'CALL sp_Personal_Publicaciones_U(pPK_PerPub, pPPu_Titulo, pPPu_Fecha, pPPu_ReferenciaBibliografica, pPPu_Estatus, pFK_Usuario, pObservacion, pQuery)';
            $vPPU_U = \DB::select("CALL sp_Personal_Publicaciones_U(" . $vPK_PerPub . ", '" . $vPPu_Titulo . "', '" . $vPPu_Fecha . "', '". $vPPu_ReferenciaBibliografica . "', 1, " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");
        }

        $vTabPPU = $this->getTableData_PPU($vPK_Personal);

        return response()->json(['pTabPPU' => $vTabPPU]);
    }

    public function fpPersonal_PublicacionesConsultar(Request $r)
    {
        $vPK_Personal = $r->input('pPK_Personal');

        $vTabPPU = $this->getTableData_PPU($vPK_Personal);

        return response()->json(['pTabPPU' => $vTabPPU]);
    }

    public function pfPersonal_PublicacionesEliminar(Request $r)
    {
        $vPK_PerPub = $r->input('pPK_PerPub');
        $vPK_Personal = $r->input('pPK_Personal');

        $vFK_Usuario = 1;
        $vObservacion = '';
        $vQuery = 'CALL sp_Personal_Publicaciones_U(pPK_PerPub, pPPu_Titulo, pPPu_Fecha, pPPu_ReferenciaBibliografica, pPPu_Estatus, pFK_Usuario, pObservacion, pQuery)';

        $vPPU_U = \DB::select("CALL sp_Personal_Publicaciones_U(" . $vPK_PerPub . ", '', '', '', 0, " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");

        $vTabPPU = $this->getTableData_PPU($vPK_Personal);

        return response()->json(['pTabPPU' => $vTabPPU]);
    }

    protected function getTableData_PPU($pPK_Personal)
    {
        $vPK_Personal = $pPK_Personal;
        $vPPU_S = \DB::select("CALL sp_Personal_Publicaciones_S(NULL, ". $vPK_Personal .")");

        $vTabConPPU = '';
        $x = 1;

        foreach($vPPU_S as $vP)
        {
            $vTabConPPU .= '
            <tr  id="'. $vP->PK_PerPub .'">
                <td>'. $x .'</td>
                <td>'. $vP->PPu_Titulo .'</td>
                <td>'. date('d/m/Y', strtotime($vP->PPu_Fecha)) .'</td>
                <td>'. $vP->PPu_ReferenciaBibliografica .'</td>
                <td>
                    <table>
                        <tr>
                            <th>
                                <button onclick="funPersonal_PublicacionesEditarForm('.$vP->PK_PerPub.')" class="btn search-button" data-toggle="tooltip" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                                <button onclick="funPersonal_PublicacionesEliminar('.$vP->PK_PerPub.')"  class="btn search-button" data-toggle="tooltip" title="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                            <button onclick="funBitacora2(\'t_personal_publicaciones\', '.$vP->PK_PerPub.')" data-toggle="modal" data-target=".Mod_Bitacora"  class="btn search-button" data-toggle="tooltip" title="Bitacora">
                                    <i class="fa fa-list-ol"></i>
                                </button>
                            </th>
                        </tr>
                    </table>
                </td>
            </tr>';
            $x++;
        }


        $vTabPPU = '
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_4" style="width:100% !important;" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Título Publicación </th>
                            <th>Fecha</th>
                            <th>Referencia Bibliográfica </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>'
                    . $vTabConPPU .
                    '</tbody>
                </table>
            </div>';

        return $vTabPPU;
    }

    public function pfPersonal_PublicacionesEditarForm(Request $r)
    {
        $vPK_PerPub = $r->input('pPK_PerPub');
        $vPK_Personal = $r->input('pPK_Personal');

        $vPPU = \DB::select("CALL sp_Personal_Publicaciones_S(" . $vPK_PerPub . ", ". $vPK_Personal .");");

        $vPK_PerPub = $vPPU[0]->PK_PerPub;
        $vPPu_Titulo = $vPPU[0]->PPu_Titulo;
        $vPPu_Fecha = $vPPU[0]->PPu_Fecha;
        $vPPu_ReferenciaBibliografica = $vPPU[0]->PPu_ReferenciaBibliografica;

        return response()->json(['pPK_PerPub' => $vPK_PerPub, 'pPPu_Titulo' => $vPPu_Titulo, 'pPPu_Fecha' => $vPPu_Fecha, 'pPPu_ReferenciaBibliografica' => $vPPu_ReferenciaBibliografica]);
    }



    public function fpPersonal_ParticipacionPonenteGuardar(Request $r)
    {
        $vPK_PerPPo = $r->input('pPK_PerPPo');
        $vPK_Personal = $r->input('pPK_Personal');
        $vPPP_Evento = $r->input('pPPP_Evento');
        $vPPP_Tema = $r->input('pPPP_Tema');
        $vPPP_PeriodoInicio = $r->input('pPPP_PeriodoInicio');
        $vPPP_PeriodoFin = $r->input('pPPP_PeriodoFin');

        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_PerPPo == -99) {
            $vQuery = 'CALL sp_Personal_ParticipacionPonente_I(pFK_Personal, pPPP_Evento, pPPP_Tema, pPPP_PeriodoInicio, pPPP_PeriodoFin, pFK_Usuario, pObservacion, pQuery)';
            $vPPP_I = \DB::select("CALL sp_Personal_ParticipacionPonente_I(" . $vPK_Personal . ", '" . $vPPP_Evento . "', '" . $vPPP_Tema . "', '" . $vPPP_PeriodoInicio . "', '" . $vPPP_PeriodoFin . "', " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");
        }
        else {
            $vQuery = 'CALL sp_Personal_ParticipacionPonente_U(pPK_PerPPo, pPPP_Evento, pPPP_Tema, pPPP_PeriodoInicio, pPPP_PeriodoFin, pPPP_Estatus, pFK_Usuario, pObservacion, pQuery)';
            $vPPP_U = \DB::select("CALL sp_Personal_ParticipacionPonente_U(" . $vPK_PerPPo . ", '" . $vPPP_Evento . "', '" . $vPPP_Tema . "', '" . $vPPP_PeriodoInicio . "', '" . $vPPP_PeriodoFin . "', 1, " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");
        }

        $vTabPPP = $this->getTableData_PPP($vPK_Personal);

        return response()->json(['pTabPPP' => $vTabPPP]);
    }

    public function fpPersonal_ParticipacionPonenteConsultar(Request $r)
    {
        $vPK_Personal = $r->input('pPK_Personal');

        $vTabPPP = $this->getTableData_PPP($vPK_Personal);

        return response()->json(['pTabPPP' => $vTabPPP]);
    }

    public function pfPersonal_ParticipacionPonenteEliminar(Request $r)
    {
        $vPK_PerPPo = $r->input('pPK_PerPPo');
        $vPK_Personal = $r->input('pPK_Personal');

        $vFK_Usuario = 1;
        $vObservacion = '';
        $vQuery = 'CALL sp_Personal_ParticipacionPonente_U(pPK_PerPPo, pPPP_Evento, pPPP_Tema, pPPP_PeriodoInicio, pPPP_PeriodoFin, pPPP_Estatus, pFK_Usuario, pObservacion, pQuery)';
        $vPPP_U = \DB::select("CALL sp_Personal_ParticipacionPonente_U(" . $vPK_PerPPo . ", '', '', '', '', 0, " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");

        $vTabPPP = $this->getTableData_PPP($vPK_Personal);

        return response()->json(['pTabPPP' => $vTabPPP]);
    }

    protected function getTableData_PPP($pPK_Personal)
    {
        $vPK_Personal = $pPK_Personal;
        $vPPP_S = \DB::select("CALL sp_Personal_ParticipacionPonente_S(NULL, ". $vPK_Personal .")");

        $vTabConPPP = '';
        $x = 1;

        foreach($vPPP_S as $vP)
        {
            $vTabConPPP .= '
            <tr  id="'. $vP->PK_PerPPo .'">
                <td>'. $x .'</td>
                <td>'. $vP->PPP_Evento .'</td>
                <td>'. $vP->PPP_Tema .'</td>
                <td>'. date('d/m/Y', strtotime($vP->PPP_PeriodoInicio)) . ' - '. date('d/m/Y', strtotime($vP->PPP_PeriodoFin))  .'</td>
                <td>
                    <table>
                        <tr>
                            <th>
                                <button onclick="funPersonal_ParticipacionPonenteEditarForm('.$vP->PK_PerPPo.')" class="btn search-button" data-toggle="tooltip" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                                <button onclick="funPersonal_ParticipacionPonenteEliminar('.$vP->PK_PerPPo.')"  class="btn search-button" data-toggle="tooltip" title="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                            <button onclick="funBitacora2(\'t_personal_participacionponente\', '.$vP->PK_PerPPo.')" data-toggle="modal" data-target=".Mod_Bitacora"  class="btn search-button" data-toggle="tooltip" title="Bitacora">
                                    <i class="fa fa-list-ol"></i>
                                </button>
                            </th>
                        </tr>
                    </table>
                </td>
            </tr>';
            $x++;
        }


        $vTabPPP = '
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_4" style="width:100% !important;" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Evento </th>
                            <th>Tema</th>
                            <th>Periodo </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>'
                    . $vTabConPPP .
                    '</tbody>
                </table>
            </div>';

        return $vTabPPP;
    }

    public function pfPersonal_ParticipacionPonenteEditarForm(Request $r)
    {
        $vPK_PerPPo = $r->input('pPK_PerPPo');
        $vPK_Personal = $r->input('pPK_Personal');

        $vPPP = \DB::select("CALL sp_Personal_ParticipacionPonente_S(" . $vPK_PerPPo . ", ". $vPK_Personal .");");

        $vPK_PerPPo = $vPPP[0]->PK_PerPPo;
        $vPPP_Evento = $vPPP[0]->PPP_Evento;
        $vPPP_Tema = $vPPP[0]->PPP_Tema;
        $vPPP_PeriodoInicio = $vPPP[0]->PPP_PeriodoInicio;
        $vPPP_PeriodoFin = $vPPP[0]->PPP_PeriodoFin;

        return response()->json(['pPK_PerPPo' => $vPK_PerPPo, 'pPPP_Evento' => $vPPP_Evento, 'pPPP_Tema' => $vPPP_Tema, 'pPPP_PeriodoInicio' => $vPPP_PeriodoInicio, 'pPPP_PeriodoFin' => $vPPP_PeriodoFin]);
    }



    public function fpPersonal_DiscapacidadGuardar(Request $r)
    {
        $vPK_PerDis = $r->input('pPK_PerDis');
        $vPK_Personal = $r->input('pPK_Personal');
        $vFK_Discapacidad = $r->input('pDiscapacidad');

        $vFK_Usuario = 1;
        $vObservacion = '';

        if ($vPK_PerDis == -99) {
            $vQuery = 'CALL sp_Personal_Discapacidad_I(pFK_Personal, pFK_Discapacidad, pFK_Usuario, pObservacion, pQuery)';
            $vPDI_I = \DB::select("CALL sp_Personal_Discapacidad_I(" . $vPK_Personal . ", " . $vFK_Discapacidad . ", " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");
        }
        else {
            $vQuery = 'CALL sp_Personal_Discapacidad_U(pPK_PerDis, pFK_Discapacidad, pPDi_Estatus, pFK_Usuario, pObservacion, pQuery)';
            $vPDI_U = \DB::select("CALL sp_Personal_Discapacidad_U(" . $vPK_PerDis . ", " . $vFK_Discapacidad . ", 1, " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");
        }

        $vTabPDI = $this->getTableData_PDI($vPK_Personal);

        return response()->json(['pTabPDI' => $vTabPDI]);
    }

    public function fpPersonal_DiscapacidadConsultar(Request $r)
    {
        $vPK_Personal = $r->input('pPK_Personal');

        $vTabPDI = $this->getTableData_PDI($vPK_Personal);

        return response()->json(['pTabPDI' => $vTabPDI]);
    }

    public function pfPersonal_DiscapacidadEliminar(Request $r)
    {
        $vPK_PerDis = $r->input('pPK_PerDis');
        $vPK_Personal = $r->input('pPK_Personal');

        $vFK_Usuario = 1;
        $vObservacion = '';
        $vQuery = 'CALL sp_Personal_Discapacidad_U(pPK_PerDis, pFK_Discapacidad, pPDi_Estatus, pFK_Usuario, pObservacion, pQuery)';
        $vPDI_U = \DB::select("CALL sp_Personal_Discapacidad_U(" . $vPK_PerDis . ", 0, 0, " . $vFK_Usuario . ", '" . $vObservacion . "', '" . $vQuery . "')");

        $vTabPDI = $this->getTableData_PDI($vPK_Personal);

        return response()->json(['pTabPDI' => $vTabPDI]);
    }

    protected function getTableData_PDI($pPK_Personal)
    {
        $vPK_Personal = $pPK_Personal;
        $vPDI_S = \DB::select("CALL sp_Personal_Discapacidad_S(NULL, ". $vPK_Personal .")");

        $vTabConPDI = '';
        $x = 1;

        foreach($vPDI_S as $vP)
        {
            $vTabConPDI .= '
            <tr  id="'. $vP->PK_PerDis .'">
                <td>'. $x .'</td>
                <td>'. $vP->Dis_Nombre .'</td>
                <td>
                    <table>
                        <tr>
                            <th>
                                <button onclick="funPersonal_DiscapacidadEditarForm('.$vP->PK_PerDis.')" class="btn search-button" data-toggle="tooltip" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                                <button onclick="funPersonal_DiscapacidadEliminar('.$vP->PK_PerDis.')"  class="btn search-button" data-toggle="tooltip" title="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </th>
                            <th>&nbsp;</th>
                            <th>
                            <button onclick="funBitacora2(\'t_personal_discapacidad\', '.$vP->PK_PerDis.')" data-toggle="modal" data-target=".Mod_Bitacora"  class="btn search-button" data-toggle="tooltip" title="Bitacora">
                                    <i class="fa fa-list-ol"></i>
                                </button>
                            </th>
                        </tr>
                    </table>
                </td>
            </tr>';
            $x++;
        }


        $vTabPDI = '
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_4" style="width:100% !important;" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Discapacidad </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>'
                    . $vTabConPDI .
                    '</tbody>
                </table>
            </div>';

        return $vTabPDI;
    }

    public function pfPersonal_DiscapacidadEditarForm(Request $r)
    {
        $vPK_PerDis = $r->input('pPK_PerDis');
        $vPK_Personal = $r->input('pPK_Personal');

        $vPDI = \DB::select("CALL sp_Personal_Discapacidad_S(" . $vPK_PerDis . ", ". $vPK_Personal .");");

        $vK_PerDis = $vPDI[0]->PK_PerDis;
        $vPK_Discapacidad = $vPDI[0]->PK_Discapacidad;

        return response()->json(['pPK_PerDis' => $vPK_PerDis, 'pPK_Discapacidad' => $vPK_Discapacidad]);
    }


}
