@extends('uiPlantilla')


@section('customTitle')
  {{ $vNomModulo }}
@stop


@section('customHead')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css?v=1') }}" rel="stylesheet" media="screen">
	<link href="{{ asset('/bower_components/select2/dist/css/select2.min.css?v=1') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.standalone.min.css?v=1') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('/bower_components/spectrum/spectrum.css?v=1') }}" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="{{ asset('/bower_components/sweetalert/dist/sweetalert.css?v=1') }}">
    <link rel="stylesheet" href="{{ asset('/bower_components/DataTables/media/css/dataTables.bootstrap.min.css?v=1') }}">
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
                <a href="#">
                    <i class="fa fa-user margin-right-5 text-large text-dark"></i>
                    Servicio Escolar 
                </a>
            </li>
            <li>
                <a href="{{ url('/Alumno') }}">
                    <i class="fa fa-home margin-right-5 text-large text-dark"></i>
                    {{ $vNomModulo }}
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

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"> Sexo </label>
                                    <div class="clip-radio radio-primary">
                                        <input checked type="radio" value="NULL" name="RaAlu_Sexo" id="RaAlu_SexoMT" />
                                        <label style="margin-right: 0px !important;" for="RaAlu_SexoMT">Todo</label>
                                        <input type="radio" value="0" name="RaAlu_Sexo" id="RaAlu_SexoFem" />
                                        <label style="margin-right: 0px !important;" for="RaAlu_SexoFem">Femenino</label>
                                        <input type="radio" value="1" name="RaAlu_Sexo" id="RaAlu_SexoMas" />
                                        <label style="margin-right: 0px !important;" for="RaAlu_SexoMas">Masculino</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> Sede </label>
                                    <select class="js-example-basic-single js-states form-control SeSede" name="SeSede" id="SeSede" style="width: 100% !important">
                                        <option value="NULL" selected>Mostrar Todo</option>
                                        @foreach($vSede as $vS)
                                            <option value="{{ $vS->PK_Sede }}">{{ $vS->Sed_Nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> Carrera </label>
                                    <select class="js-example-basic-single js-states form-control SeCarrera" name="SeCarrera" id="SeCarrera" style="width: 100% !important" onchange="funSeCarrGeneracion()">
                                        <option value="NULL" selected>Mostrar Todo</option>
                                        @foreach($vCarr as $vC)
                                            <option value="{{ $vC->PK_Carrera }}">{{ $vC->Car_Nombre }} ({{ $vC->Modalidad_Descripcion }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group" id="divSeCarrGeneracion">
                                    <label> Generación </label>
                                    <select class="js-example-basic-single js-states form-control SeCarrGeneracion" name="SeCarrGeneracion" id="SeCarrGeneracion" style="width: 100% !important" onchange="funSeDepartamento()">
                                        <option value="NULL" selected>Mostrar Todo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label> Periodo Inicio </label>
                                        <select class="js-example-basic-single js-states form-control SePeriodoIni" name="SePeriodoIni" id="SePeriodoIni" style="width: 100% !important" onchange="funSeDepartamento()">
                                            <option value="NULL" selected>Mostrar Todo</option>
                                            @foreach($vPeri as $vP)
                                                <option value="{{ $vP->PK_Periodo }}">{{ $vP->Periodo }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label> Periodo Fin </label>
                                        <select class="js-example-basic-single js-states form-control SePeriodoFin" name="SePeriodoFin" id="SePeriodoFin" style="width: 100% !important" onchange="funSeDepartamento()">
                                            <option value="NULL" selected>Mostrar Todo</option>
                                            @foreach($vPeri as $vP)
                                                <option value="{{ $vP->PK_Periodo }}">{{ $vP->Periodo }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> Situación </label>
                                    <select class="js-example-basic-single js-states form-control SeAlumSituacion" name="SeAlumSituacion" id="SeAlumSituacion" style="width: 100% !important">
                                        <option value="NULL" selected>Mostrar Todo</option>
                                        @foreach($vAlumSitu as $vAS)
                                            <option value="{{ $vAS->PK_AlumSituacion }}">{{ $vAS->ASi_Nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-wide" onclick="funSEAlumno_Consultar()">
                                        <i class="fa fa-bars"></i>  Consultar
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <hr />
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div id="divPanel"></div>
                                <div id="divTabConsultar"></div>
                            </div>
                        </div>


                    </div>
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
    <script src="{{ asset('/bower_components/sweetalert/dist/sweetalert.min.js?v=1') }}"></script>
    <script src="{{ asset('/bower_components/DataTables/media/js/jquery.dataTables.min.js?v=5') }}"></script>
    <script src="{{ asset('/bower_components/DataTables/media/js/dataTables.bootstrap.min.js?v=1') }}"></script>
@stop


@section('customScript2')

    <script src="{{ asset('/assets/js/selectFx/classie.js?v=1') }}"></script>
    <script src="{{ asset('/assets/js/selectFx/selectFx.js?v=1') }}"></script>
    <script src="{{ asset('/js/Varios/jsApp.js?v=6') }}"></script>
    <script src="{{ asset('/js/Alumno/jsAlumno.js?v=9') }}"></script>
    <script src="{{ asset('/assets/js/form-elements.js?v=9') }}"></script>

    <script>
        jQuery(document).ready(function() {
            Main.init();
            FormElements.init();
        });
    </script>

@stop

