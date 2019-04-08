<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Controller_Indicadores extends Controller
{
    //
    public function pfRecursosHumanos()
    {
        $vNomModulo = 'Indicadores Recursos Humanos';
        $vEstadoCivil = \DB::select("CALL sp_EstadoCivil_S(NULL);");
        return view('Indicadores.uiRecursosHumanos', compact('vEstadoCivil', 'vNomModulo'));
    }

    public function pfEsta_RH_NivelEstudio()
    {
        $vNomModulo = 'Estadística: Recursos Humanos || Nivel Estudio';
        $vRH_NE_Docente = \DB::select("CALL sp_Esta_RH_NivelEstudio_S(1);");
        $vRH_NE_Administrativo = \DB::select("CALL sp_Esta_RH_NivelEstudio_S(0);");
        return view('Estadisticas.uiRH_NivelEstudio', compact('vRH_NE_Docente', 'vRH_NE_Administrativo', 'vNomModulo'));
    }

    public function pfEsta_RH_AreaFormacion()
    {
        $vNomModulo = 'Estadística: Recursos Humanos || Área de Formación';
        $vRH_AF_Docente = \DB::select("CALL sp_Esta_RH_AreaFormacion_S(1);");
        $vRH_AF_Administrativo = \DB::select("CALL sp_Esta_RH_AreaFormacion_S(0);");
        return view('Estadisticas.uiRH_AreaFormacion', compact('vRH_AF_Docente', 'vRH_AF_Administrativo', 'vNomModulo'));
    }

    public function pfEsta_RH_Edad()
    {
        $vNomModulo = 'Estadística: Recursos Humanos || Edad';
        $vRH_Ed_Docente = \DB::select("CALL sp_Esta_RH_Edad_S(1);");
        $vRH_Ed_Administrativo = \DB::select("CALL sp_Esta_RH_Edad_S(0);");
        return view('Estadisticas.uiRH_Edad', compact('vRH_Ed_Docente', 'vRH_Ed_Administrativo', 'vNomModulo'));
    }

    public function pfEsta_RH_Antiguedad()
    {
        $vNomModulo = 'Estadística: Recursos Humanos || Antigüedad';
        $vRH_An_Docente = \DB::select("CALL sp_Esta_RH_Antiguedad_S(1);");
        $vRH_An_Administrativo = \DB::select("CALL sp_Esta_RH_Antiguedad_S(0);");
        return view('Estadisticas.uiRH_Antiguedad', compact('vRH_An_Docente', 'vRH_An_Administrativo', 'vNomModulo'));
    }

    public function pfEsta_RH_TiempoDedicacion()
    {
        $vNomModulo = 'Estadística: Recursos Humanos || Tiempo Dedicación';
        $vRH_Tiempo = \DB::select("CALL sp_Esta_RH_Tiempo_S();");
        return view('Estadisticas.uiRH_TiempoDedicacion', compact('vRH_Tiempo', 'vNomModulo'));
    }


    public function pfEsta_RH_General()
    {
        $vNomModulo = 'Estadística: Recursos Humanos || General';
        $vRH_PersSede = \DB::select("CALL sp_Esta_RH_PersonalSede_S();");
        $vRH_PersSuJe = \DB::select("CALL sp_Esta_RH_PersonalSuperiorJerarquico_S();");
        $vRH_PersDepa = \DB::select("CALL sp_Esta_RH_PeronalDepartamento_S();");
        $vRH_PersCate = \DB::select("CALL sp_Esta_RH_PersonalCategoria_S();");
        return view('Estadisticas.uiRH_General', compact('vRH_PersSede','vRH_PersSuJe','vRH_PersDepa','vRH_PersCate', 'vNomModulo'));
    }

    public function pfEsta_RH_INEGI()
    {
        $vNomModulo = 'Estadística: Recursos Humanos || INEGI';
        return view('Estadisticas.uiRH_INEGI', compact('vNomModulo'));
    }

    public function pfEsta_RH_INEGI_Generar(Request $r)
    {
        $vFecInicio = $r->input('pFecInicio');
        $vFecFin = $r->input('pFecFin');

        $vTablaContEdad = $this->getTableDataEdad($vFecInicio, $vFecFin);
        $vTablaContNivelEstudio = $this->getTableDataNivelEstudio($vFecInicio, $vFecFin);

        return response()->json(['pTablaContEdad' => $vTablaContEdad, 'pTablaContNivelEstudio' => $vTablaContNivelEstudio]);
    }

    protected function getTableDataNivelEstudio($pFecInicio, $pFecFin)
    {
        $vFecInicio = $pFecInicio;
        $vFecFin = $pFecFin;
        if($vFecInicio=="")
        {
            $vRH_Edad = \DB::select("CALL sp_Esta_RH_NivelEstudio_P_S(NULL, NULL)");
        }else {
           $vRH_Edad = \DB::select("CALL sp_Esta_RH_NivelEstudio_P_S('".$vFecInicio."', '". $vFecFin ."')");
        }

        $vTabCon = '';
        $x = 1;
        $vTCantM = 0;
        $vTCantF = 0;

        foreach($vRH_Edad as $vP)
        {
            $vTabCon .= '<tr  id="'. $vP->PK_NivEstudio .'">';
            $vTabCon .= '<td class="text-bold">'. $x .'</td> ';
            $vTabCon .= '<td class="text-bold">'. $vP->NivelEstudio .'</td>';
            $vTabCon .= '<td>'. $vP->CantM .'</td> ';
            $vTabCon .= '<td>'. $vP->CantF .'</td> ';

            $vCantTotal = $vP->CantM + $vP->CantF;

            $vTabCon .= '<td>'. $vCantTotal .'</td>';
            $vTabCon .= '</tr>';

            $x++;

            $vTCantM = $vTCantM + $vP->CantM;
            $vTCantF = $vTCantF + $vP->CantF;
        }

        $vTCant = $vTCantM  + $vTCantF;


        $vTabCon .= '<tr class="text-bold">
            <td></td>
            <td>
                <span class="block">Total</span> 
            </td>
            <td>
                <span class="text-bold">' . $vTCantM . '</span>
            </td>
            <td>
                <span class="text-bold">'. $vTCantF . '</span>
            </td>
            <td>
                <span class="text-bold">' . $vTCant .'</span>
            </td>
        </tr>';

        $vTab = '
                <div class="panel panel-white no-radius">
                    <div class="panel-heading border-light">
                        <h4 class="panel-title">Personal por Nivel de Estudio</h4>
                        <div class="panel-tools">
                            <a data-original-title="Minimizar" data-toggle="tooltip" data-placement="top" data-trigger="hover" class="btn btn-transparent btn-sm panel-collapse" href="#"><i class="ti-minus collapse-off"></i><i class="ti-plus collapse-on"></i></a>
                            <a data-original-title="Cerrar" data-toggle="tooltip" data-placement="top" data-trigger="hover" class="btn btn-transparent btn-sm panel-close" href="#"><i class="ti-close"></i></a>
                        </div>
                    </div>
                    <div class="panel-wrapper">
                        <div class="panel-body no-padding">
                            <div class="table-responsive">
                                <table class="table table-stylish" id="sample-table-1">
                                    <thead>
                                        <tr>
                                            <th class="center no-border">#</th>
                                            <th class="no-border">Grupo de Edad</th>
                                            <th class="no-border">
                                                Hombre 
                                                <a href="javascript:void(0)" data-toggle="popover" data-trigger="focus" data-placement="top" data-content=".">
                                                    <i class="fa fa-question-circle text-dark-transparent margin-left-5"></i>
                                                </a>
                                            </th>
                                            <th class="no-border">
                                                Mujer 
                                                <a href="javascript:void(0)" data-toggle="popover" data-trigger="focus" data-placement="top" data-content=".">
                                                    <i class="fa fa-question-circle text-dark-transparent margin-left-5"></i>
                                                </a>
                                            </th>
                                            <th class="no-border">
                                                Total 
                                                <a href="javascript:void(0)" data-toggle="popover" data-trigger="focus" data-placement="top" data-content=".">
                                                    <i class="fa fa-question-circle text-dark-transparent margin-left-5"></i>
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                <tbody>';

        $vTab .= $vTabCon;

        if ($vTCantM == 0 AND $vTCantF == 0)
        {
            $vPorM = 0;
            $vPorF = 0;
        }else {
            $vPorM = ($vTCantM * 100) / ($vTCantM + $vTCantF);
            $vPorF = ($vTCantF * 100) / ($vTCantM + $vTCantF);
        }

        $vTab .='    </tbody>
                    </table>
                </div>
                <div class="col-xs-6 no-padding border-right">
                    <div class="padding-10 text-center">
                        <i class="fa fa-male text-azure large-letters"></i>
                        <span class="text-extra-large block margin-top-15">' . number_format($vPorM, 2) .'%</span>
                    </div>
                </div>
                <div class="col-xs-6 no-padding">
                    <div class="padding-10 text-center">
                        <i class="fa fa-female text-pink large-letters"></i>
                        <span class="text-extra-large block margin-top-15">'. number_format($vPorF, 2) .'%</span>
                    </div>
                </div>
        
                </div></div></div>';

        return $vTab;
    }


    protected function getTableDataEdad($pFecInicio, $pFecFin)
    {
        $vFecInicio = $pFecInicio;
        $vFecFin = $pFecFin;
        if($vFecInicio=="")
        {
            $vRH_Edad = \DB::select("CALL sp_Esta_RH_Edad_P_S(NULL, NULL)");
        }else {
           $vRH_Edad = \DB::select("CALL sp_Esta_RH_Edad_P_S('".$vFecInicio."', '". $vFecFin ."')");
        }

        $vTabCon = '';
        $x = 1;
        $vTCantM = 0;
        $vTCantF = 0;

        foreach($vRH_Edad as $vP)
        {
            $vTabCon .= '<tr  id="'. $vP->PK_ConcEstadistica .'">';
            $vTabCon .= '<td class="text-bold">'. $x .'</td> ';
            $vTabCon .= '<td class="text-bold">'. $vP->CES_Nombre .'</td>';
            $vTabCon .= '<td>'. $vP->CantM .'</td> ';
            $vTabCon .= '<td>'. $vP->CantF .'</td> ';

            $vCantTotal = $vP->CantM + $vP->CantF;

            $vTabCon .= '<td>'. $vCantTotal .'</td>';
            $vTabCon .= '</tr>';

            $x++;

            $vTCantM = $vTCantM + $vP->CantM;
            $vTCantF = $vTCantF + $vP->CantF;
        }

        $vTCant = $vTCantM  + $vTCantF;


        $vTabCon .= '<tr class="text-bold">
            <td></td>
            <td>
                <span class="block">Total</span> 
            </td>
            <td>
                <span class="text-bold">' . $vTCantM . '</span>
            </td>
            <td>
                <span class="text-bold">'. $vTCantF . '</span>
            </td>
            <td>
                <span class="text-bold">' . $vTCant .'</span>
            </td>
        </tr>';

        $vTab = '
            <div class="panel panel-white no-radius">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">Personal por Grupo de Edad</h4>
                    <div class="panel-tools">
                        <a data-original-title="Minimizar" data-toggle="tooltip" data-placement="top" data-trigger="hover" class="btn btn-transparent btn-sm panel-collapse" href="#"><i class="ti-minus collapse-off"></i><i class="ti-plus collapse-on"></i></a>
                        <a data-original-title="Cerrar" data-toggle="tooltip" data-placement="top" data-trigger="hover" class="btn btn-transparent btn-sm panel-close" href="#"><i class="ti-close"></i></a>
                    </div>
                </div>
                <div class="panel-wrapper">
                    <div class="panel-body no-padding">
                        <div class="table-responsive">
                            <table class="table table-stylish" id="sample-table-2">
                                <thead>
                                    <tr>
                                        <th class="center no-border">#</th>
                                        <th class="no-border">Grupo de Edad</th>
                                        <th class="no-border">
                                            Hombre 
                                            <a href="javascript:void(0)" data-toggle="popover" data-trigger="focus" data-placement="top" data-content=".">
                                                <i class="fa fa-question-circle text-dark-transparent margin-left-5"></i>
                                            </a>
                                        </th>
                                        <th class="no-border">
                                            Mujer 
                                            <a href="javascript:void(0)" data-toggle="popover" data-trigger="focus" data-placement="top" data-content=".">
                                                <i class="fa fa-question-circle text-dark-transparent margin-left-5"></i>
                                            </a>
                                        </th>
                                        <th class="no-border">
                                            Total 
                                            <a href="javascript:void(0)" data-toggle="popover" data-trigger="focus" data-placement="top" data-content=".">
                                                <i class="fa fa-question-circle text-dark-transparent margin-left-5"></i>
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                            <tbody>';

        $vTab .= $vTabCon;

        if ($vTCantM == 0 AND $vTCantF == 0)
        {
            $vPorM = 0;
            $vPorF = 0;
        }else {
            $vPorM = ($vTCantM * 100) / ($vTCantM + $vTCantF);
            $vPorF = ($vTCantF * 100) / ($vTCantM + $vTCantF);
        }

        $vTab .='    </tbody>
                    </table>
                </div>
                <div class="col-xs-6 no-padding border-right">
                    <div class="padding-10 text-center">
                        <i class="fa fa-male text-azure large-letters"></i>
                        <span class="text-extra-large block margin-top-15">' . number_format($vPorM, 2) .'%</span>
                    </div>
                </div>
                <div class="col-xs-6 no-padding">
                    <div class="padding-10 text-center">
                        <i class="fa fa-female text-pink large-letters"></i>
                        <span class="text-extra-large block margin-top-15">'. number_format($vPorF, 2) .'%</span>
                    </div>
                </div>
                </div></div></div>';

        return $vTab;
    }




    public function pfEsta_REC_PersonalTipo()
    {
        $vNomModulo = 'Estadística: Rectoría || Tipo Personal';
        $vREC_PersTipo = \DB::select("CALL sp_Esta_REC_PersonalTipo_S();");
        return view('Estadisticas.uiREC_PersonalTipo', compact('vREC_PersTipo', 'vNomModulo'));
    }

}
