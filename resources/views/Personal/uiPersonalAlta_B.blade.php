@extends('uiPlantilla')


@section('customTitle')
    {{ $vNomModulo }}
@stop


@section('customHead')

    <link href="{{ asset('/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css?v=1') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('/bower_components/select2/dist/css/select2.min.css?v=1') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.standalone.min.css?v=1') }}" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="{{ asset('/bower_components/sweetalert/dist/sweetalert.css?v=1') }}">
    <link href="{{ asset('/bower_components/spectrum/spectrum.css?v=1') }}" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="{{ asset('/bower_components/DataTables/media/css/dataTables.bootstrap.min.css?v=1') }}">
    <link rel="stylesheet" href="{{ asset('../assets/css/lyt5-theme-1.css?v=4') }}" id="skin_color">

@stop


@section('customBread')

    <div class="breadcrumb-wrapper">
        <h4 class="mainTitle no-margin">{{ $vNomModulo }}</h4>
        <ul class="pull-right breadcrumb">
            <li>
                <a href="{{ url('/Principal') }}">
                    <i class="fa fa-home margin-right-5 text-large text-dark"></i>
                    Principal
                </a>
            </li>
            <li>
                <a href="{{ url('/Personal') }}">
                    <i class="fa fa-user margin-right-5 text-large text-dark"></i>
                    Personal
                </a>
            </li>
            <li>
                <a href="{{ url('/Personal_Alta_B') }}">
                    <i class="fa fa-plus margin-right-5 text-large text-dark"></i>
                    Alta
                </a>
            </li>
        </ul>
    </div>

@stop


@section('customContent')

    <div class="container-fluid container-fullw">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-body">
                        <p>
                            Ingresar los datos necesarios del personal.
                        </p>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"> Personal  </label>
                                        <input type="text" readonly class="form-control" id="TePer_NombreCompleto" name="TePer_NombreCompleto" value="{{$vPer_Nombre}} {{$vPer_Paterno}} {{$vPer_Materno}}" >
                                        <input type="hidden" id="HiPK_Personal" name="HiPK_Personal" value="{{ $vPK_Personal }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <hr />
                                <div class="panel-heading">
                                    <h5 class="panel-title text-bold">II) Preparación Académica</h5>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12" style="background:#E7E7E9;">
                                    <div class="form-group">
                                        <br />
                                        <label class="text-bold"> A. Formación Básica y Media </label>
                                    </div>
                                </div>
                            </div>

                            <form action="#" role="form" id="form">
                                <div class="col-md-12 margin-top-20">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Nivel Educativo <span class="symbol required"></span></label>
                                            <select class="js-example-basic-single js-states form-control SeNivelEducativo" name="SeNivelEducativo" id="SeNivelEducativo" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vFormBasica as $vF)
                                                    <option value="{{ $vF->PK_FormBasica }}">{{ $vF->FBa_Nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="control-label"> Instituto <span class="symbol required"></span></label>
                                            <input type="text" id="TePFB_Instituto" name="TePFB_Instituto" class="form-control" placeholder="Colegio de Bachilleres de Chiapas, Plantel 11, San Cristóbal de las Casas, Chiapas" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Periodo <span class="symbol required"></span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control TePFB_PeriodoInicio" id="TePFB_PeriodoInicio" name="TePFB_PeriodoInicio" />
                                                <span class="input-group-addon bg-primary">a</span>
                                                <input type="text" class="form-control TePFB_PeriodoFin" id="TePFB_PeriodoFin" name="TePFB_PeriodoFin" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Promedio <span class="symbol required"></span></label>
                                            <input type="text" value="0" name="TePFB_Promedio" id="TePFB_Promedio" data-min="0" data-max="10" data-step="0.1" data-decimals="2" data-boostat="5" data-maxboostedstep="1">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <br />
                                            <div class="checkbox clip-check check-primary check-lg checkbox-inline">
                                                <input type="checkbox" name="ChPFB_UG" id="ChPFB_UG" value="1">
                                                <label for="ChPFB_UG"> Último Grado Estudio</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <br />
                                            <input type="hidden" id="HiPK_PersFB" name="HiPK_PersFB" value="-99" />
                                            <button class="btn btn-primary btn-wide" type="submit" onclick="funPersonal_FormacionBasicaGuardar()">
                                                Anexar <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="col-md-12">
                                <div id="divTabPFB">
                                </div>
                                <hr />
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12" style="background:#E7E7E9;">
                                    <div class="form-group">
                                        <br />
                                        <label class="text-bold"> B. Formación Profesional </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <br />
                                <div class="col-md-12" style="background:#E7E7E9;">
                                    <label class="text-bold labmargin"> 1. Licenciatura(s) </label>
                                </div>
                            </div>

                            <form action="#" role="form" id="form2">
                                <div class="col-md-12 margin-top-20">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Tipo <span class="symbol required"></span> </label>
                                            <select class="js-example-basic-single js-states form-control SePFB_Tipo" name="SePFB_Tipo" id="SePFB_Tipo" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                <option value="1">Licenciatura</option>
                                                <option value="2">Técnico Superior Universitario</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="control-label"> Instituto <span class="symbol required"></span></label>
                                            <input type="text" id="TePFP_Instituto" name="TePFP_Instituto" placeholder="Centro Internacional de Estudios Superiores De Morelos, Cuernavaca, Morelos" class="form-control"  />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> Estudio <span class="symbol required"></span></label>
                                            <input type="text" id="TePFP_Estudio" name="TePFP_Estudio" placeholder="Lic. en Derechos" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Cédula Profesional </label>
                                            <input type="text" id="TePFP_CedulaProfesional" name="TePFP_CedulaProfesional" placeholder="12345678"  class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Periodo <span class="symbol required"></span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control TePFP_PeriodoInicio" id="TePFP_PeriodoInicio" name="TePFP_PeriodoInicio" />
                                                <span class="input-group-addon bg-primary">a</span>
                                                <input type="text" class="form-control TePFP_PeriodoFin" id="TePFP_PeriodoFin" name="TePFP_PeriodoFin" />
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Promedio <span class="symbol required"></span></label>
                                            <input type="text" value="0" name="TePFP_Promedio" id="TePFP_Promedio" data-min="0" data-max="10" data-step="0.1" data-decimals="2" data-boostat="5" data-maxboostedstep="1">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <br />
                                            <div class="checkbox clip-check check-primary check-lg checkbox-inline">
                                                <input type="checkbox" name="ChPFP_UG" id="ChPFP_UG" value="1">
                                                <label for="ChPFP_UG"> Último Grado Estudio</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <br />
                                            <input type="hidden" id="HiPK_PersFP" name="HiPK_PersFP" value="-99" />
                                            <button class="btn btn-primary btn-wide" type="submit" onclick="funPersonal_FormacionProfesionalGuardar()">
                                                Anexar <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="col-md-12">
                                <div id="divTabPFP">
                                </div>
                                <hr />
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12" style="background:#E7E7E9;">
                                    <label class="text-bold labmargin"> 2. Postgrados </label>  <label> Especialización, Maestría y Doctorado </label>
                                </div>
                            </div>

                            <form action="#" role="form" id="form3">
                                <div class="col-md-12 margin-top-20">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Tipo <span class="symbol required"></span></label>
                                            <select class="js-example-basic-single js-states form-control SePostTipo" name="SePostTipo" id="SePostTipo" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vPostTipo as $vPT)
                                                    <option value="{{ $vPT->PK_PostTipo }}">{{ $vPT->PTi_Nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="control-label"> Instituto <span class="symbol required"></span></label>
                                            <input type="text" id="TePPo_Instituto" name="TePPo_Instituto" placeholder="Universidad José Vasconcelos, San Cristóbal de las casas, Chiapas" class="form-control"  />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> Nombre <span class="symbol required"></span></label>
                                            <input type="text" id="TePPo_Nombre" name="TePPo_Nombre" placeholder="Docencia y Educación en Valores" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Cédula Profesional </label>
                                            <input type="text" id="TePPo_CedulaProfesional" name="TePPo_CedulaProfesional" placeholder="12345678" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Situación <span class="symbol required"></span></label>
                                            <select class="js-example-basic-single js-states form-control SePostSituacion" name="SePostSituacion" id="SePostSituacion" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vPostSituacion as $vPS)
                                                    <option value="{{ $vPS->PK_PostSituacion }}">{{ $vPS->PSi_Nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Periodo <span class="symbol required"></span></label>
                                            <div class="input-group">
                                                <input type="text" id="TePPo_PeriodoInicio" name="TePPo_PeriodoInicio" class="form-control TePPo_PeriodoInicio"  />
                                                <span class="input-group-addon bg-primary">a</span>
                                                <input type="text" id="TePPo_PeriodoFin" name="TePPo_PeriodoFin" class="form-control TePPo_PeriodoFin"  />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <br />
                                            <div class="checkbox clip-check check-primary check-lg checkbox-inline">
                                                <input type="checkbox" name="ChPPo_UG" id="ChPPo_UG" value="1">
                                                <label for="ChPPo_UG"> Último Grado Estudio</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <br />
                                            <input type="hidden" id="HiPK_PerPos" name="HiPK_PerPos" value="-99" />
                                            <button class="btn btn-primary btn-wide" type="submit" onclick="funPersonal_FormacionPostgradosGuardar()">
                                                Anexar <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="col-md-12">
                                <div id="divTabPPo">
                                </div>
                                <hr />
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12" style="background:#E7E7E9;">
                                    <label class="text-bold labmargin"> 2.1. Trabajos de tesis </label>
                                </div>
                            </div>

                            <form action="#" role="form4" id="form4">
                                <div class="col-md-12 margin-top-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> Título <span class="symbol required"></span></label>
                                            <input type="text" id="TePTe_Titulo" name="TePTe_Titulo" placeholder="xx" class="form-control"  />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> Instituto <span class="symbol required"></span></label>
                                            <input type="text" id="TePTe_Instituto" name="TePTe_Instituto" placeholder="Universidad José Vasconcelos, San Cristóbal de las casas, Chiapas" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> Grado Obtenido <span class="symbol required"></span></label>
                                            <input type="text" id="TePTe_GradoObtenido" name="TePTe_GradoObtenido" placeholder="x" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Periodo <span class="symbol required"></span></label>
                                            <div class="input-group">
                                                <input type="text" id="TePTe_PeriodoInicio" name="TePTe_PeriodoInicio" class="form-control TePTe_PeriodoInicio"  />
                                                <span class="input-group-addon bg-primary">a</span>
                                                <input type="text" id="TePTe_PeriodoFin" name="TePTe_PeriodoFin" class="form-control TePTe_PeriodoFin"  />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <br />
                                            <input type="hidden" id="HiPK_PerTes" name="HiPK_PerTes" value="-99" />
                                            <button class="btn btn-primary btn-wide" type="submit" onclick="funPersonal_TesisGuardar()">
                                                Anexar <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="col-md-12">
                                <div id="divTabPTe">
                                </div>
                                <hr />
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12" style="background:#E7E7E9;">
                                    <label class="text-bold labmargin"> 3. Formación complementaria  </label> <label> Otros estudios (Artes, Deportes, Gastronomía, etc.) </label>
                                </div>
                            </div>

                            <form action="#" role="form5" id="form5">
                                <div class="col-md-12 margin-top-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> Instituto <span class="symbol required"></span></label>
                                            <input type="text" id="TePFC_Instituto" name="TePFC_Instituto" placeholder="Universidad José Vasconcelos, San Cristóbal de las casas, Chiapas" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> Nombre <span class="symbol required"></span></label>
                                            <input type="text"  id="TePFC_Nombre" name="TePFC_Nombre" placeholder="Competencia laboral en el estándar de competencias" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Tipo </label>
                                            <input type="text" id="TePFC_Tipo" name="TePFC_Tipo" placeholder="Certificado" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Documento Probatorio </label>
                                            <input type="text" id="TePFC_DocumentoProbatorio" name="TePFC_DocumentoProbatorio" placeholder="Certificado" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Periodo <span class="symbol required"></span></label>
                                            <div class="input-group">
                                                <input type="text" id="TePFC_PeriodoInicio" name="TePFC_PeriodoInicio" class="form-control TePFC_PeriodoInicio" />
                                                <span class="input-group-addon bg-primary">a</span>
                                                <input type="text" id="TePFC_PeriodoFin" name="TePFC_PeriodoFin" class="form-control TePFC_PeriodoFin" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <br />
                                            <input type="hidden" id="HiPK_PerFCo" name="HiPK_PerFCo" value="-99" />
                                            <button class="btn btn-primary btn-wide" type="submit" onclick="funPersonal_FormacionComplementariaGuardar()">
                                                Anexar <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="col-md-12">
                                <div id="divTabPFC">
                                </div>
                                <hr />
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12" style="background:#E7E7E9;">
                                    <label class="text-bold labmargin"> 3.1 Conocimiento de lenguas nacionales y extranjeras  </label>
                                </div>
                            </div>

                            <form action="#" role="form6" id="form6">
                                <div class="col-md-12 margin-top-20">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Tipo <span class="symbol required"></span> </label>
                                            <select class="js-example-basic-single js-states form-control SeLenTipo" name="SeLenTipo" id="SeLenTipo" style="width: 100% !important" onchange="funSeLengua()">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                <option value="3">Nativo</option>
                                                <option value="1">Nacional</option>
                                                <option value="2">Extranjera</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" id="divSeLengua">
                                        <div class="form-group">
                                            <label> Lengua <span class="symbol required"></span> </label>
                                            <select class="js-example-basic-single js-states form-control SeLengua" name="SeLengua" id="SeLengua" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Otra Lengua</label>
                                            <input type="text" id="TeLen_Nombre" name="TeLen_Nombre" disabled placeholder="..." class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Habla <span class="symbol required"></span> </label>
                                            <select class="js-example-basic-single js-states form-control SeHabla" name="SeHabla" id="SeHabla" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                <option value="MB">MB</option>
                                                <option value="B">B</option>
                                                <option value="R">R</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Lee <span class="symbol required"></span> </label>
                                            <select class="js-example-basic-single js-states form-control SeLee" name="SeLee" id="SeLee" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                <option value="MB">MB</option>
                                                <option value="B">B</option>
                                                <option value="R">R</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Escribe <span class="symbol required"></span> </label>
                                            <select class="js-example-basic-single js-states form-control SeEscribe" name="SeEscribe" id="SeEscribe" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                <option value="MB">MB</option>
                                                <option value="B">B</option>
                                                <option value="R">R</option>
                                            </select>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Comprende Auditivamente <span class="symbol required"></span> </label>
                                            <select class="js-example-basic-single js-states form-control SeComprende" name="SeComprende" id="SeComprende" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                <option value="MB">MB</option>
                                                <option value="B">B</option>
                                                <option value="R">R</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <br />
                                            <input type="hidden" id="HiPK_PersLengua" name="HiPK_PersLengua" value="-99" />
                                            <button class="btn btn-primary btn-wide" type="submit" onclick="funPersonal_LenguaGuardar()">
                                                Anexar <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="col-md-12">
                                <div id="divTabPLe">
                                </div>
                                <hr />
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12" style="background:#E7E7E9;">
                                        <label class="text-bold labmargin"> 3.2 Conocimiento de computación </label>
                                </div>
                            </div>

                            <form action="#" role="form7" id="form7">
                                <div class="col-md-12 margin-top-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> Programa o Paquete <span class="symbol required"></span> </label>
                                            <select multiple="" class="js-example-basic-multiple js-states form-control"  name="SeConoComputo" id="SeConoComputo">
                                                @foreach($vConoComputo as $vCC)
                                                    <option value="{{ $vCC->PK_ConoComputo }}">{{$vCC->CCo_Nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Nivel Manejo <span class="symbol required"></span> </label>
                                            <select class="js-example-basic-single js-states form-control SeNivel" name="SeNivel" id="SeNivel" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                <option value="MB">MB</option>
                                                <option value="B">B</option>
                                                <option value="R">R</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <br />
                                            <input type="hidden" id="HiPK_PerCCo" name="HiPK_PerCCo" value="-99" />
                                            <button class="btn btn-primary btn-wide" type="submit" onclick="funPersonal_ConocimientoComputoGuardar()">
                                                Anexar <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="col-md-12">
                                <div id="divTabPCC">
                                </div>
                                <hr />
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12" style="background:#E7E7E9;">
                                    <div class="form-group">
                                        <br />
                                        <label class="text-bold"> C. Actualización </label> <label> Diplomados, Cursos y Talleres recibidos en los últimos 5 años </label>
                                    </div>
                                </div>
                            </div>

                            <form action="#" role="form8" id="form8">
                                <div class="col-md-12 margin-top-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> Instituto <span class="symbol required"></span> </label>
                                            <input type="text" id="TePAc_Instituto" name="TePAc_Instituto" placeholder="Instituto Nacional De Lenguas Indígenas (INALI)" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> Nombre <span class="symbol required"></span> </label>
                                            <input type="text" id="TePAc_Nombre" name="TePAc_Nombre" placeholder="Diplomado de Formación de formadores de intérpretes de lenguas indígenas" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Duración Hora </label>
                                            <input type="text" id="TePAc_DuracionHoras" name="TePAc_DuracionHoras" placeholder="10" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Periodo <span class="symbol required"></span> </label>
                                            <div class="input-group input-daterange datepicker">
                                                <input type="text" id="TePAc_PeriodoInicio" name="TePAc_PeriodoInicio" class="form-control" />
                                                <span class="input-group-addon bg-primary">a</span>
                                                <input type="text" id="TePAc_PeriodoFin" name="TePAc_PeriodoFin" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <br />
                                            <input type="hidden" id="HiPK_PerAct" name="HiPK_PerAct" value="-99" />
                                            <button class="btn btn-primary btn-wide" type="submit" onclick="funPersonal_ActualizacionGuardar()">
                                                Anexar <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="col-md-12">
                                <div id="divTabPAc">
                                </div>
                                <hr />
                            </div>

                            <div class="col-md-12">
                                <div class="panel-heading">
                                    <h5 class="panel-title text-bold">III) Experiencia Profesional</h5>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12" style="background:#E7E7E9;">
                                    <div class="form-group">
                                        <br />
                                        <label class="text-bold"> A. Experiencia profesional en el área de formación </label>
                                    </div>
                                </div>
                            </div>

                            <form action="#" role="form9" id="form9">
                                <div class="col-md-12 margin-top-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> Instituto <span class="symbol required"></span></label>
                                            <input type="text" id="TeEPr_Instituto" name="TeEPr_Instituto" placeholder="Colegio de Bachilleres de Chiapas, Plantel 11, San Cristóbal de las Casas, Chiapas" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Puesto <span class="symbol required"></span></label>
                                            <input type="text" id="TeEPr_Puesto" name="TeEPr_Puesto" placeholder="Docente" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Periodo <span class="symbol required"></span></label>
                                            <div class="input-group input-daterange datepicker">
                                                <input type="text" id="TeEPr_PeriodoInicio" name="TeEPr_PeriodoInicio" class="form-control" />
                                                <span class="input-group-addon bg-primary">a</span>
                                                <input type="text" id="TeEPr_PeriodoFin" name="TeEPr_PeriodoFin" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <label> Funciones </label>
                                        <div class="form-group">
                                            <textarea placeholder="..." id="TAEPr_Funciones" name="TAEPr_Funciones" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <br />
                                            <input type="hidden" id="HiPK_PerEPr" name="HiPK_PerEPr" value="-99" />
                                            <button class="btn btn-primary btn-wide" type="submit" onclick="funPersonal_ExperienciaProfesionalGuardar()">
                                                Anexar <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="col-md-12">
                                <div id="divTabPEP">
                                </div>
                                <hr />
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12" style="background:#E7E7E9;">
                                    <div class="form-group">
                                        <br />
                                        <label class="text-bold"> B. Experiencia Docente </label>
                                    </div>
                                </div>
                                <div class="col-md-12 margin-top-20" style="background:#E7E7E9;">
                                    <label class="text-bold labmargin"> 1. Docencia </label>
                                </div>
                            </div> 

                            <form action="#" role="form10" id="form10">
                                <div class="col-md-12 margin-top-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> Instituto <span class="symbol required"></span></label>
                                            <input type="text" id="TePDo_Instituto" name="TePDo_Instituto" placeholder="Centro Internacional de Estudios Superiores De Morelos, Cuernavaca, Morelos" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Nivel Educativo <span class="symbol required"></span></label>
                                            <select class="js-example-basic-single js-states form-control SeNivEducativo" name="SeNivEducativo" id="SeNivEducativo" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vNiveEducativo as $vNE)
                                                    <option value="{{ $vNE->PK_NivEducativo }}">{{ $vNE->NEd_Nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Periodo <span class="symbol required"></span></label>
                                            <div class="input-group input-daterange datepicker">
                                                <input type="text" id="TePDo_PeriodoInicio" name="TePDo_PeriodoInicio" class="form-control" />
                                                <span class="input-group-addon bg-primary">a</span>
                                                <input type="text" id="TePDo_PeriodoFin" name="TePDo_PeriodoFin" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <label> Asignaturas Impartidas </label>
                                        <div class="form-group">
                                            <textarea id="TAPDo_Asignaturas" name="TAPDo_Asignaturas" placeholder="..." class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <br />
                                            <input type="hidden" id="HiPK_PerEDo" name="HiPK_PerEDo" value="-99" />
                                            <button class="btn btn-primary btn-wide" type="submit" onclick="funPersonal_ExperienciaDocenteGuardar()">
                                                Anexar <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="col-md-12">
                                <div id="divTabPED">
                                </div>
                                <hr />
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12" style="background:#E7E7E9;">
                                    <label class="text-bold labmargin"> 2. Asesoría de Tesis</label>
                                </div>
                            </div>

                            <form action="#" role="form11" id="form11">
                                <div class="col-md-12 margin-top-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> Instituto <span class="symbol required"></span></label>
                                            <input type="text" id="TePAT_Instituto" name="TePAT_Instituto" placeholder="Universidad José Vasconcelos, San Cristóbal de las casas, Chiapas" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> Nombre <span class="symbol required"></span></label>
                                            <input type="text" id="TePAT_Nombre" name="TePAT_Nombre" placeholder="Modalidad de Informe de Experiencia Profesional" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> Carrera o Posgrado <span class="symbol required"></span></label>
                                            <input type="text" id="TePAT_CarreraPosgrado" name="TePAT_CarreraPosgrado" placeholder="Licenciatura en Lengua y Cultura" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Periodo <span class="symbol required"></span></label>
                                            <div class="input-group">
                                                <input type="text" id="TePAT_PeriodoInicio" name="TePAT_PeriodoInicio" class="form-control TePAT_PeriodoInicio" />
                                                <span class="input-group-addon bg-primary">a</span>
                                                <input type="text" id="TePAT_PeriodoFin" name="TePAT_PeriodoFin" class="form-control TePAT_PeriodoFin" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <br />
                                            <input type="hidden" id="HiPK_PerATe" name="HiPK_PerATe" value="-99" />
                                            <button class="btn btn-primary btn-wide" type="submit" onclick="funPersonal_AsesoriaTesisGuardar()">
                                                Anexar <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="col-md-12">
                                <div id="divTabPAT">
                                </div>
                                <hr />
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12" style="background:#E7E7E9;">
                                    <label class="text-bold labmargin"> 3. Experiencias innovadoras en la docencia</label> <label>Estrategias de enseñanza-aprendizaje, materiales educativos, de apoyo a la docencia y de vinculación escuela-comunidad</label>
                                </div>
                            </div>

                            <form action="#" role="form12" id="form12">
                                <div class="col-md-12 margin-top-20">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="control-label"> Instituto <span class="symbol required"></span></label>
                                            <input type="text" id="TePEI_Instituto" name="TePEI_Instituto" placeholder="Universidad José Vasconcelos, San Cristóbal de las casas, Chiapas" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Periodo <span class="symbol required"></span></label>
                                            <div class="input-group">
                                                <input type="text" id="TePEI_PeriodoInicio" name="TePEI_PeriodoInicio" class="form-control TePEI_PeriodoInicio" />
                                                <span class="input-group-addon bg-primary">a</span>
                                                <input type="text" id="TePEI_PeriodoFin" name="TePEI_PeriodoFin" class="form-control TePEI_PeriodoFin" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <label> Descripción de la experiencia </label>
                                        <div class="form-group">
                                            <textarea id="TAPEI_Descripcion" name="TAPEI_Descripcion" placeholder="..." class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <br />
                                            <input type="hidden" id="HiPK_PerEIn" name="HiPK_PerEIn" value="-99" />
                                            <button class="btn btn-primary btn-wide" type="submit" onclick="funPersonal_ExperienciaInnovadoraGuardar()">
                                                Anexar <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="col-md-12">
                                <div id="divTabPEI">
                                </div>
                                <hr />
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12" style="background:#E7E7E9;">
                                    <label class="text-bold labmargin"> 4. Cursos y/o talleres impartidos </label>
                                </div>
                            </div>

                            <form action="#" role="form13" id="form13">
                                <div class="col-md-12 margin-top-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> Instituto <span class="symbol required"></span></label>
                                            <input type="text" id="TePCT_Instituto" name="TePCT_Instituto" placeholder="Universidad Intercultural del estado de Chiapas (UNICH)" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> Nombre <span class="symbol required"></span></label>
                                            <input type="text" id="TePCT_Nombre" name="TePCT_Nombre" placeholder="Diplomado de formación de intérpretes de lenguas indígenas en el estado de Chiapas" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Duración Hora</label>
                                            <input type="text" id="TePCT_DuracionHora" name="TePCT_DuracionHora" placeholder="10" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Periodo <span class="symbol required"></span></label>
                                            <div class="input-group input-daterange datepicker">
                                                <input type="text" id="TePCT_PeriodoInicio" name="TePCT_PeriodoInicio" class="form-control" />
                                                <span class="input-group-addon bg-primary">a</span>
                                                <input type="text" id="TePCT_PeriodoFin" name="TePCT_PeriodoFin" class="form-control" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <br />
                                            <input type="hidden" id="HiPK_PerCTI" name="HiPK_PerCTI" value="-99" />
                                            <button class="btn btn-primary btn-wide" type="submit" onclick="funPersonal_CursoTallerGuardar()">
                                                Anexar <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="col-md-12">
                                <div id="divTabPCT">
                                </div>
                                <hr />
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12" style="background:#E7E7E9;">
                                    <div class="form-group">
                                        <br />
                                        <label class="text-bold"> C. Experiencia en Diseño Curricular</label> <label>*Especifique si la participación en  la experiencia fue en el Plan y Programas de estudio, sólo programas, Diplomado, Curso o Taller</label>
                                    </div>
                                </div>
                            </div>

                            <form action="#" role="form14" id="form14">
                                <div class="col-md-12 margin-top-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> Instituto <span class="symbol required"></span></label>
                                            <input type="text" id="TeEDC_Instituto" name="TeEDC_Instituto" placeholder="Instituto Nacional De Lenguas Indígenas (INALI)" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> Nombre <span class="symbol required"></span></label>
                                            <input type="text" id="TeEDC_Nombre" name="TeEDC_Nombre" placeholder="Programa de licenciatura en derecho con enfoque intercultural" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Tipo <span class="symbol required"></span></label>
                                            <select class="js-example-basic-single js-states form-control SeExperienciaDT" name="SeExperienciaDT" id="SeExperienciaDT" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vExperienciaDT as $vE)
                                                    <option value="{{ $vE->PK_EDCTipo }}">{{ $vE->EDCT_Nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Periodo <span class="symbol required"></span></label>
                                            <div class="input-group input-daterange datepicker">
                                                <input type="text" id="TeEDC_PeriodoInicio" name="TeEDC_PeriodoInicio" class="form-control" />
                                                <span class="input-group-addon bg-primary">a</span>
                                                <input type="text" id="TeEDC_PeriodoFin" name="TeEDC_PeriodoFin" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <br />
                                            <input type="hidden" id="HiPK_PerEDC" name="HiPK_PerEDC" value="-99" />
                                            <button class="btn btn-primary btn-wide" type="submit" onclick="funPersonal_ExperienciaDisenoCurricularGuardar()">
                                                Anexar <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="col-md-12">
                                <div id="divTabPDC">
                                </div>
                                <hr />
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12" style="background:#E7E7E9;">
                                    <div class="form-group">
                                        <br />
                                        <label class="text-bold"> D. Experiencia en investigación</label> <label>Incluya las investigaciones relacionadas con su área de formación, especifique si fue en zona urbana, rural o indígena y las realizadas en el ámbito educativo</label>
                                    </div>
                                </div>
                            </div>

                            <form action="#" role="form15" id="form15">
                                <div class="col-md-12 margin-top-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> Instituto <span class="symbol required"></span> </label>
                                            <input type="text" id="TePEInv_Instituto" name="TePEInv_Instituto" placeholder="Instituto Nacional De Lenguas Indígenas (INALI)" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> Título <span class="symbol required"></span> </label>
                                            <input type="text" id="TePEI_Titulo" name="TePEI_Titulo" placeholder="Programa de licenciatura en derecho con enfoque intercultural" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Nivel Participación <span class="symbol required"></span> </label>
                                            <select class="js-example-basic-single js-states form-control SeNivelParticipacion" name="SeNivelParticipacion" id="SeNivelParticipacion" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vInveNP as $vI)
                                                    <option value="{{ $vI->PK_InveNivePart }}">{{ $vI->INP_Nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Periodo <span class="symbol required"></span> </label>
                                            <div class="input-group input-daterange datepicker">
                                                <input type="text" id="TePEInv_PeriodoInicio" name="TePEInv_PeriodoInicio" class="form-control" />
                                                <span class="input-group-addon bg-primary">a</span>
                                                <input type="text" id="TePEInv_PeriodoFin" name="TePEInv_PeriodoFin" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <br />
                                            <input type="hidden" id="HiPK_PerEInv" name="HiPK_PerEInv" value="-99" />
                                            <button class="btn btn-primary btn-wide" type="submit" onclick="funPersonal_ExperienciaInvestigacionGuardar()">
                                                Anexar <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="col-md-12">
                                <div id="divTabPEIn">
                                </div>
                                <hr />
                            </div>                            

                            <div class="col-md-12">
                                <div class="col-md-12" style="background:#E7E7E9;">
                                    <div class="form-group">
                                        <br />
                                        <label class="text-bold"> E. Experiencia en vinculación y trabajo comunitario</label>
                                    </div>
                                </div>
                            </div>

                            <form action="#" role="form16" id="form16">
                                <div class="col-md-12 margin-top-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> Instituto <span class="symbol required"></span></label>
                                            <input type="text" id="TePEV_Instituto" name="TePEV_Instituto" placeholder="Instituto Nacional De Lenguas Indígenas (INALI)" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> Título Proyecto <span class="symbol required"></span></label>
                                            <input type="text" id="TePEV_Titulo" name="TePEV_Titulo" placeholder="Programa de licenciatura en derecho con enfoque intercultural" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Nivel Participación <span class="symbol required"></span> </label>                                                                                                          
                                            <select class="js-example-basic-single js-states form-control SeVincNivePart" name="SeVincNivePart" id="SeVincNivePart" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vVincNP as $vV)
                                                    <option value="{{ $vV->PK_VincNivePart }}">{{ $vV->VNP_Nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Periodo <span class="symbol required"></span></label>
                                            <div class="input-group input-daterange datepicker">
                                                <input type="text" id="TePEV_PeriodoInicio" name="TePEV_PeriodoInicio" class="form-control" />
                                                <span class="input-group-addon bg-primary">a</span>
                                                <input type="text" id="TePEV_PeriodoFin" name="TePEV_PeriodoFin" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <br />
                                            <input type="hidden" id="HiPK_PerEV" name="HiPK_PerEV" value="-99" />
                                            <button class="btn btn-primary btn-wide" type="submit" onclick="funPersonal_ExperienciaVinculacionGuardar()">
                                                Anexar <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="col-md-12">
                                <div id="divTabPEV">
                                </div>
                                <hr />
                            </div> 
                            
                            <div class="col-md-12">
                                <div class="col-md-12" style="background:#E7E7E9;">
                                    <div class="form-group">
                                        <br />
                                        <label class="text-bold"> F. Publicaciones</label>
                                    </div>
                                </div>
                            </div>

                            <form action="#" role="form17" id="form17">
                                <div class="col-md-12 margin-top-20">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="control-label"> Título Publicación <span class="symbol required"></span> </label>
                                            <textarea id="TePPu_Titulo" name="TePPu_Titulo" placeholder="Ensayo: La construcción teórica de la democracia intercultural desde diferentes grupos culturales en México la democracia desde la visión de los pueblos originarios de Chiapas" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Fecha <span class="symbol required"></span> </label>
                                                <input type="text" id="TePPu_Fecha" name="TePPu_Fecha" class="form-control datepicker" />
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="control-label"> Referencia Bibliográfica <span class="symbol required"></span> </label>
                                            <textarea id="TePPu_ReferenciaBibliografica" name="TePPu_ReferenciaBibliografica" placeholder="Democracia intercultural, editada por el Instituto Nacional Electoral (INE)" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <br />
                                            <input type="hidden" id="HiPK_PerPub" name="HiPK_PerPub" value="-99" />
                                            <button class="btn btn-primary btn-wide" type="submit" onclick="funPersonal_PublicacionesGuardar()">
                                                Anexar <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="col-md-12">
                                <div id="divTabPPU">
                                </div>
                                <hr />
                            </div> 

                            <div class="col-md-12">
                                <div class="col-md-12" style="background:#E7E7E9;">
                                    <div class="form-group">
                                        <br />
                                        <label class="text-bold"> G. Otros</label> <label>Incluya en este apartado toda la información que considere pertinente y que no haya sido contemplada en este formato</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <br />
                                <div class="col-md-12" style="background:#E7E7E9;">
                                    <label class="text-bold labmargin"> 1. Participación como ponente</label>
                                </div>
                            </div>

                            <form action="#" role="form18" id="form18">
                                <div class="col-md-12 margin-top-20">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="control-label"> Evento <span class="symbol required"></span></label>
                                            <input type="text" id="TePPP_Evento" name="TePPP_Evento" placeholder="2do Seminario Internacional de Lenguas Indígenas" class="form-control"  />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Periodo <span class="symbol required"></span></label>
                                            <div class="input-group input-daterange datepicker">
                                                <input type="text" id="TePPP_PeriodoInicio" name="TePPP_PeriodoInicio" class="form-control"  />
                                                <span class="input-group-addon bg-primary">a</span>
                                                <input type="text" id="TePPP_PeriodoFin" name="TePPP_PeriodoFin" class="form-control"  />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="control-label"> Tema <span class="symbol required"></span></label>
                                            <input type="text" id="TePPP_Tema" name="TePPP_Tema" placeholder="Pueblos indígenas y la profesionalización de intérpretes en contextos multiculturales y multilingües" class="form-control"  />
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <br />
                                            <input type="hidden" id="HiPK_PerPPo" name="HiPK_PerPPo" value="-99" />
                                            <button class="btn btn-primary btn-wide" type="submit" onclick="funPersonal_ParticipacionPonenteGuardar()">
                                                Anexar <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                            <div class="col-md-12">
                                <div id="divTabPPP">
                                </div>
                                <hr />
                            </div>  
                            
                            <div class="col-md-12">
                                <div class="panel-heading">
                                    <h5 class="panel-title text-bold">IV) Discapacidad</h5>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12" style="background:#E7E7E9;">
                                    <div class="form-group">
                                        <br />
                                        <label class="text-bold"> A. Discapacidad</label>
                                    </div>
                                </div>
                            </div>

                            <form action="#" role="form19" id="form19">
                                <div class="col-md-12 margin-top-20">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Discapacidad <span class="symbol required"></span> </label>                                                                                                          
                                            <select class="js-example-basic-single js-states form-control SeDiscapacidad" name="SeDiscapacidad" id="SeDiscapacidad" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vDiscapacidad as $vD)
                                                    <option value="{{ $vD->PK_Discapacidad }}">{{ $vD->Dis_Nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <br />
                                            <input type="hidden" id="HiPK_PerDis" name="HiPK_PerDis" value="-99" />
                                            <button class="btn btn-primary btn-wide" type="submit" onclick="funPersonal_DiscapacidadGuardar()">
                                                Anexar <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="col-md-12">
                                <div id="divTabPDI">
                                </div>
                                <hr />
                            </div>
                        
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <span class="symbol required"></span>Campos Requeridos
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                          
                                <a class="btn btn-primary btn-wide pull-right" href="{{ url('/Personal') }}">
                                    Guardar <i class="fa fa-save"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div id="divPanel"></div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-aside vertical top Mod_Bitacora"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Bitácora</h4>
                </div>
                <div class="modal-body" id="divMoBitacora">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-o" data-dismiss="modal">
                        <i class="fa fa-close"></i> Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>

@stop


@section('customScript')

    <script src="{{ asset('/bower_components/jquery.maskedinput/dist/jquery.maskedinput.min.js?v=1') }}"></script>
    <script src="{{ asset('/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js?v=1') }}"></script>
    <script src="{{ asset('/bower_components/autosize/dist/autosize.min.js?v=1') }}"></script>
    <script src="{{ asset('/bower_components/select2/dist/js/select2.min.js?v=1') }}"></script>
    <script src="{{ asset('/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min_.js?v=4') }}"></script>
    <script src="{{ asset('/bower_components/bootstrap-timepicker/js/bootstrap-timepicker.js?v=2') }}"></script>
    <script src="{{ asset('/bower_components/spectrum/spectrum.js?v=1') }}"></script>
    <script src="{{ asset('/bower_components/bb-jquery-validation/dist/jquery.validate.js?v=3') }}"></script>
    <script src="{{ asset('/bower_components/sweetalert/dist/sweetalert.min.js?v=1') }}"></script>
    <script src="{{ asset('/bower_components/DataTables/media/js/jquery.dataTables.min.js?v=30') }}"></script>
    <script src="{{ asset('/bower_components/DataTables/media/js/dataTables.bootstrap.min.js?v=20') }}"></script>

@stop


@section('customScript2')

    <script src="{{ asset('/assets/js/selectFx/classie.js?v=20') }}"></script>
    <script src="{{ asset('/assets/js/selectFx/selectFx.js?v=20') }}"></script>
    <script src="{{ asset('/assets/js/form-validation.js?v=3434') }}"></script>
    <script src="{{ asset('/js/Varios/jsSelect.js?v=20') }}"></script>
    <script src="{{ asset('/js/Varios/jsApp.js?v=56') }}"></script>
    <script src="{{ asset('/js/Personal/jsPersonal.js?v=4') }}"></script>
    <script src="{{ asset('/assets/js/form-elements.js?v=7') }}"></script>

    <script>
        jQuery(document).ready(function() {
            Main.init();
            FormElements.init();
            FormValidator.init();

            funPersonal_FormacionBasicaConsultar({{ $vPK_Personal }});
            funPersonal_FormacionProfesionalConsultar({{ $vPK_Personal }});
            funPersonal_FormacionPostgradosConsultar({{ $vPK_Personal }});
            funPersonal_TesisConsultar({{ $vPK_Personal }});
            funPersonal_FormacionComplementariaConsultar({{ $vPK_Personal }});
            funPersonal_LenguaConsultar({{ $vPK_Personal }});
            funPersonal_ConocimientoComputoConsultar({{ $vPK_Personal }});
            funPersonal_ActualizacionConsultar({{ $vPK_Personal }});
            funPersonal_ExperienciaProfesionalConsultar({{ $vPK_Personal }});
            funPersonal_ExperienciaDocenteConsultar({{ $vPK_Personal }});
            funPersonal_AsesoriaTesisConsultar({{ $vPK_Personal }});
            funPersonal_ExperienciaInnovadoraConsultar({{ $vPK_Personal }});
            funPersonal_CursoTallerConsultar({{ $vPK_Personal }});
            funPersonal_ExperienciaDisenoCurricularConsultar({{ $vPK_Personal }});
            funPersonal_ExperienciaInvestigacionConsultar({{ $vPK_Personal }});
            funPersonal_ExperienciaVinculacionConsultar({{ $vPK_Personal }});
            funPersonal_PublicacionesConsultar({{ $vPK_Personal }});
            funPersonal_ParticipacionPonenteConsultar({{ $vPK_Personal }});
            funPersonal_DiscapacidadConsultar({{ $vPK_Personal }});

        });
    </script>

@stop
