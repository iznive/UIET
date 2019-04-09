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
                <a href="/Personal_ConsultarForm/{{ $vPK_Personal }}">
                    <i class="fa fa-search-plus margin-right-5 text-large text-dark"></i>
                    Consultar
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
                            <input type="hidden" id="HiPK_Personal" name="HiPK_Personal" value="{{ $vPK_Personal }}" />

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
                                <div class="col-md-12 margin-top-20">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Nombre Completo </label>
                                            <input type="text" disabled value="{{ $vPer_Nombre }}" class="form-control" id="TePer_Nombre" name="TePer_Nombre">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Apellido Paterno </label>
                                            <input type="text" disabled value="{{ $vPer_Paterno }}" class="form-control" id="TePer_Paterno" name="TePer_Paterno">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Apellido Materno </label>
                                            <input type="text" disabled value="{{ $vPer_Materno }}" class="form-control" id="TePer_Materno" name="TePer_Materno">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Genero </label>
                                            <div class="clip-radio radio-primary">
                                                <input disabled type="radio" value="0" name="RaPer_Sexo" id="RaPer_SexoFem" @if ($vPer_Sexo == 0) checked @endif />
                                                <label style="margin-right: 0px !important;" for="RaPer_SexoFem">Femenino</label>
                                                <input disabled type="radio" value="1" name="RaPer_Sexo" id="RaPer_SexoMas" @if ($vPer_Sexo == 1) checked @endif />
                                                <label style="margin-right: 0px !important;" for="RaPer_SexoMas">Masculino</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> CURP </label>
                                            <input type="text" disabled value="{{ $vPer_CURP }}" class="form-control" id="TePer_CURP" name="TePer_CURP">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> RFC </label>
                                            <input type="text" disabled value="{{ $vPer_RFC }}" class="form-control" id="TePer_RFC" name="TePer_RFC">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Estado Civil </label>
                                            <select disabled class="js-example-basic-single js-states form-control SeEstaCivil" name="SeEstaCivil" id="SeEstaCivil" style="width: 100% !important">
                                                    <option value="x1" disabled selected>Seleccionar</option>
                                                    @foreach($vEstaCivil as $vE)
                                                        @if ($vFK_EstaCivil == $vE->PK_EstaCivil)
                                                            <option selected value="{{ $vE->PK_EstaCivil }}">{{ $vE->ECi_Nombre }}</option>
                                                        @else
                                                            <option value="{{ $vE->PK_EstaCivil }}">{{ $vE->ECi_Nombre }}</option>
                                                        @endif
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Fecha Nacimiento </label>
                                                <input disabled type="text" value="{{ $vPer_FecNacimiento }}" class="form-control datepicker" name="TePer_FecNacimiento" id="TePer_FecNacimiento" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="text-bold"> Lugar de Nacimiento </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3" id="divSePais">
                                        <div class="form-group">
                                            <label class="control-label"> Pais </label>
                                            <select disabled class="js-example-basic-single js-states form-control SePais" name="SePais" id="SePais" style="width: 100% !important" onchange="funSeEntidad()">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vPais as $vP)
                                                    @if ($vENA_PK_Pais == $vP->PK_Pais)
                                                        <option selected value="{{ $vP->PK_Pais }}">{{ $vP->Pai_NombreCorto }}</option>
                                                    @else
                                                        <option value="{{ $vP->PK_Pais }}">{{ $vP->Pai_NombreCorto }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" id="divSeEntidad">
                                        <div class="form-group">
                                            <label> Entidad Federativa </label>
                                            <select disabled class="js-example-basic-single js-states form-control SeEntidad" name="SeEntidad" id="SeEntidad" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vEntidadNA as $vENA)
                                                    @if ($vENA_PK_Entidad == $vENA->PK_Entidad )
                                                        <option selected value="{{ $vENA->PK_Entidad }}">{{ $vENA->EFe_Nombre }}</option>
                                                    @else
                                                        <option value="{{ $vENA->PK_Entidad }}">{{ $vENA->EFe_Nombre }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" id="divSeMunicipio">
                                        <div class="form-group">
                                            <label> Municipio </label>
                                            <select disabled class="js-example-basic-single js-states form-control SeMunicipio" name="SeMunicipio" id="SeMunicipio" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vMunicipioNA as $vMNA)
                                                    @if ($vMNA_PK_Municipio == $vMNA->PK_Municipio)
                                                        <option selected value="{{ $vMNA->PK_Municipio }}">{{ $vMNA->Mun_Nombre }}</option>
                                                    @else
                                                        <option value="{{ $vMNA->PK_Municipio }}">{{ $vMNA->Mun_Nombre }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" id="divSeLocalidad">
                                        <div class="form-group">
                                            <label class="control-label"> Localidad </label>
                                            <select disabled class="js-example-basic-single js-states form-control SeLocalidad" name="SeLocalidad" id="SeLocalidad" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vLocalidadNA as $vLNA)
                                                    @if ($vLNA_PK_Localidad == $vLNA->PK_Localidad)
                                                        <option selected value="{{ $vLNA->PK_Localidad }}">{{ $vLNA->Loc_Nombre }}</option>
                                                    @else
                                                        <option value="{{ $vLNA->PK_Localidad }}">{{ $vLNA->Loc_Nombre }}</option>
                                                    @endif
                                                @endforeach
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
                                            <input disabled type="text" value="{{ $vPer_DA_Calle }}" class="form-control" id="TePer_DA_Calle" name="TePer_DA_Calle">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Número Exterior</label>
                                            <input disabled type="text" value="{{ $vPer_DA_NumExt }}" class="form-control" id="TePer_DA_NumExt" name="TePer_DA_NumExt">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Número Interior</label>
                                            <input disabled type="text" value="{{ $vPer_DA_NumInt }}" class="form-control" id="TePer_DA_NumInt" name="TePer_DA_NumInt">
                                        </div>
                                    </div>
                                    <div class="col-md-3" id="divSePais2">
                                        <div class="form-group">
                                            <label class="control-label"> Pais </label>
                                            <select disabled class="js-example-basic-single js-states form-control SePais2" name="SePais2" id="SePais2" style="width: 100% !important" onchange="funSeEntidad2()">
                                                    <option value="x1" disabled selected>Seleccionar</option>
                                                    @foreach($vPais as $vPDA)
                                                        @if ($vEDA_PK_Pais == $vPDA->PK_Pais)
                                                            <option selected value="{{ $vPDA->PK_Pais }}">{{ $vPDA->Pai_NombreCorto }}</option>
                                                        @else
                                                            <option value="{{ $vPDA->PK_Pais }}">{{ $vPDA->Pai_NombreCorto }}</option>
                                                        @endif
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" id="divSeEntidad2">
                                        <div class="form-group">
                                            <label> Entidad Federativa </label>
                                            <select disabled class="js-example-basic-single js-states form-control SeEntidad2" name="SeEntidad2" id="SeEntidad2" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vEntidadDA as $vEDA)
                                                    @if ($vEDA_PK_Entidad == $vEDA->PK_Entidad )
                                                        <option selected value="{{ $vEDA->PK_Entidad }}">{{ $vEDA->EFe_Nombre }}</option>
                                                    @else
                                                        <option value="{{ $vEDA->PK_Entidad }}">{{ $vEDA->EFe_Nombre }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" id="divSeMunicipio2">
                                        <div class="form-group">
                                            <label> Municipio </label>
                                            <select disabled class="js-example-basic-single js-states form-control SeMunicipio2" name="SeMunicipio2" id="SeMunicipio2" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vMunicipioDA as $vMDA)
                                                    @if ($vMDA_PK_Municipio == $vMDA->PK_Municipio)
                                                        <option selected value="{{ $vMDA->PK_Municipio }}">{{ $vMDA->Mun_Nombre }}</option>
                                                    @else
                                                        <option value="{{ $vMDA->PK_Municipio }}">{{ $vMDA->Mun_Nombre }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" id="divSeLocalidad2">
                                        <div class="form-group">
                                            <label class="control-label"> Localidad </label>
                                            <select disabled class="js-example-basic-single js-states form-control SeLocalidad2" name="SeLocalidad2" id="SeLocalidad2" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vLocalidadDA as $vLDA)
                                                    @if ($vLDA_PK_Localidad == $vLDA->PK_Localidad)
                                                        <option selected value="{{ $vLDA->PK_Localidad }}">{{ $vLDA->Loc_Nombre }}</option>
                                                    @else
                                                        <option value="{{ $vLDA->PK_Localidad }}">{{ $vLDA->Loc_Nombre }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-12" style="background:#E7E7E9;">
                                        <label class="text-bold labmargin"> Contacto </label>
                                    </div>
                                </div>

                                <div class="col-md-12 margin-top-20">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Correo Electrónico </label>
                                            <input disabled type="email" value="{{ $vPer_Correo }}" class="form-control" id="TePer_Correo" name="TePer_Correo" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Celular </label>
                                            <input disabled type="text" value="{{ $vPer_Celular }}" class="form-control" id="TePer_Celular" name="TePer_Celular" /> 
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Teléfono </label>
                                            <input disabled type="text" value="{{ $vPer_Telefono }}" class="form-control" id="TePer_Telefono" name="TePer_Telefono" /> 
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-12" style="background:#E7E7E9;">
                                        <label class="text-bold labmargin"> Folios </label>
                                    </div>
                                </div>

                                <div class="col-md-12 margin-top-20">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Número IMSS </label>
                                            <input disabled type="text" value="{{ $vPer_NSS }}" class="form-control" id="TePer_NSS" name="TePer_NSS" />
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Crédito INFONAVIT </label>
                                            <input disabled type="text" value="{{ $vPer_CredInfonavit }}" class="form-control" id="TePer_CredInfonavit" name="TePer_CredInfonavit">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label"> Crédito FONACOT </label>
                                            <input disabled type="text" value="{{ $vPer_CredFonacot }}" class="form-control" id="TePer_CredFonacot" name="TePer_CredFonacot">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-12" style="background:#E7E7E9;">
                                        <div class="form-group">
                                            <br />
                                            <label class="text-bold"> B. Contratación </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 margin-top-20">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Sede </label>
                                            <select disabled class="js-example-basic-single js-states form-control SeSede" name="SeSede" id="SeSede" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vSede as $vS)
                                                    @if ($vFK_Sede == $vS->PK_Sede)
                                                        <option selected value="{{ $vS->PK_Sede }}">{{ $vS->Sed_Nombre }}</option>
                                                    @else
                                                        <option value="{{ $vS->PK_Sede }}">{{ $vS->Sed_Nombre }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Superior Jerárquico </label>
                                            <select disabled class="js-example-basic-single js-states form-control SeSuperiorJerarquico" name="SeSuperiorJerarquico" id="SeSuperiorJerarquico" style="width: 100% !important" onchange="funSeDepartamento()">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vSuperior as $vSup)
                                                    @if ($vFK_SupeJerarquico == $vSup->PK_SupeJerarquico)
                                                        <option selected value="{{ $vSup->PK_SupeJerarquico }}">{{ $vSup->SJe_Nombre }} ({{ $vSup->SJe_Abreviatura }})</option>
                                                    @else
                                                        <option value="{{ $vSup->PK_SupeJerarquico }}">{{ $vSup->SJe_Nombre }} ({{ $vSup->SJe_Abreviatura }})</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4" id="divSeDepartamento">
                                        <div class="form-group">
                                            <label> Departamento </label>
                                            <select disabled class="js-example-basic-single js-states form-control SeDepartamento" name="SeDepartamento" id="SeDepartamento" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vDepartamento as $vDep)
                                                    @if ($vFK_Departamento == $vDep->PK_Departamento)
                                                        <option selected value="{{ $vDep->PK_Departamento }}">{{ $vDep->Dep_Nombre }} ({{ $vDep->Dep_Abreviatura }})</option>
                                                    @else
                                                        <option value="{{ $vDep->PK_Departamento }}">{{ $vDep->Dep_Nombre }} ({{ $vDep->Dep_Abreviatura }})</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Categoría </label>
                                            <select disabled class="js-example-basic-single js-states form-control SeCategoria" name="SeCategoria" id="SeCategoria" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vCatePuesto as $vC)
                                                    @if ($vFK_CatePuesto == $vC->PK_CatePuesto)
                                                        <option selected value="{{ $vC->PK_CatePuesto }}">{{ $vC->CPu_Nombre }}</option>
                                                    @else
                                                        <option value="{{ $vC->PK_CatePuesto }}">{{ $vC->CPu_Nombre }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Puesto </label>
                                            <select disabled class="js-example-basic-single js-states form-control SePuesto" name="SePuesto" id="SePuesto" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vPuesto as $vP)
                                                    @if ($vFK_Puesto == $vP->PK_Puesto)
                                                        <option selected value="{{ $vP->PK_Puesto }}">{{ $vP->Pue_Nombre }}</option>
                                                    @else
                                                        <option value="{{ $vP->PK_Puesto }}">{{ $vP->Pue_Nombre }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Tipo de Contrato </label>
                                            <select disabled class="js-example-basic-single js-states form-control SeTipoContrato" name="SeTipoContrato" id="SeTipoContrato" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vTipoContrato as $vTC)
                                                    @if ($vFK_TipoContrato == $vTC->PK_TipoContrato)
                                                        <option selected value="{{ $vTC->PK_TipoContrato }}">{{ $vTC->TCo_Nombre }}</option>
                                                    @else
                                                        <option value="{{ $vTC->PK_TipoContrato }}">{{ $vTC->TCo_Nombre }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Área Formación </label>
                                            <select disabled class="js-example-basic-single js-states form-control SeAreaFormacion" name="SeAreaFormacion" id="SeAreaFormacion" style="width: 100% !important">
                                                <option value="x1" disabled selected>Seleccionar</option>
                                                @foreach($vAreaFormacion as $vAF)
                                                    @if ($vFK_AreaFormacion == $vAF->PK_AreaFormacion)
                                                        <option selected value="{{ $vAF->PK_AreaFormacion }}">{{ $vAF->AFo_Nombre }}</option>
                                                    @else
                                                        <option value="{{ $vAF->PK_AreaFormacion }}">{{ $vAF->AFo_Nombre }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label"> Fecha Ingreso  </label>
                                            <input disabled type="text" value="{{ $vPer_FecIngreso }}" class="form-control datepicker" id="TePer_FecIngreso" name="TePer_FecIngreso"/>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </form>

                        <div class="row">
                            <div class="col-md-12">
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

                     
                            <div class="col-md-12 margin-top-20">
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

                            <div class="col-md-12 margin-top-20">
                                <div id="divTabPFP">
                                </div>
                                <hr />
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12" style="background:#E7E7E9;">
                                    <label class="text-bold labmargin"> 2. Postgrados </label>  <label> Especialización, Maestría y Doctorado </label>
                                </div>
                            </div>
                        
                            <div class="col-md-12 margin-top-20">
                                <div id="divTabPPo">
                                </div>
                                <hr />
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12" style="background:#E7E7E9;">
                                    <label class="text-bold labmargin"> 2.1. Trabajos de tesis </label>
                                </div>
                            </div>

                     
                            <div class="col-md-12 margin-top-20">
                                <div id="divTabPTe">
                                </div>
                                <hr />
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12" style="background:#E7E7E9;">
                                    <label class="text-bold labmargin"> 3. Formación complementaria  </label> <label> Otros estudios (Artes, Deportes, Gastronomía, etc.) </label>
                                </div>
                            </div>

                 

                            <div class="col-md-12 margin-top-20">
                                <div id="divTabPFC">
                                </div>
                                <hr />
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12" style="background:#E7E7E9;">
                                    <label class="text-bold labmargin"> 3.1 Conocimiento de lenguas nacionales y extranjeras  </label>
                                </div>
                            </div>

                  

                            <div class="col-md-12 margin-top-20">
                                <div id="divTabPLe">
                                </div>
                                <hr />
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12" style="background:#E7E7E9;">
                                        <label class="text-bold labmargin"> 3.2 Conocimiento de computación </label>
                                </div>
                            </div>

                 

                            <div class="col-md-12 margin-top-20">
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

                    

                            <div class="col-md-12 margin-top-20">
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

                            <div class="col-md-12 margin-top-20">
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


                            <div class="col-md-12 margin-top-20">
                                <div id="divTabPED">
                                </div>
                                <hr />
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12" style="background:#E7E7E9;">
                                    <label class="text-bold labmargin"> 2. Asesoría de Tesis</label>
                                </div>
                            </div>


                            <div class="col-md-12 margin-top-20">
                                <div id="divTabPAT">
                                </div>
                                <hr />
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12" style="background:#E7E7E9;">
                                    <label class="text-bold labmargin"> 3. Experiencias innovadoras en la docencia</label> <label>Estrategias de enseñanza-aprendizaje, materiales educativos, de apoyo a la docencia y de vinculación escuela-comunidad</label>
                                </div>
                            </div>

            
                            <div class="col-md-12 margin-top-20">
                                <div id="divTabPEI">
                                </div>
                                <hr />
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12" style="background:#E7E7E9;">
                                    <label class="text-bold labmargin"> 4. Cursos y/o talleres impartidos </label>
                                </div>
                            </div>
         
                            <div class="col-md-12 margin-top-20">
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

                            <div class="col-md-12 margin-top-20">
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

                            <div class="col-md-12 margin-top-20">
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

                            <div class="col-md-12 margin-top-20">
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

                            <div class="col-md-12 margin-top-20">
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
                       
                            <div class="col-md-12 margin-top-20">
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

                            <div class="col-md-12 margin-top-20">
                                <div id="divTabPDI">
                                </div>
                                <hr />
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

    <script src="{{ asset('/assets/js/selectFx/classie.js?v=9') }}"></script>
    <script src="{{ asset('/assets/js/selectFx/selectFx.js?v=9') }}"></script>
    <script src="{{ asset('/assets/js/form-validation.js?v=946') }}"></script>
    <script src="{{ asset('/js/Varios/jsSelect.js?v=9') }}"></script>
    <script src="{{ asset('/js/Varios/jsApp.js?v=454') }}"></script>
    <script src="{{ asset('/js/Personal/jsPersonal.js?v=4545') }}"></script>
    <script src="{{ asset('/assets/js/form-elements.js?v=9') }}"></script>

    <script>
        jQuery(document).ready(function() {
            Main.init();
            FormElements.init();
            FormValidator.init();

            funPersonal_FormacionBasicaConsultar({{ $vPK_Personal }}, 0);
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
