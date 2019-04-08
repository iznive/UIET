@extends('uiPlantilla')


@section('customTitle')
    {{ $vNomModulo }}
@stop


@section('customHead')

    <link href="{{ asset('/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css?v=1') }}" rel="stylesheet" media="screen">
	<link href="{{ asset('/bower_components/select2/dist/css/select2.min.css?v=1') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.standalone.min.css?v=1') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('/bower_components/spectrum/spectrum.css?v=1') }}" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="{{ asset('/bower_components/sweetalert/dist/sweetalert.css?v=1') }}">
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
                <a href="{{ url('/Titulacion') }}">
                    <i class="fa fa-user margin-right-5 text-large text-dark"></i>
                    Titulación
                </a>
            </li>
            <li>
                <a href="{{ url('/Titulacion_Alta') }}">
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
                            Ingresar los datos necesarios de Titulación.
                        </p>
                        <hr>

                        <form action="#" role="form" id="form">
                            <input type="hidden" id="HiPK_Titulacion" name="HiPK_Titulacion" value="-99" />

                            <div class="row">
                                <div class="col-md-12">
                                    <br>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label"> Tipo <span class="symbol required"></span> </label>
                                            <div class="clip-radio radio-primary">
                                                <input type="radio" value="0" name="Tit_Tipo" id="Tit_TipoNO" />
                                                <label style="margin-right: 0px !important;" for="Tit_TipoNO">Normal</label>
                                                <input type="radio" value="1" name="Tit_Tipo" id="Tit_TipoPA" />
                                                <label style="margin-right: 0px !important;" for="Tit_TipoPA">Profesional Asociado</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Modalidad <span class="symbol required"></span></label>
                                            <select class="js-example-basic-single js-states form-control SeTituModa" name="SeTituModa" id="SeTituModa" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vTituModa as $vTM)
                                                    <option value="{{ $vTM->PK_TitModalidad }}">{{ $vTM->TMo_Nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Departamento <span class="symbol required"></span></label>
                                            <select class="js-example-basic-single js-states form-control SeDepartamento" name="SeDepartamento" id="SeDepartamento" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vDepa as $vD)
                                                    <option value="{{ $vD->PK_Departamento }}">{{ $vD->Dep_Nombre }} ({{ $vD->Dep_Abreviatura }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label> Alumno <span class="symbol required"></span></label>
                                            <select class="js-example-basic-single js-states form-control SeAlumno" name="SeAlumno" id="SeAlumno" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vAlum as $vA)
                                                    <option value="{{ $vA->PK_Alumno }}">{{ $vA->Alu_Nombre }} {{ $vA->Alu_Paterno }} {{ $vA->Alu_Materno }} {{ $vA->Alu_Matricula }} ({{ $vA->Car_Nombre }}) </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Profesional Asociado <span class="symbol required"></span></label>
                                            <select class="js-example-basic-single js-states form-control SeProfAsoc" name="SeProfAsoc" id="SeProfAsoc" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vProfAsoc as $vPA)
                                                    <option value="{{ $vPA->PK_ProfAsoc }}">{{ $vPA->PAs_Nombre }} ({{ $vPA->PAs_ClaveDGP }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label"> Folio <span class="symbol required"></span></label>
                                            <input type="text" placeholder="UIET/REC/CDT07/2014" class="form-control" id="TeTit_NumOficio" name="TeTit_NumOficio">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Director <span class="symbol required"></span></label>
                                            <select class="js-example-basic-single js-states form-control SePer_Director" name="SePer_Director" id="SePer_Director" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vPers as $vP)
                                                    <option value="{{ $vP->PK_Personal }}">{{ $vP->Per_Nombre }} {{ $vP->Per_Paterno }} {{ $vP->Per_Materno }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label"> Fecha Registro <span class="symbol required"></span></label>
                                            <p class="input-group input-append datepicker date">
                                                <input type="text" class="form-control" name="TeTit_FecRegistro" id="TeTit_FecRegistro" />
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default">
                                                        <i class="glyphicon glyphicon-calendar"></i>
                                                    </button>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div>
                                            <span class="symbol required"></span>Campos Requeridos
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <button onclick="funPersonalAGuardarA()" class="btn btn-primary btn-wide pull-right">
                                            Guardar <i class="fa fa-save"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

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

@stop

@section('customScript')

    <script src="{{ asset('/bower_components/jquery.maskedinput/dist/jquery.maskedinput.min.js?v=1') }}"></script>
    <script src="{{ asset('/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js?v=1') }}"></script>
    <script src="{{ asset('/bower_components/autosize/dist/autosize.min.js?v=1') }}"></script>
    <script src="{{ asset('/bower_components/select2/dist/js/select2.min.js?v=1') }}"></script>
    <script src="{{ asset('/bower_components/spectrum/spectrum.js?v=1') }}"></script>
    <script src="{{ asset('/bower_components/bb-jquery-validation/dist/jquery.validate.js?v=3') }}"></script>
    <script src="{{ asset('/bower_components/sweetalert/dist/sweetalert.min.js?v=1') }}"></script>
    <script src="{{ asset('/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min_.js?v=4') }}"></script>
    <script src="{{ asset('/bower_components/bootstrap-timepicker/js/bootstrap-timepicker.js?v=2') }}"></script>

@stop


@section('customScript2')

    <script src="{{ asset('/assets/js/selectFx/classie.js?v=1') }}"></script>
    <script src="{{ asset('/assets/js/selectFx/selectFx.js?v=1') }}"></script>
    <script src="{{ asset('/assets/js/form-validation.js?v=23') }}"></script>
    <script src="{{ asset('/js/Varios/jsSelect.js?v=1') }}"></script>
    <script src="{{ asset('/js/Varios/jsApp.js?v=6') }}"></script>
    <script src="{{ asset('/js/Personal/jsPersonal.js?v=20') }}"></script>
    <script src="{{ asset('/assets/js/form-elements.js?v=9') }}"></script>

    <script>
        jQuery(document).ready(function() {
            Main.init();
            FormElements.init();
            FormValidator.init();
        });
    </script>

@stop