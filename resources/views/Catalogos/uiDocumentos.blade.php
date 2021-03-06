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
                <a href="{{ url('/Documentos') }}">
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
                                    <a href="#myTab1_example2" data-toggle="tab"> Registro </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="myTab1_example1">
                                      
                                        <a href="#myTab1_example2" class="btn btn-primary btn-o show-tab pull-right" data-toggle="tooltip" title="Crear Nuevo Documento"> 
                                            <i class="fa fa-plus"></i> Nuevo Documento
                                        </a>
                                        <p>
                                            Información de los Documentos.
                                        </p>
                                        <hr>
                                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Clasificación</th>
                                                    <th>Nombre</th>
                                                    <th>Indicación</th>
                                                    <th>Nivel de requerimiento</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $x = 1;
                                                ?>
                                                @foreach($vDocumentos as $vDoc)
                                                    <tr id="tr_{{$vDoc->PK_Documentos}}">
                                                        <td class="text-bold">
                                                            {{ $x++ }}
                                                        </td>
                                                        <td class="text-bold">
                                                            {{ $vDoc->DCl_Nombre }}
                                                        </td>
                                                        <td>
                                                            {{ $vDoc->Doc_Nombre}}
                                                        </td>
                                                        <td>
                                                            {{ $vDoc->Doc_Indicacion}}
                                                        </td>
                                                        <td>
                                                            {{ $vDoc->NivelReq_Nombre_Def}}
                                                        </td>
                                                      
                                                        <td>
                                                            <table>
                                                                <tr>
                                                                    <th>
                                                                        <button onclick="funDocumentosEditarForm({{$vDoc->PK_Documentos}})" href="#myTab1_example2" class="btn search-button show-tab" data-toggle="tooltip" title="Editar">
                                                                            <i class="fa fa-edit"></i>
                                                                        </button>
                                                                    </th>
                                                                    <th>&nbsp;</th>
                                                                    <th>
                                                                        <button onclick="funDocumentosEliminar({{$vDoc->PK_Documentos}})"  class="btn search-button" data-toggle="tooltip" title="Eliminar">
                                                                            <i class="fa fa-trash"></i>
                                                                        </button>
                                                                    </th>
                                                                    <th>&nbsp;</th>
                                                                    <th>
                                                                        <button onclick="funBitacora('t_documentos', {{$vDoc->PK_Documentos}})" data-toggle="modal" data-target=".Mod_Bitacora"  class="btn search-button" data-toggle="tooltip" title="Bitacora">
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
                                        <input type="hidden" id="HiPK_Documentos" name="HiPK_Documentos" value="-99">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label"> Nombre del Documento <span class="symbol required"></span> </label>
                                                    <input type="text" placeholder="Acta" class="form-control" id="TeDoc_Nombre" name="TeDoc_Nombre" />
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="divSeClasificacion">
                                                <div class="form-group">
                                                    <label class="control-label"> Clasificación <span class="symbol required"></span></label>
                                                    <select class="js-example-basic-single js-states form-control SeClasificacion" name="SeClasificacion" id="SeClasificacion" style="width: 100% !important">
                                                        <option value="x1" disabled selected>Seleccionar</option>
                                                        @foreach($vFK_DocuClasificacion as $vCla)
                                                            <option value="{{ $vCla->PK_DocuClasificacion }}">{{ $vCla->DCl_Nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label"> Indicación <span class="symbol required"></span> </label>
                                                    <textarea type="text" placeholder=" " class="form-control" id="TeDoc_Indicacion" name="TeDoc_Indicacion"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="DivSeNivelRequerimiento">
                                                <div class="form-group">
                                                    <label class="control-label"> Nivel de requerimiento <span class="symbol required"></span></label>
                                                    <select class="js-example-basic-single js-states form-control SeNivelRequerimiento" name="SeNivelRequerimiento" id="SeNivelRequerimiento" style="width: 100% !important">
                                                        <option value="x1" disabled selected>Seleccionar</option>
                                                        @foreach($vFK_NivelReq as $vN)
                                                            <option value="{{ $vN->PK_NivelReq }}">{{ $vN->NivelReq_Nombre }}</option>
                                                        @endforeach
                                                    </select>       
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"> Observación </label>
                                                    <textarea type="text" placeholder=" " class="form-control" id="TeAObservacion_Documentos" name="TeAObservacion_Documentos"></textarea>
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
                                                <button onclick="funDocumentosGuardar()" class="btn btn-primary btn-wide pull-right">
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
    <script src="{{ asset('/js/Catalogos/jsDocumentos.js?v=1') }}"></script>

    <script>
        jQuery(document).ready(function() {
            Main.init();
            FormElements.init();
            FormValidator.init();
            TableData.init();
        });
    </script>

@stop