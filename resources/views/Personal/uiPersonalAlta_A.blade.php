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
                <a href="{{ url('/Personal') }}">
                    <i class="fa fa-user margin-right-5 text-large text-dark"></i>
                    Personal
                </a>
            </li>
            <li>
                <a href="{{ url('/Personal_Alta_A') }}">
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
                        <hr />
                        <form action="#" role="form0" id="form0">
                            <input type="hidden" id="HiPK_Personal" name="HiPK_Personal" value="-99" />

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel-heading">
                                        <h5 class="panel-title text-bold">I) Datos Generales</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-12" style="background:#E7E7E9;">
                                        <div class="form-group">
                                            <br />
                                            <label class="text-bold"> A. Generales </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <br>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Nombre Completo <span class="symbol required"></span> </label>
                                            <input type="text" placeholder="Francisco Gabriel" class="form-control" id="TePer_Nombre" name="TePer_Nombre">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Apellido Paterno <span class="symbol required"></span> </label>
                                            <input type="text" placeholder="Álvarez" class="form-control" id="TePer_Paterno" name="TePer_Paterno">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Apellido Materno <span class="symbol required"></span></label>
                                            <input type="text" placeholder="Alcaraz" class="form-control" id="TePer_Materno" name="TePer_Materno">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Genero <span class="symbol required"></span> </label>
                                            <div class="clip-radio radio-primary">
                                                <input type="radio" value="0" name="RaPer_Sexo" id="RaPer_SexoFem" />
                                                <label style="margin-right: 0px !important;" for="RaPer_SexoFem">Femenino</label>
                                                <input type="radio" value="1" name="RaPer_Sexo" id="RaPer_SexoMas" />
                                                <label style="margin-right: 0px !important;" for="RaPer_SexoMas">Masculino</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> CURP <span class="symbol required"></span></label>
                                            <input type="text" placeholder="AAAF910710HCSLLR02" class="form-control" id="TePer_CURP" name="TePer_CURP">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> RFC <span class="symbol required"></span></label>
                                            <input type="text" placeholder="AAAF9107106I4" class="form-control" id="TePer_RFC" name="TePer_RFC">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Estado Civil <span class="symbol required"></span></label>
                                            <select class="js-example-basic-single js-states form-control SeEstaCivil" name="SeEstaCivil" id="SeEstaCivil" style="width: 100% !important">
                                                    <option value="x1" disabled selected>Seleccionar</option>
                                                    @foreach($vEstaCivil as $vE)
                                                        <option value="{{ $vE->PK_EstaCivil }}">{{ $vE->ECi_Nombre }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Fecha Nacimiento <span class="symbol required"></span></label>
                                                <input type="text" class="form-control datepicker" name="TePer_FecNacimiento" id="TePer_FecNacimiento" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <br />
                                            <label class="text-bold"> Lugar de Nacimiento </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3" id="divSePais">
                                        <div class="form-group">
                                            <label class="control-label"> Pais <span class="symbol required"></span></label>
                                            <select class="js-example-basic-single js-states form-control SePais" name="SePais" id="SePais" style="width: 100% !important" onchange="funSeEntidad()">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vPais as $vP)
                                                    <option value="{{ $vP->PK_Pais }}">{{ $vP->Pai_NombreCorto }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" id="divSeEntidad">
                                        <div class="form-group">
                                            <label> Entidad Federativa <span class="symbol required"></span></label>
                                            <select class="js-example-basic-single js-states form-control SeEntidad" name="SeEntidad" id="SeEntidad" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" id="divSeMunicipio">
                                        <div class="form-group">
                                            <label> Municipio <span class="symbol required"></span></label>
                                            <select class="js-example-basic-single js-states form-control SeMunicipio" name="SeMunicipio" id="SeMunicipio" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" id="divSeLocalidad">
                                        <div class="form-group">
                                            <label class="control-label"> Localidad <span class="symbol required"></span></label>
                                            <select class="js-example-basic-single js-states form-control SeLocalidad" name="SeLocalidad" id="SeLocalidad" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <br />
                                            <label class="text-bold"> Domicilio Actual</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"> Calle </label>
                                            <input type="text" placeholder="Jacinto Ticoman" class="form-control" id="TePer_DA_Calle" name="TePer_DA_Calle">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Número Exterior</label>
                                            <input type="text" placeholder="1" class="form-control" id="TePer_DA_NumExt" name="TePer_DA_NumExt">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Número Interior</label>
                                            <input type="text" placeholder="1" class="form-control" id="TePer_DA_NumInt" name="TePer_DA_NumInt">
                                        </div>
                                    </div>
                                    <div class="col-md-3" id="divSePais2">
                                        <div class="form-group">
                                            <label class="control-label"> Pais <span class="symbol required"></span></label>
                                            <select class="js-example-basic-single js-states form-control SePais2" name="SePais2" id="SePais2" style="width: 100% !important" onchange="funSeEntidad2()">
                                                    <option value="x1" disabled selected>Seleccionar</option>
                                                    @foreach($vPais as $vP)
                                                        <option value="{{ $vP->PK_Pais }}">{{ $vP->Pai_NombreCorto }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" id="divSeEntidad2">
                                        <div class="form-group">
                                            <label> Entidad Federativa <span class="symbol required"></span></label>
                                            <select class="js-example-basic-single js-states form-control SeEntidad2" name="SeEntidad2" id="SeEntidad2" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" id="divSeMunicipio2">
                                        <div class="form-group">
                                            <label> Municipio <span class="symbol required"></span></label>
                                            <select class="js-example-basic-single js-states form-control SeMunicipio2" name="SeMunicipio2" id="SeMunicipio2" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" id="divSeLocalidad2">
                                        <div class="form-group">
                                            <label class="control-label"> Localidad <span class="symbol required"></span></label>
                                            <select class="js-example-basic-single js-states form-control SeLocalidad2" name="SeLocalidad2" id="SeLocalidad2" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-12" style="background:#E7E7E9;">
                                        <label class="text-bold labmargin"> Contacto </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <br>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Correo Electrónico <span class="symbol required"></span></label>
                                            <input type="email" placeholder="frank.alvarez@gmail.com" class="form-control" id="TePer_Correo" name="TePer_Correo" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Celular </label>
                                            <input type="text" placeholder="(993) 436-7727" class="form-control" id="TePer_Celular" name="TePer_Celular" /> 
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Teléfono </label>
                                            <input type="text" placeholder="(993) 353-2474" class="form-control" id="TePer_Telefono" name="TePer_Telefono" /> 
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-12" style="background:#E7E7E9;">
                                        <label class="text-bold labmargin"> Folios </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <br>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Número IMSS </label>
                                            <input type="text" placeholder="01139145682" class="form-control" id="TePer_NSS" name="TePer_NSS" />
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Crédito INFONAVIT </label>
                                            <input type="text" placeholder="01139145682" class="form-control" id="TePer_CredInfonavit" name="TePer_CredInfonavit">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Crédito FONACOT </label>
                                            <input type="text" placeholder="01139145682" class="form-control" id="TePer_CredFonacot" name="TePer_CredFonacot">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <hr />
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-12" style="background:#E7E7E9;">
                                        <div class="form-group">
                                            <br />
                                            <label class="text-bold"> B. Contratación </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <br>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Sede </label>
                                            <select class="js-example-basic-single js-states form-control SeSede" name="SeSede" id="SeSede" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vSede as $vS)
                                                    <option value="{{ $vS->PK_Sede }}">{{ $vS->Sed_Nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Superior Jerárquico </label>
                                            <select class="js-example-basic-single js-states form-control SeSuperiorJerarquico" name="SeSuperiorJerarquico" id="SeSuperiorJerarquico" style="width: 100% !important" onchange="funSeDepartamento()">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vSuperior as $vSup)
                                                    <option value="{{ $vSup->PK_SupeJerarquico }}">{{ $vSup->SJe_Nombre }} ({{ $vSup->SJe_Abreviatura }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="divSeDepartamento">
                                        <div class="form-group">
                                            <label> Departamento </label>
                                            <select class="js-example-basic-single js-states form-control SeDepartamento" name="SeDepartamento" id="SeDepartamento" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Categoría </label>
                                            <select class="js-example-basic-single js-states form-control SeCategoria" name="SeCategoria" id="SeCategoria" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vCatePuesto as $vC)
                                                    <option value="{{ $vC->PK_CatePuesto }}">{{ $vC->CPu_Nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Puesto </label>
                                            <select class="js-example-basic-single js-states form-control SePuesto" name="SePuesto" id="SePuesto" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vPuesto as $vP)
                                                    <option value="{{ $vP->PK_Puesto }}">{{ $vP->Pue_Nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Tipo de Contrato </label>
                                            <select class="js-example-basic-single js-states form-control SeTipoContrato" name="SeTipoContrato" id="SeTipoContrato" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vTipoContrato as $vTC)
                                                    <option value="{{ $vTC->PK_TipoContrato }}">{{ $vTC->TCo_Nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Área Formación </label>
                                            <select class="js-example-basic-single js-states form-control SeAreaFormacion" name="SeAreaFormacion" id="SeAreaFormacion" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vAreaFormacion as $vAF)
                                                    <option value="{{ $vAF->PK_AreaFormacion }}">{{ $vAF->AFo_Nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label"> Fecha Ingreso  </label>
                                                <input type="text" class="form-control datepicker" id="TePer_FecIngreso" name="TePer_FecIngreso"/>                                 
                                        </div>
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
                                    <button onclick="funPersonalAGuardarA()" class="btn btn-primary btn-wide pull-right">
                                        Siguiente <i class="fa fa-arrow-right"></i>
                                    </button>
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
    <script src="{{ asset('/assets/js/form-validation.js?v=9') }}"></script>
    <script src="{{ asset('/js/Varios/jsSelect.js?v=1') }}"></script>
    <script src="{{ asset('/js/Varios/jsApp.js?v=6') }}"></script>
    <script src="{{ asset('/js/Personal/jsPersonal.js?v=125') }}"></script>
    <script src="{{ asset('/assets/js/form-elements.js?v=9') }}"></script>

    <script>
        jQuery(document).ready(function() {
            Main.init();
            FormElements.init();
            FormValidator.init();
        });
    </script>

@stop