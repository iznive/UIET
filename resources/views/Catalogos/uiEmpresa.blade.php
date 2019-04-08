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
                <a href="#">
                    <i class="fa fa-user margin-right-5 text-large text-dark"></i>
                    Catálogos
                </a>
            </li>
            <li>
                <a href="{{ url('/Empresa') }}">
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
                        <div class="tabbable">
                            <ul id="myTab1" class="nav nav-tabs">
                                <li class="active">
                                    <a href="#myTab1_example1" data-toggle="tab"> Consulta </a>
                                </li>
                                <li>
                                    <a href="#myTab1_example2" data-toggle="tab"> Editar </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="myTab1_example1">
                                        <p>
                                            Información de la empresa.
                                        </p>
                                        <hr>
                                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>RFC</th>
                                                    <th>Nombre</th>
                                                    <th>Dirección</th>
                                                    <th>Página Web</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $x = 1;
                                                ?>
                                                @foreach($vEmpresa as $vEmp)
                                                    <tr id="tr_{{$vEmp->PK_Empresa}}">
                                                        <td class="text-bold">
                                                            {{ $x++ }}
                                                        </td>
                                                        <td class="text-bold">
                                                            {{ $vEmp->Emp_RFC }}
                                                        </td>
                                                        <td class="text-bold">
                                                            {{ $vEmp->Emp_Nombre }}
                                                        </td>
                                                        <td>
                                                            {{ $vEmp->Emp_Direccion }}
                                                        </td>
                                                        <td>
                                                            {{ $vEmp->Emp_Web }}
                                                        </td>
                                                        <td>
                                                            <table>
                                                                <tr>
                                                                    <th>
                                                                        <button onclick="funEmpresaEditarForm({{$vEmp->PK_Empresa}})" href="#myTab1_example2" class="btn search-button show-tab" data-toggle="tooltip" title="Editar">
                                                                            <i class="fa fa-edit"></i>
                                                                        </button>
                                                                    </th>
                                                                    <th>&nbsp;</th>
                                                                    <th>
                                                                        <button onclick="funBitacora('t_empresa', {{$vEmp->PK_Empresa}})" data-toggle="modal" data-target=".Mod_Bitacora"  class="btn search-button" data-toggle="tooltip" title="Bitacora">
                                                                            <i class="fa fa-list-ol"></i>
                                                                        </button>
                                                                    </th>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                </div>

                                <div class="tab-pane fade" id="myTab1_example2">
                                    <form action="#" role="form" id="form" name="form">
                                        <input type="hidden" id="HiPK_Empresa" name="HiPK_Empresa" value="-99">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label"> RFC <span class="symbol required"></span> </label>
                                                    <input type="text" placeholder="" class="form-control" id="TeEmp_RFC" name="TeEmp_RFC" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label"> Nombre <span class="symbol required"></span> </label>
                                                    <input type="text" placeholder="" class="form-control" id="TeEmp_Nombre" name="TeEmp_Nombre" />
                                                </div>
                                            </div>             
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label"> Direccion <span class="symbol required"></span> </label>
                                                    <textarea type="text" placeholder="" class="form-control" id="TeEmp_Direccion" name="TeEmp_Direccion" /></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label"> Pagina Web <span class="symbol required"></span> </label>
                                                    <input type="text" placeholder=" " class="form-control" id="TeEmp_Web" name="TeEmp_Web" />
                                                </div>
                                            </div>             
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div>
                                                    <span class="symbol required"></span>Campos Requeridos
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <button onclick="funEmpresaGuardar()" class="btn btn-primary btn-wide pull-right">
                                                    Guardar <i class="fa fa-save"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="divPanel"></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
    <script src="{{ asset('/bower_components/bb-jquery-validation/dist/jquery.validate.js?v=4') }}"></script>
    <script src="{{ asset('/bower_components/sweetalert/dist/sweetalert.min.js?v=1') }}"></script>
    <script src="{{ asset('/bower_components/DataTables/media/js/jquery.dataTables.min.js?v=5') }}"></script>
    <script src="{{ asset('/bower_components/DataTables/media/js/dataTables.bootstrap.min.js?v=1') }}"></script>

@stop


@section('customScript2')

    <script src="{{ asset('/assets/js/selectFx/classie.js?v=1') }}"></script>
    <script src="{{ asset('/assets/js/selectFx/selectFx.js?v=1') }}"></script>
    <script src="{{ asset('/assets/js/form-validation.js?v=10') }}"></script>
    <script src="{{ asset('/assets/js/table-data.js?v=7') }}"></script>
    <script src="{{ asset('/js/Varios/jsSelect.js?v=1') }}"></script>
    <script src="{{ asset('/js/Varios/jsApp.js?v=2') }}"></script>
    <script src="{{ asset('/js/Catalogos/jsEmpresa.js?v=1') }}"></script>

    <script>
        jQuery(document).ready(function() {
            Main.init();
            FormElements.init();
            FormValidator.init();
            TableData.init();
        });
    </script>

@stop