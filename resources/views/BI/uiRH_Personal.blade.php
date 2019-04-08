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
                    Estadísticas
                </a>
            </li>
            <li>
                <a href="{{ url('/BI_RH_Personal') }}">
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
                                    <label class="text-bold"> Reporte </label>
                                    <select class="js-example-basic-single js-states form-control SeReporte" name="SeReporte" id="SeReporte" style="width: 100% !important">
                                        <option value="x1" disibled selected>Seleccionar</option>
                                        @foreach($vReporte as $vR)
                                            <option value="{{ $vR->Rep_SP }}">{{ $vR->Rep_Nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> Periodo (Fecha Ingreso)</label>
                                    <div class="input-group input-daterange datepicker">
                                        <input type="text" class="form-control" id="TeFecInicio" name="TeFecInicio" />
                                        <span class="input-group-addon bg-primary">a</span>
                                        <input type="text" class="form-control" id="TeFecFin" name="TeFecFin" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"> Genero <span class="symbol required"></span> </label>
                                    <div class="clip-radio radio-primary">
                                        <input checked type="radio" value="NULL" name="RaPer_Sexo" id="RaPer_SexoMT" />
                                        <label style="margin-right: 0px !important;" for="RaPer_SexoMT">Todo</label>
                                        <input type="radio" value="0" name="RaPer_Sexo" id="RaPer_SexoFem" />
                                        <label style="margin-right: 0px !important;" for="RaPer_SexoFem">Femenino</label>
                                        <input type="radio" value="1" name="RaPer_Sexo" id="RaPer_SexoMas" />
                                        <label style="margin-right: 0px !important;" for="RaPer_SexoMas">Masculino</label>
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
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> Tipo de Contrato </label>
                                    <select class="js-example-basic-single js-states form-control SeTipoContrato" name="SeTipoContrato" id="SeTipoContrato" style="width: 100% !important">
                                        <option value="NULL" selected>Mostrar Todo</option>
                                        @foreach($vTipoCont as $vTC)
                                            <option value="{{ $vTC->PK_TipoContrato }}">{{ $vTC->TCo_Nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> Superior Jerárquico </label>
                                    <select class="js-example-basic-single js-states form-control SeSuperiorJerarquico" name="SeSuperiorJerarquico" id="SeSuperiorJerarquico" style="width: 100% !important" onchange="funSeDepartamento()">
                                        <option value="NULL" selected>Mostrar Todo</option>
                                        @foreach($vSupeJera as $vSup)
                                            <option value="{{ $vSup->PK_SupeJerarquico }}">{{ $vSup->SJe_Nombre }} ({{ $vSup->SJe_Abreviatura }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label> Departamento </label>
                                        <select class="js-example-basic-single js-states form-control SeDepartamento" name="SeDepartamento" id="SeDepartamento" style="width: 100% !important" onchange="funSeDepartamento()">
                                            <option value="NULL" selected>Mostrar Todo</option>
                                            @foreach($vDepa as $vD)
                                                <option value="{{ $vD->PK_Departamento }}">{{ $vD->Dep_Nombre }} ({{ $vD->Dep_Abreviatura }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> Categoría </label>
                                    <select class="js-example-basic-single js-states form-control SeCategoria" name="SeCategoria" id="SeCategoria" style="width: 100% !important">
                                        <option value="NULL" selected>Mostrar Todo</option>
                                        @foreach($vCatePues as $vC)
                                            <option value="{{ $vC->PK_CatePuesto }}">{{ $vC->CPu_Nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> Estado Civil </label>
                                    <select class="js-example-basic-single js-states form-control SeEstaCivil" name="SeEstaCivil" id="SeEstaCivil" style="width: 100% !important" >
                                        <option value="NULL" selected>Mostrar Todo</option>
                                        @foreach($vEstaCivi as $vEC)
                                            <option value="{{ $vEC->PK_EstaCivil }}">{{ $vEC->ECi_Nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> Entidad Federativa </label>
                                    <select class="js-example-basic-single js-states form-control SeEntidad" name="SeEntidad" id="SeEntidad" style="width: 100% !important">
                                        <option value="NULL" selected>Mostrar Todo</option>
                                        @foreach($vEnti as $vEF)
                                            <option value="{{ $vEF->PK_Entidad }}">{{ $vEF->EFe_Nombre }} ({{ $vEF->Pai_NombreCorto }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-wide" onclick="funGenRH_Personal()">
                                        <i class="fa fa-bar-chart"></i>  Generar
                                    </button>
                                </div>
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
@stop


@section('customScript2')

    <script src="{{ asset('/assets/js/selectFx/classie.js?v=1') }}"></script>
    <script src="{{ asset('/assets/js/selectFx/selectFx.js?v=1') }}"></script>
    <script src="{{ asset('/js/Varios/jsApp.js?v=4') }}"></script>
    <script src="{{ asset('/js/BI/jsBI_Personal.js?v=6') }}"></script>
    <script src="{{ asset('/assets/js/form-elements.js?v=9') }}"></script>

    <script>
        jQuery(document).ready(function() {
            Main.init();
            FormElements.init();
        });
    </script>

@stop

