@extends('uiPlantilla')


@section('customTitle')
  {{ $vNomModulo }}
@stop


@section('customHead')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/bower_components/sweetalert/dist/sweetalert.css?v=1') }}">

    <link href="{{ asset('/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.standalone.min.css?v=1') }}" rel="stylesheet" media="screen">

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
                <a href="{{ url('/Esta_RH_INEGI') }}">
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
                                    <label> Periodo </label>
                                    <div class="input-group input-daterange datepicker">
                                        <input type="text" class="form-control" id="TeFecInicio" name="TeFecInicio" />
                                        <span class="input-group-addon bg-primary">a</span>
                                        <input type="text" class="form-control" id="TeFecFin" name="TeFecFin" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-wide" onclick="funGenRH_INEGI()">
                                        <i class="fa fa-bar-chart"></i>  Generar
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div id="divPanel"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="divTablaContEdad"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="divTablaContNivelEstudio"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop


@section('customScript')
    <script src="{{ asset('/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min_.js?v=4') }}"></script>
    <script src="{{ asset('/bower_components/bootstrap-timepicker/js/bootstrap-timepicker.js?v=2') }}"></script>
    <script src="{{ asset('/bower_components/sweetalert/dist/sweetalert.min.js?v=1') }}"></script>
    <script src="{{ asset('/bower_components/Chart-js/Chart.min.js?v=2') }}"></script>

@stop


@section('customScript2')


    <script src="{{ asset('/js/Varios/jsApp.js?v=4') }}"></script>
    <script src="{{ asset('/js/Estadisticas/jsEstadisticas.js?v=3') }}"></script>
    
    <script>
        jQuery(document).ready(function() {
            Main.init();

            var datePickerHandler = function() {
                $('.datepicker').datepicker({
                    autoclose: true,
                    todayHighlight: true
                });
                $('.format-datepicker').datepicker({
                    format:  "M, d yyyy",
                    todayHighlight: true
                });
            };
            datePickerHandler();
        });
    </script>

@stop