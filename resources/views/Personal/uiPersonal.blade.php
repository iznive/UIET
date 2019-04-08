@extends('uiPlantilla')


@section('customTitle')
  {{ $vNomModulo }}
@stop


@section('customHead')

    <link href="{{ asset('/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css?v=1') }}" rel="stylesheet" media="screen">
	<link href="{{ asset('/bower_components/select2/dist/css/select2.min.css?v=1') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('/bower_components/spectrum/spectrum.css?v=1') }}" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="{{ asset('/bower_components/sweetalert/dist/sweetalert.css?v=1') }}">
    <link rel="stylesheet" href="{{ asset('/bower_components/DataTables/media/css/dataTables.bootstrap.min.css?v=1') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                <a href="{{ url('/Personal') }}">
                    <i class="fa fa-reorder margin-right-5 text-large text-dark"></i>
                    Consulta
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
                        <p class="text-bold">
                            Filtros
                        </p>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"> Género </label>
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
                                    <label> Situación </label>
                                    <select class="js-example-basic-single js-states form-control SeSituacion" name="SeSituacion" id="SeSituacion" style="width: 100% !important">
                                        <option value="NULL" selected>Mostrar Todo</option>
                                        @foreach($vSitu as $vSi)
                                            <option value="{{ $vSi->PK_PersSituacion }}">{{ $vSi->PSi_Nombre }}</option>
                                        @endforeach
                                    </select>
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
                                    <select class="js-example-basic-single js-states form-control SeSuperiorJerarquico" name="SeSuperiorJerarquico" id="SeSuperiorJerarquico" style="width: 100% !important">
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
                                        <select class="js-example-basic-single js-states form-control SeDepartamento" name="SeDepartamento" id="SeDepartamento" style="width: 100% !important">
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

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-wide" onclick="funPersonalConsultar()">
                                        <i class="fa fa-search"></i>  Buscar
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <div class="col-md-12">
                                <div id="divPanel"></div>
                            </div>
                        </div>

                    </div>
                </div>
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
                <div class="modal-body">
                    <div id="divMoBitacora"></div>
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
    <script src="{{ asset('/bower_components/select2/dist/js/select2.min.js?v=2') }}"></script>
    <script src="{{ asset('/bower_components/spectrum/spectrum.js?v=1') }}"></script>
    <script src="{{ asset('/bower_components/bb-jquery-validation/dist/jquery.validate.js?v=8') }}"></script>
    <script src="{{ asset('/bower_components/sweetalert/dist/sweetalert.min.js?v=1') }}"></script>
    <script src="{{ asset('/bower_components/DataTables/media/js/jquery.dataTables.min.js?v=5') }}"></script>
    <script src="{{ asset('/bower_components/DataTables/media/js/dataTables.bootstrap.min.js?v=1') }}"></script>

@stop


@section('customScript2')

    <script src="{{ asset('/assets/js/selectFx/classie.js?v=1') }}"></script>
    <script src="{{ asset('/assets/js/selectFx/selectFx.js?v=1') }}"></script>
    <script src="{{ asset('/js/Varios/jsSelect.js?v=1') }}"></script>
    <script src="{{ asset('/js/Varios/jsApp.js?v=3') }}"></script>
    <script src="{{ asset('/js/Catalogos/jsPais.js?v=3') }}"></script>
    <script src="{{ asset('/js/Personal/jsPersonal2.js?v=33') }}"></script>

    <script>
        jQuery(document).ready(function() {
            Main.init();
            FormElements.init();
        });
    </script>

@stop
