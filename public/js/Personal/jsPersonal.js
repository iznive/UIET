function funPersonalAGuardarA() {
    var _token = $("input[name='_token']").val();
    var vPK_Personal = document.getElementById("HiPK_Personal").value;
    var vFK_EstaCivil = document.getElementById("SeEstaCivil").value;
    var vFK_LocalidadNac = document.getElementById("SeLocalidad").value;
    var vFK_LocalidadDA = document.getElementById("SeLocalidad2").value;
    var vPer_Nombre = document.getElementById("TePer_Nombre").value;
    var vPer_Paterno = document.getElementById("TePer_Paterno").value;
    var vPer_Materno = document.getElementById("TePer_Materno").value;
    var vPer_CURP = document.getElementById("TePer_CURP").value;
    var vPer_RFC = document.getElementById("TePer_RFC").value;
    var vPer_NSS = document.getElementById("TePer_NSS").value;
    var vPer_CredInfonavit = document.getElementById("TePer_CredInfonavit").value;
    var vPer_CredFonacot = document.getElementById("TePer_CredFonacot").value;
    var vPer_Sexo = $('input:radio[name=RaPer_Sexo]:checked').val();
    var vPer_FecNacimiento = document.getElementById("TePer_FecNacimiento").value;
    var vPer_Correo = document.getElementById("TePer_Correo").value;
    var vPer_Telefono = document.getElementById("TePer_Telefono").value;
    var vPer_Celular = document.getElementById("TePer_Celular").value;
    var vPer_FecIngreso = document.getElementById("TePer_FecIngreso").value;
    var vPer_DA_Calle = document.getElementById("TePer_DA_Calle").value;
    var vPer_DA_NumExt = document.getElementById("TePer_DA_NumExt").value;
    var vPer_DA_NumInt = document.getElementById("TePer_DA_NumInt").value;

    var vFK_Sede = document.getElementById("SeSede").value;
    var vFK_SupeJerarquico = document.getElementById("SeSuperiorJerarquico").value;
    var vFK_Departamento = document.getElementById("SeDepartamento").value;
    var vFK_CatePuesto = document.getElementById("SeCategoria").value;
    var vFK_Puesto = document.getElementById("SePuesto").value;
    var vFK_TipoContrato = document.getElementById("SeTipoContrato").value;

    var vFK_AreaFormacion = document.getElementById("SeAreaFormacion").value;


    if (vFK_Sede == '' || vFK_Sede == 'x1') {
        vFK_Sede = 0;
    }

    if (vFK_SupeJerarquico == '' || vFK_SupeJerarquico == 'x1') {
        vFK_SupeJerarquico = 0;
    }

    if (vFK_Departamento == '' || vFK_Departamento == 'x1') {
        vFK_Departamento = 0;
    }

    if (vFK_CatePuesto == '' || vFK_CatePuesto == 'x1') {
        vFK_CatePuesto = 0;
    }

    if (vFK_Puesto == '' || vFK_Puesto == 'x1') {
        vFK_Puesto = 0;
    }

    if (vFK_TipoContrato == '' || vFK_TipoContrato == 'x1') {
        vFK_TipoContrato = 0;
    }

    if (vFK_AreaFormacion == '' || vFK_AreaFormacion == 'x1') {
        vFK_AreaFormacion = 0;
    }

    if (vPer_Sexo === undefined || vPer_Nombre == '' || vPer_Nombre.length > 50 || vPer_Paterno == '' || vPer_Paterno.length > 50 || vPer_Materno == '' || vPer_Materno.length > 50 || vPer_CURP == '' || vPer_CURP.length != 18 || vPer_RFC == '' || vPer_RFC.length > 15 || vPer_Sexo == '' || vPer_FecNacimiento == '' || vPer_Correo == '' || vFK_LocalidadNac == '' || vFK_LocalidadNac == 'x1' || vFK_LocalidadDA == '' || vFK_LocalidadDA == 'x1' || vFK_EstaCivil == '' || vFK_EstaCivil == 'x1') {
        return false;
    }



    vPer_FecNacimiento = vPer_FecNacimiento.split("/").reverse().join("-");
    vPer_FecIngreso = vPer_FecIngreso.split("/").reverse().join("-");

    swal({
        title: "¿Realmente desea guardar el registro?",
        text: 'Si se encuentra seguro haga click en "Si, Continuar", de lo contrario haga click en "No, Cancelar"',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#58748B",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "No, Cancelar"
    }, function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '/PersonalGuardar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_Personal: vPK_Personal,
                    pFK_Sede: vFK_Sede,
                    pFK_SupeJerarquico: vFK_SupeJerarquico,
                    pFK_Departamento: vFK_Departamento,
                    pFK_CatePuesto: vFK_CatePuesto,
                    pFK_Puesto: vFK_Puesto,
                    pFK_TipoContrato: vFK_TipoContrato,
                    pFK_EstaCivil: vFK_EstaCivil,
                    pFK_LocalidadNac: vFK_LocalidadNac,
                    pFK_LocalidadDA: vFK_LocalidadDA,
                    pPer_Nombre: vPer_Nombre,
                    pPer_Paterno: vPer_Paterno,
                    pPer_Materno: vPer_Materno,
                    pPer_CURP: vPer_CURP,
                    pPer_RFC: vPer_RFC,
                    pPer_NSS: vPer_NSS,
                    pPer_CredInfonavit: vPer_CredInfonavit,
                    pPer_CredFonacot: vPer_CredFonacot,
                    pPer_Sexo: vPer_Sexo,
                    pPer_FecNacimiento: vPer_FecNacimiento,
                    pPer_Correo: vPer_Correo,
                    pPer_Telefono: vPer_Telefono,
                    pPer_Celular: vPer_Celular,
                    pPer_FecIngreso: vPer_FecIngreso,
                    pPer_DA_Calle: vPer_DA_Calle,
                    pPer_DA_NumExt: vPer_DA_NumExt,
                    pPer_DA_NumInt: vPer_DA_NumInt,
                    pFK_AreaFormacion: vFK_AreaFormacion
                },
                beforeSend: function() {
                    funBefore();
                },
                success: function(data) {
                    funBeforeClear();
                    if (data.pPK_Personal == 'CURP') {
                        swal("Notificación", data.Msj, data.TMsj);
                    } else {
                        swal("Notificación", data.Msj, data.TMsj);
                        if (vPK_Personal == -99) {
                            setTimeout("location.href='/Personal_Alta_B/" + data.pPK_Personal + "';", 500);
                        } else {
                            setTimeout("location.href='/Personal';", 500);
                        }
                    }

                },
                error: function(data) {
                    funError();
                }
            });
        } else {
            console.log("Proceso Cancelado");
        }
    });
}

function funSeDepartamento() {
    var _token = $("input[name='_token']").val();
    var vPK_SupeJerarquico = document.getElementById("SeSuperiorJerarquico").value;

    $.ajax({
        url: '/SeDepartamento',
        type: 'POST',
        data: {
            _token: _token,
            pPK_SupeJerarquico: vPK_SupeJerarquico
        },

        beforeSend: function() {
            funBefore();
        },
        success: function(data) {
            funBeforeClear();
            document.getElementById("divSeDepartamento").innerHTML = data.pSeDepartamento;
            FormElements.init();
        },
        error: function(data) {
            funError();
        }
    });
}



function funSeLengua() {
    var _token = $("input[name='_token']").val();
    var vLenTipo = document.getElementById("SeLenTipo").value;

    $.ajax({
        url: '/SeLengua',
        type: 'POST',
        data: {
            _token: _token,
            pLenTipo: vLenTipo
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            funBeforeClear();
            document.getElementById("divSeLengua").innerHTML = data.pSeLengua;
            FormElements.init();
            funLen_Nombre();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funLen_Nombre() {
    var _token = $("input[name='_token']").val();
    var vLengua = document.getElementById("SeLengua").value;

    document.getElementById("TeLen_Nombre").value = "";

    if (vLengua == 1000 || vLengua == 3000) {
        document.getElementById("TeLen_Nombre").removeAttribute("disabled");
    } else {
        document.getElementById("TeLen_Nombre").setAttribute("disabled", "disabled");
    }

}





/*
 * Formación Basica
 */
function funPersonal_FormacionBasicaGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_PersFB = document.getElementById("HiPK_PersFB").value;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;
    var vNivelEducativo = document.getElementById("SeNivelEducativo").value;
    var vPFB_Instituto = document.getElementById("TePFB_Instituto").value;
    var vPFB_PeriodoInicio = document.getElementById("TePFB_PeriodoInicio").value;
    var vPFB_PeriodoFin = document.getElementById("TePFB_PeriodoFin").value;
    var vPFB_Promedio = document.getElementById("TePFB_Promedio").value;

    var vAnoActual = new Date().getFullYear();

    if (document.getElementById("ChPFB_UG").checked == true) {
        var vPFB_UG = 1;
    } else {
        var vPFB_UG = 0;
    }

    if (vNivelEducativo == '' || vNivelEducativo == 'x1' || vPFB_Instituto == '' || vPFB_PeriodoInicio == '' || vPFB_PeriodoFin == '') {
        return false;
    }

    if (vPFB_PeriodoInicio > vAnoActual || vPFB_PeriodoFin > vAnoActual || vPFB_PeriodoInicio < "1900" || vPFB_PeriodoFin < "1900") {
        swal("Notificación", "Revisar Periodo", "warning");
        return false;
    }

    $.ajax({
        url: '/Personal_FormacionBasicaGuardar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_PersFB: vPK_PersFB,
            pPK_Personal: vPK_Personal,
            pNivelEducativo: vNivelEducativo,
            pPFB_Instituto: vPFB_Instituto,
            pPFB_PeriodoInicio: vPFB_PeriodoInicio,
            pPFB_PeriodoFin: vPFB_PeriodoFin,
            pPFB_Promedio: vPFB_Promedio,
            pPFB_UG: vPFB_UG
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPFB").innerHTML = data.pTabPFB;

            document.getElementById("HiPK_PersFB").value = -99;
            document.getElementById("SeNivelEducativo").value = 'x1';
            document.getElementById("TePFB_Instituto").value = '';
            document.getElementById("TePFB_PeriodoInicio").value = '';
            document.getElementById("TePFB_PeriodoFin").value = '';
            document.getElementById("TePFB_Promedio").value = 0.00;
            document.getElementById("ChPFB_UG").checked = false;
            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_FormacionBasicaConsultar(pPK_Personal) {
    var _token = $("input[name='_token']").val();
    var vPK_Personal = pPK_Personal;

    $.ajax({
        url: '/Personal_FormacionBasicaConsultar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_Personal: vPK_Personal
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPFB").innerHTML = data.pTabPFB;
            funBeforeClear();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_FormacionBasicaEliminar(pPK_PersFB) {
    var _token = $("input[name='_token']").val();
    var vPK_PersFB = pPK_PersFB;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    swal({
        title: "¿Realmente desea eliminar el registro?",
        text: 'Si se encuentra seguro haga click en "Si, Continuar", de lo contrario haga click en "No, Cancelar"',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#58748B",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "No, Cancelar"
    }, function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '/Personal_FormacionBasicaEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_PersFB: vPK_PersFB,
                    pPK_Personal: vPK_Personal
                },
                beforeSend: function() {
                    funBefore2();
                },
                success: function(data) {
                    document.getElementById("divTabPFB").innerHTML = data.pTabPFB;
                },
                error: function(data) {
                    funError2();
                }
            });
        } else {
            console.log("Proceso Cancelado");
        }
    });

}

function funPersonal_FormacionBasicaEditarForm(pPK_PersFB) {
    var _token = $("input[name='_token']").val();
    var vPK_PersFB = pPK_PersFB;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    $.ajax({
        url: '/Personal_FormacionBasicaEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_PersFB: vPK_PersFB,
            pPK_Personal: vPK_Personal
        },
        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            funBeforeClear();
            document.getElementById("HiPK_PersFB").value = data.pPK_PersFB;
            document.getElementById("TePFB_Instituto").value = data.pPFB_Instituto;
            document.getElementById("TePFB_PeriodoInicio").value = data.pPFB_PeriodoInicio;
            document.getElementById("TePFB_PeriodoFin").value = data.pPFB_PeriodoFin;
            document.getElementById("TePFB_Promedio").value = data.pPFB_Promedio;
            document.getElementById("SeNivelEducativo").value = data.pPK_FormBasica;

            var vPFB_UG = data.pPFB_UG;
            if (vPFB_UG == 1) {
                document.getElementById("ChPFB_UG").checked = true;
            } else {
                document.getElementById("ChPFB_UG").checked = false;
            }

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}



/*
 * Formación Profesional
 */
function funPersonal_FormacionProfesionalGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_PersFP = document.getElementById("HiPK_PersFP").value;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;
    var vPFP_Tipo = document.getElementById("SePFB_Tipo").value;
    var vPFP_Instituto = document.getElementById("TePFP_Instituto").value;
    var vPFP_Estudio = document.getElementById("TePFP_Estudio").value;
    var vPFP_CedulaProfesional = document.getElementById("TePFP_CedulaProfesional").value;
    var vPFP_PeriodoInicio = document.getElementById("TePFP_PeriodoInicio").value;
    var vPFP_PeriodoFin = document.getElementById("TePFP_PeriodoFin").value;
    var vPFP_Promedio = document.getElementById("TePFP_Promedio").value;

    if (document.getElementById("ChPFP_UG").checked == true) {
        var vPFP_UG = 1;
    } else {
        var vPFP_UG = 0;
    }

    if (vPFP_Tipo == '' || vPFP_Tipo == 'x1' || vPFP_Instituto == '' || vPFP_Estudio == '' || vPFP_PeriodoInicio == '' || vPFP_PeriodoFin == '' || vPFP_Promedio == '') {
        return false;
    }

    $.ajax({
        url: '/Personal_FormacionProfesionalGuardar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_PersFP: vPK_PersFP,
            pPK_Personal: vPK_Personal,
            pPFP_Tipo: vPFP_Tipo,
            pPFP_Instituto: vPFP_Instituto,
            pPFP_Estudio: vPFP_Estudio,
            pPFP_CedulaProfesional: vPFP_CedulaProfesional,
            pPFP_PeriodoInicio: vPFP_PeriodoInicio,
            pPFP_PeriodoFin: vPFP_PeriodoFin,
            pPFP_Promedio: vPFP_Promedio,
            pPFP_UG: vPFP_UG
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPFP").innerHTML = data.pTabPFP;

            document.getElementById("HiPK_PersFP").value = -99;
            document.getElementById("SePFB_Tipo").value = 'x1';
            document.getElementById("TePFP_Instituto").value = '';
            document.getElementById("TePFP_Estudio").value = '';
            document.getElementById("TePFP_CedulaProfesional").value = '';
            document.getElementById("TePFP_PeriodoInicio").value = '';
            document.getElementById("TePFP_PeriodoFin").value = '';
            document.getElementById("TePFP_Promedio").value = 0.00;
            document.getElementById("ChPFP_UG").checked = false;
            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_FormacionProfesionalConsultar(pPK_Personal) {
    var _token = $("input[name='_token']").val();
    var vPK_Personal = pPK_Personal;

    $.ajax({
        url: '/Personal_FormacionProfesionalConsultar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_Personal: vPK_Personal
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPFP").innerHTML = data.pTabPFP;
            funBeforeClear();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_FormacionProfesionalEliminar(pPK_PersFP) {
    var _token = $("input[name='_token']").val();
    var vPK_PersFP = pPK_PersFP;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    swal({
        title: "¿Realmente desea eliminar el registro?",
        text: 'Si se encuentra seguro haga click en "Si, Continuar", de lo contrario haga click en "No, Cancelar"',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#58748B",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "No, Cancelar"
    }, function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '/Personal_FormacionProfesionalEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_PersFP: vPK_PersFP,
                    pPK_Personal: vPK_Personal
                },
                beforeSend: function() {
                    funBefore2();
                },
                success: function(data) {
                    document.getElementById("divTabPFP").innerHTML = data.pTabPFP;
                },
                error: function(data) {
                    funError2();
                }
            });
        } else {
            console.log("Proceso Cancelado");
        }
    });

}

function funPersonal_FormacionProfesionalEditarForm(pPK_PersFP) {
    var _token = $("input[name='_token']").val();
    var vPK_PersFP = pPK_PersFP;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    $.ajax({
        url: '/Personal_FormacionProfesionalEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_PersFP: vPK_PersFP,
            pPK_Personal: vPK_Personal
        },
        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            funBeforeClear();

            document.getElementById("HiPK_PersFP").value = data.pPK_PersFP;
            document.getElementById("SePFB_Tipo").value = data.pPFP_Tipo;
            document.getElementById("TePFP_Instituto").value = data.pPFP_Instituto;
            document.getElementById("TePFP_Estudio").value = data.pPFP_Estudio;
            document.getElementById("TePFP_CedulaProfesional").value = data.pPFP_CedulaProfesional;
            document.getElementById("TePFP_PeriodoInicio").value = data.pPFP_PeriodoInicio;
            document.getElementById("TePFP_PeriodoFin").value = data.pPFP_PeriodoFin;
            document.getElementById("TePFP_Promedio").value = data.pPFP_Promedio;

            var vPFP_UG = data.pPFP_UG;
            if (vPFP_UG == 1) {
                document.getElementById("ChPFP_UG").checked = true;
            } else {
                document.getElementById("ChPFP_UG").checked = false;
            }

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}



/*
 * Formación Postgrados
 */
function funPersonal_FormacionPostgradosGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_PerPos = document.getElementById("HiPK_PerPos").value;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;
    var vPostTipo = document.getElementById("SePostTipo").value;
    var vPostSituacion = document.getElementById("SePostSituacion").value;
    var vPPo_Instituto = document.getElementById("TePPo_Instituto").value;
    var vPPo_Nombre = document.getElementById("TePPo_Nombre").value;
    var vPPo_CedulaProfesional = document.getElementById("TePPo_CedulaProfesional").value;
    var vPPo_PeriodoInicio = document.getElementById("TePPo_PeriodoInicio").value;
    var vPPo_PeriodoFin = document.getElementById("TePPo_PeriodoFin").value;

    if (document.getElementById("ChPPo_UG").checked == true) {
        var vPPo_UG = 1;
    } else {
        var vPPo_UG = 0;
    }

    if (vPostTipo == '' || vPostTipo == 'x1' || vPostSituacion == '' || vPostSituacion == 'x1' || vPPo_Instituto == '' || vPPo_Instituto == '' || vPPo_Nombre == '' || vPPo_Nombre == '' || vPPo_PeriodoInicio == '' || vPPo_PeriodoFin == '') {
        return false;
    }

    $.ajax({
        url: '/Personal_FormacionPostgradosGuardar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_PerPos: vPK_PerPos,
            pPK_Personal: vPK_Personal,
            pPostTipo: vPostTipo,
            pPostSituacion: vPostSituacion,
            pPPo_Instituto: vPPo_Instituto,
            pPPo_Nombre: vPPo_Nombre,
            pPPo_CedulaProfesional: vPPo_CedulaProfesional,
            pPPo_PeriodoInicio: vPPo_PeriodoInicio,
            pPPo_PeriodoFin: vPPo_PeriodoFin,
            pPPo_UG: vPPo_UG
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPPo").innerHTML = data.pTabPPo;

            document.getElementById("HiPK_PerPos").value = -99;
            document.getElementById("SePostTipo").value = 'x1';
            document.getElementById("SePostSituacion").value = 'x1';
            document.getElementById("TePPo_Instituto").value = '';
            document.getElementById("TePPo_Nombre").value = '';
            document.getElementById("TePPo_CedulaProfesional").value = '';
            document.getElementById("TePPo_PeriodoInicio").value = '';
            document.getElementById("TePPo_PeriodoFin").value = '';
            document.getElementById("ChPPo_UG").checked = false;
            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_FormacionPostgradosConsultar(pPK_Personal) {
    var _token = $("input[name='_token']").val();
    var vPK_Personal = pPK_Personal;

    $.ajax({
        url: '/Personal_FormacionPostgradosConsultar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_Personal: vPK_Personal
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPPo").innerHTML = data.pTabPPo;
            funBeforeClear();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_FormacionPostgradosEliminar(pPK_PerPos) {
    var _token = $("input[name='_token']").val();
    var vPK_PerPos = pPK_PerPos;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    swal({
        title: "¿Realmente desea eliminar el registro?",
        text: 'Si se encuentra seguro haga click en "Si, Continuar", de lo contrario haga click en "No, Cancelar"',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#58748B",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "No, Cancelar"
    }, function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '/Personal_FormacionPostgradosEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_PerPos: vPK_PerPos,
                    pPK_Personal: vPK_Personal
                },
                beforeSend: function() {
                    funBefore2();
                },
                success: function(data) {
                    document.getElementById("divTabPPo").innerHTML = data.pTabPPo;
                },
                error: function(data) {
                    funError2();
                }
            });
        } else {
            console.log("Proceso Cancelado");
        }
    });
}

function funPersonal_FormacionPostgradosEditarForm(pPK_PerPos) {
    var _token = $("input[name='_token']").val();
    var vPK_PerPos = pPK_PerPos;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    $.ajax({
        url: '/Personal_FormacionPostgradosEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_PerPos: vPK_PerPos,
            pPK_Personal: vPK_Personal
        },
        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            funBeforeClear();

            document.getElementById("HiPK_PerPos").value = data.pPK_PerPos;
            document.getElementById("SePostTipo").value = data.pPK_PostTipo;
            document.getElementById("SePostSituacion").value = data.pPK_PostSituacion;
            document.getElementById("TePPo_Instituto").value = data.pPPo_Instituto;
            document.getElementById("TePPo_Nombre").value = data.pPPo_Nombre;
            document.getElementById("TePPo_CedulaProfesional").value = data.pPPo_CedulaProfesional;
            document.getElementById("TePPo_PeriodoInicio").value = data.pPPo_PeriodoInicio;
            document.getElementById("TePPo_PeriodoFin").value = data.pPPo_PeriodoFin;

            var vPPo_UG = data.pPPo_UG;
            if (vPPo_UG == 1) {
                document.getElementById("ChPPo_UG").checked = true;
            } else {
                document.getElementById("ChPPo_UG").checked = false;
            }

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}



/*
 * Tesis
 */
function funPersonal_TesisGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_PerTes = document.getElementById("HiPK_PerTes").value;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;
    var vPTe_Titulo = document.getElementById("TePTe_Titulo").value;
    var vPTe_Instituto = document.getElementById("TePTe_Instituto").value;
    var vPTe_PeriodoInicio = document.getElementById("TePTe_PeriodoInicio").value;
    var vPTe_PeriodoFin = document.getElementById("TePTe_PeriodoFin").value;
    var vPTe_GradoObtenido = document.getElementById("TePTe_GradoObtenido").value;

    if (vPTe_Titulo == '' || vPTe_Instituto == '' || vPTe_PeriodoInicio == '' || vPTe_PeriodoFin == '' || vPTe_GradoObtenido == '') {
        return false;
    }

    $.ajax({
        url: '/Personal_TesisGuardar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_PerTes: vPK_PerTes,
            pPK_Personal: vPK_Personal,
            pPTe_Titulo: vPTe_Titulo,
            pPTe_Instituto: vPTe_Instituto,
            pPTe_PeriodoInicio: vPTe_PeriodoInicio,
            pPTe_PeriodoFin: vPTe_PeriodoFin,
            pPTe_GradoObtenido: vPTe_GradoObtenido
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPTe").innerHTML = data.pTabPTe;

            document.getElementById("HiPK_PerTes").value = -99;
            document.getElementById("TePTe_Titulo").value = '';
            document.getElementById("TePTe_Instituto").value = '';
            document.getElementById("TePTe_PeriodoInicio").value = '';
            document.getElementById("TePTe_PeriodoFin").value = '';
            document.getElementById("TePTe_GradoObtenido").value = '';

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_TesisConsultar(pPK_Personal) {
    var _token = $("input[name='_token']").val();
    var vPK_Personal = pPK_Personal;

    $.ajax({
        url: '/Personal_TesisConsultar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_Personal: vPK_Personal
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPTe").innerHTML = data.pTabPTe;
            funBeforeClear();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_TesisEliminar(pPK_PerTes) {
    var _token = $("input[name='_token']").val();
    var vPK_PerTes = pPK_PerTes;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    swal({
        title: "¿Realmente desea eliminar el registro?",
        text: 'Si se encuentra seguro haga click en "Si, Continuar", de lo contrario haga click en "No, Cancelar"',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#58748B",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "No, Cancelar"
    }, function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '/Personal_TesisEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_PerTes: vPK_PerTes,
                    pPK_Personal: vPK_Personal
                },
                beforeSend: function() {
                    funBefore2();
                },
                success: function(data) {
                    document.getElementById("divTabPTe").innerHTML = data.pTabPTe;
                },
                error: function(data) {
                    funError2();
                }
            });
        } else {
            console.log("Proceso Cancelado");
        }
    });

}

function funPersonal_TesisEditarForm(pPK_PerTes) {
    var _token = $("input[name='_token']").val();
    var vPK_PerTes = pPK_PerTes;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    $.ajax({
        url: '/Personal_TesisEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_PerTes: vPK_PerTes,
            pPK_Personal: vPK_Personal
        },
        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            funBeforeClear();

            document.getElementById("HiPK_PerTes").value = data.pPK_PerTes;
            document.getElementById("TePTe_Titulo").value = data.pPTe_Titulo;
            document.getElementById("TePTe_Instituto").value = data.pPTe_Instituto;
            document.getElementById("TePTe_PeriodoInicio").value = data.pPTe_PeriodoInicio;
            document.getElementById("TePTe_PeriodoFin").value = data.pPTe_PeriodoFin;
            document.getElementById("TePTe_GradoObtenido").value = data.pPTe_GradoObtenido;

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}


/*
 * Formación Complementaria
 */
function funPersonal_FormacionComplementariaGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_PerFCo = document.getElementById("HiPK_PerFCo").value;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;
    var vPFC_Instituto = document.getElementById("TePFC_Instituto").value;
    var vPFC_Nombre = document.getElementById("TePFC_Nombre").value;
    var vPFC_Tipo = document.getElementById("TePFC_Tipo").value;
    var vPFC_DocumentoProbatorio = document.getElementById("TePFC_DocumentoProbatorio").value;
    var vPFC_PeriodoInicio = document.getElementById("TePFC_PeriodoInicio").value;
    var vPFC_PeriodoFin = document.getElementById("TePFC_PeriodoFin").value;

    if (vPFC_Instituto == '' || vPFC_Nombre == '' || vPFC_PeriodoInicio == '' || vPFC_PeriodoFin == '') {
        return false;
    }

    $.ajax({
        url: '/Personal_FormacionComplementariaGuardar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_PerFCo: vPK_PerFCo,
            pPK_Personal: vPK_Personal,
            pPFC_Instituto: vPFC_Instituto,
            pPFC_Nombre: vPFC_Nombre,
            pPFC_Tipo: vPFC_Tipo,
            pPFC_DocumentoProbatorio: vPFC_DocumentoProbatorio,
            pPFC_PeriodoInicio: vPFC_PeriodoInicio,
            pPFC_PeriodoFin: vPFC_PeriodoFin
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPFC").innerHTML = data.pTabPFC;

            document.getElementById("HiPK_PerFCo").value = -99;
            document.getElementById("TePFC_Instituto").value = '';
            document.getElementById("TePFC_Nombre").value = '';
            document.getElementById("TePFC_Tipo").value = '';
            document.getElementById("TePFC_DocumentoProbatorio").value = '';
            document.getElementById("TePFC_PeriodoInicio").value = '';
            document.getElementById("TePFC_PeriodoFin").value = '';
            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_FormacionComplementariaConsultar(pPK_Personal) {
    var _token = $("input[name='_token']").val();
    var vPK_Personal = pPK_Personal;

    $.ajax({
        url: '/Personal_FormacionComplementariaConsultar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_Personal: vPK_Personal
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPFC").innerHTML = data.pTabPFC;
            funBeforeClear();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_FormacionComplementariaEliminar(pPK_PerFCo) {
    var _token = $("input[name='_token']").val();
    var vPK_PerFCo = pPK_PerFCo;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    swal({
        title: "¿Realmente desea eliminar el registro?",
        text: 'Si se encuentra seguro haga click en "Si, Continuar", de lo contrario haga click en "No, Cancelar"',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#58748B",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "No, Cancelar"
    }, function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '/Personal_FormacionComplementariaEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_PerFCo: vPK_PerFCo,
                    pPK_Personal: vPK_Personal
                },
                beforeSend: function() {
                    funBefore2();
                },
                success: function(data) {
                    document.getElementById("divTabPFC").innerHTML = data.pTabPFC;
                },
                error: function(data) {
                    funError2();
                }
            });
        } else {
            console.log("Proceso Cancelado");
        }
    });

}

function funPersonal_FormacionComplementariaEditarForm(pPK_PerFCo) {
    var _token = $("input[name='_token']").val();
    var vPK_PerFCo = pPK_PerFCo;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    $.ajax({
        url: '/Personal_FormacionComplementariaEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_PerFCo: vPK_PerFCo,
            pPK_Personal: vPK_Personal
        },
        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            funBeforeClear();

            document.getElementById("HiPK_PerFCo").value = data.pPK_PerFCo;
            document.getElementById("TePFC_Instituto").value = data.pPFC_Instituto;
            document.getElementById("TePFC_Nombre").value = data.pPFC_Nombre;
            document.getElementById("TePFC_Tipo").value = data.pPFC_Tipo;
            document.getElementById("TePFC_DocumentoProbatorio").value = data.pPFC_DocumentoProbatorio;
            document.getElementById("TePFC_PeriodoInicio").value = data.pPFC_PeriodoInicio;
            document.getElementById("TePFC_PeriodoFin").value = data.pPFC_PeriodoFin;

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}



/*
 * Lengua
 */
function funPersonal_LenguaGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_PersLengua = document.getElementById("HiPK_PersLengua").value;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;
    var vLengua = document.getElementById("SeLengua").value;
    var vLen_Nombre = document.getElementById("TeLen_Nombre").value;
    var vHabla = document.getElementById("SeHabla").value;
    var vLee = document.getElementById("SeLee").value;
    var vEscribe = document.getElementById("SeEscribe").value;
    var vComprende = document.getElementById("SeComprende").value;

    if (vLengua == '' || vLengua == 'x1' || vHabla == '' || vHabla == 'x1' || vLee == '' || vLee == 'x1' || vEscribe == '' || vEscribe == 'x1' || vComprende == '' || vComprende == 'x1') {
        return false;
    }

    $.ajax({
        url: '/Personal_LenguaGuardar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_PersLengua: vPK_PersLengua,
            pPK_Personal: vPK_Personal,
            pLengua: vLengua,
            pLen_Nombre: vLen_Nombre,
            pHabla: vHabla,
            pLee: vLee,
            pEscribe: vEscribe,
            pComprende: vComprende
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPLe").innerHTML = data.pTabPLe;

            document.getElementById("HiPK_PersLengua").value = -99;
            document.getElementById("SeLenTipo").value = 'x1';
            document.getElementById("SeLengua").value = 'x1';
            document.getElementById("TeLen_Nombre").value = '';
            document.getElementById("SeHabla").value = 'x1';
            document.getElementById("SeLee").value = 'x1';
            document.getElementById("SeEscribe").value = 'x1';
            document.getElementById("SeComprende").value = 'x1';

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_LenguaConsultar(pPK_Personal) {
    var _token = $("input[name='_token']").val();
    var vPK_Personal = pPK_Personal;

    $.ajax({
        url: '/Personal_LenguaConsultar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_Personal: vPK_Personal
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPLe").innerHTML = data.pTabPLe;
            funBeforeClear();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_LenguaEliminar(pPK_PersLengua) {
    var _token = $("input[name='_token']").val();
    var vPK_PersLengua = pPK_PersLengua;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    swal({
        title: "¿Realmente desea eliminar el registro?",
        text: 'Si se encuentra seguro haga click en "Si, Continuar", de lo contrario haga click en "No, Cancelar"',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#58748B",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "No, Cancelar"
    }, function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '/Personal_LenguaEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_PersLengua: vPK_PersLengua,
                    pPK_Personal: vPK_Personal
                },
                beforeSend: function() {
                    funBefore2();
                },
                success: function(data) {
                    document.getElementById("divTabPLe").innerHTML = data.pTabPLe;
                },
                error: function(data) {
                    funError2();
                }
            });
        } else {
            console.log("Proceso Cancelado");
        }
    });

}

function funPersonal_LenguaEditarForm(pPK_PersLengua) {
    var _token = $("input[name='_token']").val();
    var vPK_PersLengua = pPK_PersLengua;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    $.ajax({
        url: '/Personal_LenguaEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_PersLengua: vPK_PersLengua,
            pPK_Personal: vPK_Personal
        },
        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            funBeforeClear();

            document.getElementById("HiPK_PersLengua").value = data.pPK_PersLengua;
            document.getElementById("SeLenTipo").value = data.pLen_Tipo;
            document.getElementById("divSeLengua").innerHTML = data.pSeLengua;
            document.getElementById("TeLen_Nombre").value = '';
            document.getElementById("SeHabla").value = data.pPLe_Habla;
            document.getElementById("SeLee").value = data.pPLe_Lee;
            document.getElementById("SeEscribe").value = data.pPLe_Escribe;
            document.getElementById("SeComprende").value = data.pPLe_Comprende;

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}



/*
 * Conocimiento Computo
 */
function funPersonal_ConocimientoComputoGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_PerCCo = document.getElementById("HiPK_PerCCo").value;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;
    var vConoComputo = $("#SeConoComputo").val();
    var vNivel = document.getElementById("SeNivel").value;


    if (vConoComputo == '' || vNivel == '' || vNivel == 'x1') {
        return false;
    }

    $.ajax({
        url: '/Personal_ConocimientoComputoGuardar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_PerCCo: vPK_PerCCo,
            pPK_Personal: vPK_Personal,
            pConoComputo: vConoComputo,
            pNivel: vNivel
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPCC").innerHTML = data.pTabPCC;
            funBeforeClear();

            document.getElementById("HiPK_PerCCo").value = -99;
            document.getElementById("SeConoComputo").value = '';
            document.getElementById("SeNivel").value = 'x1';

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_ConocimientoComputoConsultar(pPK_Personal) {
    var _token = $("input[name='_token']").val();
    var vPK_Personal = pPK_Personal;

    $.ajax({
        url: '/Personal_ConocimientoComputoConsultar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_Personal: vPK_Personal
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPCC").innerHTML = data.pTabPCC;
            funBeforeClear();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_ConocimientoComputoEliminar(pPK_PerCCo) {
    var _token = $("input[name='_token']").val();
    var vPK_PerCCo = pPK_PerCCo;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    swal({
        title: "¿Realmente desea eliminar el registro?",
        text: 'Si se encuentra seguro haga click en "Si, Continuar", de lo contrario haga click en "No, Cancelar"',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#58748B",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "No, Cancelar"
    }, function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '/Personal_ConocimientoComputoEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_PerCCo: vPK_PerCCo,
                    pPK_Personal: vPK_Personal
                },
                beforeSend: function() {
                    funBefore2();
                },
                success: function(data) {
                    document.getElementById("divTabPCC").innerHTML = data.pTabPCC;
                    funBeforeClear();
                },
                error: function(data) {
                    funError2();
                }
            });
        } else {
            console.log("Proceso Cancelado");
        }
    });

}

function funPersonal_ConocimientoComputoEditarForm(pPK_PerCCo) {
    var _token = $("input[name='_token']").val();
    var vPK_PerCCo = pPK_PerCCo;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    $.ajax({
        url: '/Personal_ConocimientoComputoEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_PerCCo: vPK_PerCCo,
            pPK_Personal: vPK_Personal
        },
        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            funBeforeClear();

            document.getElementById("HiPK_PerCCo").value = data.pPK_PerCCo;
            document.getElementById("SeConoComputo").value = data.pPK_ConoComputo;
            document.getElementById("SeNivel").value = data.pCCo_Nivel;

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}



/*
 * Actualización
 */
function funPersonal_ActualizacionGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_PerAct = document.getElementById("HiPK_PerAct").value;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;
    var vPAc_Instituto = document.getElementById("TePAc_Instituto").value;
    var vPAc_Nombre = document.getElementById("TePAc_Nombre").value;
    var vPAc_DuracionHoras = document.getElementById("TePAc_DuracionHoras").value;
    var vPAc_PeriodoInicio = document.getElementById("TePAc_PeriodoInicio").value;
    var vPAc_PeriodoFin = document.getElementById("TePAc_PeriodoFin").value;

    if (vPAc_Instituto == '' || vPAc_Nombre == '' || vPAc_PeriodoInicio == '' || vPAc_PeriodoFin == '') {
        return false;
    }

    if (vPAc_DuracionHoras == '') {
        vPAc_DuracionHoras = 0;
    }

    vPAc_PeriodoInicio = vPAc_PeriodoInicio.split("/").reverse().join("-");
    vPAc_PeriodoFin = vPAc_PeriodoFin.split("/").reverse().join("-");

    $.ajax({
        url: '/Personal_ActualizacionGuardar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_PerAct: vPK_PerAct,
            pPK_Personal: vPK_Personal,
            pPAc_Instituto: vPAc_Instituto,
            pPAc_Nombre: vPAc_Nombre,
            pPAc_DuracionHoras: vPAc_DuracionHoras,
            pPAc_PeriodoInicio: vPAc_PeriodoInicio,
            pPAc_PeriodoFin: vPAc_PeriodoFin
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPAc").innerHTML = data.pTabPAc;
            funBeforeClear();

            document.getElementById("HiPK_PerAct").value = -99;
            document.getElementById("TePAc_Instituto").value = '';
            document.getElementById("TePAc_Nombre").value = '';
            document.getElementById("TePAc_DuracionHoras").value = '';
            document.getElementById("TePAc_PeriodoInicio").value = '';
            document.getElementById("TePAc_PeriodoFin").value = '';

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_ActualizacionConsultar(pPK_Personal) {
    var _token = $("input[name='_token']").val();
    var vPK_Personal = pPK_Personal;

    $.ajax({
        url: '/Personal_ActualizacionConsultar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_Personal: vPK_Personal
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPAc").innerHTML = data.pTabPAc;
            funBeforeClear();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_ActualizacionEliminar(pPK_PerAct) {
    var _token = $("input[name='_token']").val();
    var vPK_PerAct = pPK_PerAct;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    swal({
        title: "¿Realmente desea eliminar el registro?",
        text: 'Si se encuentra seguro haga click en "Si, Continuar", de lo contrario haga click en "No, Cancelar"',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#58748B",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "No, Cancelar"
    }, function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '/Personal_ActualizacionEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_PerAct: vPK_PerAct,
                    pPK_Personal: vPK_Personal
                },
                beforeSend: function() {
                    funBefore2();
                },
                success: function(data) {
                    document.getElementById("divTabPAc").innerHTML = data.pTabPAc;
                    funBeforeClear();
                },
                error: function(data) {
                    funError2();
                }
            });
        } else {
            console.log("Proceso Cancelado");
        }
    });

}

function funPersonal_ActualizacionEditarForm(pPK_PerAct) {
    var _token = $("input[name='_token']").val();
    var vPK_PerAct = pPK_PerAct;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    $.ajax({
        url: '/Personal_ActualizacionEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_PerAct: vPK_PerAct,
            pPK_Personal: vPK_Personal
        },
        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            funBeforeClear();

            document.getElementById("HiPK_PerAct").value = data.pPK_PerAct;
            document.getElementById("TePAc_Instituto").value = data.pPAc_Instituto;
            document.getElementById("TePAc_Nombre").value = data.pPAc_Nombre;
            document.getElementById("TePAc_DuracionHoras").value = data.pPAc_DuracionHoras;

            vPAc_PeriodoInicio = data.pPAc_PeriodoInicio.split("-").reverse().join("/");
            vPAc_PeriodoFin = data.pPAc_PeriodoFin.split("-").reverse().join("/");

            document.getElementById("TePAc_PeriodoInicio").value = vPAc_PeriodoInicio;
            document.getElementById("TePAc_PeriodoFin").value = vPAc_PeriodoFin;

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}



/*
 * Experiencia Profesional Área de Formación
 */
function funPersonal_ExperienciaProfesionalGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_PerEPr = document.getElementById("HiPK_PerEPr").value;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;
    var vEPr_Instituto = document.getElementById("TeEPr_Instituto").value;
    var vEPr_Puesto = document.getElementById("TeEPr_Puesto").value;
    var vEPr_PeriodoInicio = document.getElementById("TeEPr_PeriodoInicio").value;
    var vEPr_PeriodoFin = document.getElementById("TeEPr_PeriodoFin").value;
    var vEPr_Funciones = document.getElementById("TAEPr_Funciones").value;

    if (vEPr_Instituto == '' || vEPr_Puesto == '' || vEPr_PeriodoInicio == '' || vEPr_PeriodoFin == '') {
        return false;
    }

    vEPr_PeriodoInicio = vEPr_PeriodoInicio.split("/").reverse().join("-");
    vEPr_PeriodoFin = vEPr_PeriodoFin.split("/").reverse().join("-");

    $.ajax({
        url: '/Personal_ExperienciaProfesionalGuardar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_PerEPr: vPK_PerEPr,
            pPK_Personal: vPK_Personal,
            pEPr_Instituto: vEPr_Instituto,
            pEPr_Puesto: vEPr_Puesto,
            pEPr_PeriodoInicio: vEPr_PeriodoInicio,
            pEPr_PeriodoFin: vEPr_PeriodoFin,
            pEPr_Funciones: vEPr_Funciones
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPEP").innerHTML = data.pTabPEP;
            funBeforeClear();

            document.getElementById("HiPK_PerEPr").value = -99;
            document.getElementById("TeEPr_Instituto").value = '';
            document.getElementById("TeEPr_Puesto").value = '';
            document.getElementById("TeEPr_PeriodoInicio").value = '';
            document.getElementById("TeEPr_PeriodoFin").value = '';
            document.getElementById("TAEPr_Funciones").value = '';

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_ExperienciaProfesionalConsultar(pPK_Personal) {
    var _token = $("input[name='_token']").val();
    var vPK_Personal = pPK_Personal;

    $.ajax({
        url: '/Personal_ExperienciaProfesionalConsultar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_Personal: vPK_Personal
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPEP").innerHTML = data.pTabPEP;
            funBeforeClear();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_ExperienciaProfesionalEliminar(pPK_PerEPr) {
    var _token = $("input[name='_token']").val();
    var vPK_PerEPr = pPK_PerEPr;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    swal({
        title: "¿Realmente desea eliminar el registro?",
        text: 'Si se encuentra seguro haga click en "Si, Continuar", de lo contrario haga click en "No, Cancelar"',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#58748B",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "No, Cancelar"
    }, function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '/Personal_ExperienciaProfesionalEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_PerEPr: vPK_PerEPr,
                    pPK_Personal: vPK_Personal
                },
                beforeSend: function() {
                    funBefore2();
                },
                success: function(data) {
                    document.getElementById("divTabPEP").innerHTML = data.pTabPEP;
                    funBeforeClear();
                },
                error: function(data) {
                    funError2();
                }
            });
        } else {
            console.log("Proceso Cancelado");
        }
    });

}

function funPersonal_ExperienciaProfesionalEditarForm(pPK_PerEPr) {
    var _token = $("input[name='_token']").val();
    var vPK_PerEPr = pPK_PerEPr;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    $.ajax({
        url: '/Personal_ExperienciaProfesionalEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_PerEPr: vPK_PerEPr,
            pPK_Personal: vPK_Personal
        },
        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            funBeforeClear();

            document.getElementById("HiPK_PerEPr").value = data.pPK_PerEPr;
            document.getElementById("TeEPr_Instituto").value = data.pEPr_Instituto;
            document.getElementById("TeEPr_Puesto").value = data.pEPr_Puesto;
            document.getElementById("TAEPr_Funciones").value = data.pEPr_Funciones;

            var vEPr_PeriodoInicio = data.pEPr_PeriodoInicio.split("-").reverse().join("/");
            var vEPr_PeriodoFin = data.pEPr_PeriodoFin.split("-").reverse().join("/");

            document.getElementById("TeEPr_PeriodoInicio").value = vEPr_PeriodoInicio;
            document.getElementById("TeEPr_PeriodoFin").value = vEPr_PeriodoFin;

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}



/*
 * Experiencia Docente
 */
function funPersonal_ExperienciaDocenteGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_PerEDo = document.getElementById("HiPK_PerEDo").value;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;
    var vPDo_Instituto = document.getElementById("TePDo_Instituto").value;
    var vNivEducativo = document.getElementById("SeNivEducativo").value;
    var vPDo_PeriodoInicio = document.getElementById("TePDo_PeriodoInicio").value;
    var vPDo_PeriodoFin = document.getElementById("TePDo_PeriodoFin").value;
    var vPDo_Asignaturas = document.getElementById("TAPDo_Asignaturas").value;


    if (vPDo_Instituto == '' || vNivEducativo == '' || vPDo_PeriodoInicio == '' || vPDo_PeriodoFin == '') {
        return false;
    }

    vPDo_PeriodoInicio = vPDo_PeriodoInicio.split("/").reverse().join("-");
    vPDo_PeriodoFin = vPDo_PeriodoFin.split("/").reverse().join("-");

    $.ajax({
        url: '/Personal_ExperienciaDocenteGuardar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_PerEDo: vPK_PerEDo,
            pPK_Personal: vPK_Personal,
            pPDo_Instituto: vPDo_Instituto,
            pNivEducativo: vNivEducativo,
            pPDo_PeriodoInicio: vPDo_PeriodoInicio,
            pPDo_PeriodoFin: vPDo_PeriodoFin,
            pPDo_Asignaturas: vPDo_Asignaturas
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPED").innerHTML = data.pTabPED;
            funBeforeClear();

            document.getElementById("HiPK_PerEDo").value = -99;
            document.getElementById("TePDo_Instituto").value = '';
            document.getElementById("SeNivEducativo").value = 'x1';
            document.getElementById("TePDo_PeriodoInicio").value = '';
            document.getElementById("TePDo_PeriodoFin").value = '';
            document.getElementById("TAPDo_Asignaturas").value = '';

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_ExperienciaDocenteConsultar(pPK_Personal) {
    var _token = $("input[name='_token']").val();
    var vPK_Personal = pPK_Personal;

    $.ajax({
        url: '/Personal_ExperienciaDocenteConsultar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_Personal: vPK_Personal
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPED").innerHTML = data.pTabPED;
            funBeforeClear();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_ExperienciaDocenteEliminar(pPK_PerEDo) {
    var _token = $("input[name='_token']").val();
    var vPK_PerEDo = pPK_PerEDo;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    swal({
        title: "¿Realmente desea eliminar el registro?",
        text: 'Si se encuentra seguro haga click en "Si, Continuar", de lo contrario haga click en "No, Cancelar"',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#58748B",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "No, Cancelar"
    }, function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '/Personal_ExperienciaDocenteEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_PerEDo: vPK_PerEDo,
                    pPK_Personal: vPK_Personal
                },
                beforeSend: function() {
                    funBefore2();
                },
                success: function(data) {
                    document.getElementById("divTabPED").innerHTML = data.pTabPED;
                    funBeforeClear();
                },
                error: function(data) {
                    funError2();
                }
            });
        } else {
            console.log("Proceso Cancelado");
        }
    });

}

function funPersonal_ExperienciaDocenteEditarForm(pPK_PerEDo) {
    var _token = $("input[name='_token']").val();
    var vPK_PerEDo = pPK_PerEDo;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    $.ajax({
        url: '/Personal_ExperienciaDocenteEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_PerEDo: vPK_PerEDo,
            pPK_Personal: vPK_Personal
        },
        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            funBeforeClear();

            document.getElementById("HiPK_PerEDo").value = data.pPK_PerEDo;
            document.getElementById("TePDo_Instituto").value = data.pPDo_Instituto;
            document.getElementById("SeNivEducativo").value = data.pPK_NivEducativo;

            var vPDo_PeriodoInicio = data.pPDo_PeriodoInicio.split("-").reverse().join("/");
            var vPDo_PeriodoFin = data.pPDo_PeriodoFin.split("-").reverse().join("/");
            document.getElementById("TePDo_PeriodoInicio").value = vPDo_PeriodoInicio;
            document.getElementById("TePDo_PeriodoFin").value = vPDo_PeriodoFin;

            document.getElementById("TAPDo_Asignaturas").value = data.pPDo_Asignaturas;

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}



/*
 * Asesoria Tesis
 */
function funPersonal_AsesoriaTesisGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_PerATe = document.getElementById("HiPK_PerATe").value;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;
    var vPAT_Instituto = document.getElementById("TePAT_Instituto").value;
    var vPAT_Nombre = document.getElementById("TePAT_Nombre").value;
    var vPAT_CarreraPosgrado = document.getElementById("TePAT_CarreraPosgrado").value;
    var vPAT_PeriodoInicio = document.getElementById("TePAT_PeriodoInicio").value;
    var vPAT_PeriodoFin = document.getElementById("TePAT_PeriodoFin").value;

    if (vPAT_Instituto == '' || vPAT_Nombre == '' || vPAT_CarreraPosgrado == '' || vPAT_PeriodoInicio == '' || vPAT_PeriodoFin == '') {
        return false;
    }

    $.ajax({
        url: '/Personal_AsesoriaTesisGuardar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_PerATe: vPK_PerATe,
            pPK_Personal: vPK_Personal,
            pPAT_Instituto: vPAT_Instituto,
            pPAT_Nombre: vPAT_Nombre,
            pPAT_CarreraPosgrado: vPAT_CarreraPosgrado,
            pPAT_PeriodoInicio: vPAT_PeriodoInicio,
            pPAT_PeriodoFin: vPAT_PeriodoFin
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPAT").innerHTML = data.pTabPAT;
            funBeforeClear();

            document.getElementById("HiPK_PerATe").value = -99;
            document.getElementById("TePAT_Instituto").value = '';
            document.getElementById("TePAT_Nombre").value = '';
            document.getElementById("TePAT_CarreraPosgrado").value = '';
            document.getElementById("TePAT_PeriodoInicio").value = '';
            document.getElementById("TePAT_PeriodoFin").value = '';

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_AsesoriaTesisConsultar(pPK_Personal) {
    var _token = $("input[name='_token']").val();
    var vPK_Personal = pPK_Personal;

    $.ajax({
        url: '/Personal_AsesoriaTesisConsultar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_Personal: vPK_Personal
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPAT").innerHTML = data.pTabPAT;
            funBeforeClear();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_AsesoriaTesisEliminar(pPK_PerATe) {
    var _token = $("input[name='_token']").val();
    var vPK_PerATe = pPK_PerATe;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    swal({
        title: "¿Realmente desea eliminar el registro?",
        text: 'Si se encuentra seguro haga click en "Si, Continuar", de lo contrario haga click en "No, Cancelar"',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#58748B",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "No, Cancelar"
    }, function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '/Personal_AsesoriaTesisEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_PerATe: vPK_PerATe,
                    pPK_Personal: vPK_Personal
                },
                beforeSend: function() {
                    funBefore2();
                },
                success: function(data) {
                    document.getElementById("divTabPAT").innerHTML = data.pTabPAT;
                    funBeforeClear();
                },
                error: function(data) {
                    funError2();
                }
            });
        } else {
            console.log("Proceso Cancelado");
        }
    });

}

function funPersonal_AsesoriaTesisEditarForm(pPK_PerATe) {
    var _token = $("input[name='_token']").val();
    var vPK_PerATe = pPK_PerATe;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    $.ajax({
        url: '/Personal_AsesoriaTesisEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_PerATe: vPK_PerATe,
            pPK_Personal: vPK_Personal
        },
        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            funBeforeClear();

            document.getElementById("HiPK_PerATe").value = data.pPK_PerATe;
            document.getElementById("TePAT_Instituto").value = data.pPAT_Instituto;
            document.getElementById("TePAT_Nombre").value = data.pPAT_Nombre;
            document.getElementById("TePAT_CarreraPosgrado").value = data.pPAT_CarreraPosgrado;
            document.getElementById("TePAT_PeriodoInicio").value = data.pPAT_PeriodoInicio;
            document.getElementById("TePAT_PeriodoFin").value = data.pPAT_PeriodoFin;

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}



/*
 * Experiencia Innovadora
 */
function funPersonal_ExperienciaInnovadoraGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_PerEIn = document.getElementById("HiPK_PerEIn").value;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;
    var vPEI_Instituto = document.getElementById("TePEI_Instituto").value;
    var vPEI_PeriodoInicio = document.getElementById("TePEI_PeriodoInicio").value;
    var vPEI_PeriodoFin = document.getElementById("TePEI_PeriodoFin").value;
    var vPEI_Descripcion = document.getElementById("TAPEI_Descripcion").value;

    if (vPEI_Instituto == '' || vPEI_PeriodoInicio == '' || vPEI_PeriodoFin == '') {
        return false;
    }

    $.ajax({
        url: '/Personal_ExperienciaInnovadoraGuardar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_PerEIn: vPK_PerEIn,
            pPK_Personal: vPK_Personal,
            pPEI_Instituto: vPEI_Instituto,
            pPEI_PeriodoInicio: vPEI_PeriodoInicio,
            pPEI_PeriodoFin: vPEI_PeriodoFin,
            pPEI_Descripcion: vPEI_Descripcion
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPEI").innerHTML = data.pTabPEI;
            funBeforeClear();

            document.getElementById("HiPK_PerEIn").value = -99;
            document.getElementById("TePEI_Instituto").value = '';
            document.getElementById("TePEI_PeriodoInicio").value = '';
            document.getElementById("TePEI_PeriodoFin").value = '';
            document.getElementById("TAPEI_Descripcion").value = '';

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_ExperienciaInnovadoraConsultar(pPK_Personal) {
    var _token = $("input[name='_token']").val();
    var vPK_Personal = pPK_Personal;

    $.ajax({
        url: '/Personal_ExperienciaInnovadoraConsultar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_Personal: vPK_Personal
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPEI").innerHTML = data.pTabPEI;
            funBeforeClear();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_ExperienciaInnovadoraEliminar(pPK_PerEIn) {
    var _token = $("input[name='_token']").val();
    var vPK_PerEIn = pPK_PerEIn;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    swal({
        title: "¿Realmente desea eliminar el registro?",
        text: 'Si se encuentra seguro haga click en "Si, Continuar", de lo contrario haga click en "No, Cancelar"',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#58748B",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "No, Cancelar"
    }, function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '/Personal_ExperienciaInnovadoraEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_PerEIn: vPK_PerEIn,
                    pPK_Personal: vPK_Personal
                },
                beforeSend: function() {
                    funBefore2();
                },
                success: function(data) {
                    document.getElementById("divTabPEI").innerHTML = data.pTabPEI;
                    funBeforeClear();
                },
                error: function(data) {
                    funError2();
                }
            });
        } else {
            console.log("Proceso Cancelado");
        }
    });

}

function funPersonal_ExperienciaInnovadoraEditarForm(pPK_PerEIn) {
    var _token = $("input[name='_token']").val();
    var vPK_PerEIn = pPK_PerEIn;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    $.ajax({
        url: '/Personal_ExperienciaInnovadoraEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_PerEIn: vPK_PerEIn,
            pPK_Personal: vPK_Personal
        },
        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            funBeforeClear();

            document.getElementById("HiPK_PerEIn").value = data.pPK_PerEIn;
            document.getElementById("TePEI_Instituto").value = data.pPEI_Instituto;
            document.getElementById("TePEI_PeriodoInicio").value = data.pPEI_PeriodoInicio;
            document.getElementById("TePEI_PeriodoFin").value = data.pPEI_PeriodoFin;
            document.getElementById("TAPEI_Descripcion").value = data.pPEI_Descripcion;

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}



/*
 * Cursos y/o Talleres Impartidos
 */
function funPersonal_CursoTallerGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_PerCTI = document.getElementById("HiPK_PerCTI").value;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;
    var vPCT_Instituto = document.getElementById("TePCT_Instituto").value;
    var vPCT_Nombre = document.getElementById("TePCT_Nombre").value;
    var vPCT_DuracionHora = document.getElementById("TePCT_DuracionHora").value;
    var vPCT_PeriodoInicio = document.getElementById("TePCT_PeriodoInicio").value;
    var vPCT_PeriodoFin = document.getElementById("TePCT_PeriodoFin").value;


    if (vPCT_Instituto == '' || vPCT_Nombre == '' || vPCT_PeriodoInicio == '' || vPCT_PeriodoFin == '') {
        return false;
    }

    if (vPCT_DuracionHora == '') {
        vPCT_DuracionHora = 0;
    }

    vPCT_PeriodoInicio = vPCT_PeriodoInicio.split("/").reverse().join("-");
    vPCT_PeriodoFin = vPCT_PeriodoFin.split("/").reverse().join("-");

    $.ajax({
        url: '/Personal_CursoTallerGuardar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_PerCTI: vPK_PerCTI,
            pPK_Personal: vPK_Personal,
            pPCT_Instituto: vPCT_Instituto,
            pPCT_Nombre: vPCT_Nombre,
            pPCT_DuracionHora: vPCT_DuracionHora,
            pPCT_PeriodoInicio: vPCT_PeriodoInicio,
            pPCT_PeriodoFin: vPCT_PeriodoFin
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPCT").innerHTML = data.pTabPCT;
            funBeforeClear();

            document.getElementById("HiPK_PerCTI").value = -99;
            document.getElementById("TePCT_Instituto").value = '';
            document.getElementById("TePCT_Nombre").value = '';
            document.getElementById("TePCT_DuracionHora").value = '';
            document.getElementById("TePCT_PeriodoInicio").value = '';
            document.getElementById("TePCT_PeriodoFin").value = '';

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_CursoTallerConsultar(pPK_Personal) {
    var _token = $("input[name='_token']").val();
    var vPK_Personal = pPK_Personal;

    $.ajax({
        url: '/Personal_CursoTallerConsultar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_Personal: vPK_Personal
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPCT").innerHTML = data.pTabPCT;
            funBeforeClear();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_CursoTallerEliminar(pPK_PerCTI) {
    var _token = $("input[name='_token']").val();
    var vPK_PerCTI = pPK_PerCTI;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    swal({
        title: "¿Realmente desea eliminar el registro?",
        text: 'Si se encuentra seguro haga click en "Si, Continuar", de lo contrario haga click en "No, Cancelar"',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#58748B",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "No, Cancelar"
    }, function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '/Personal_CursoTallerEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_PerCTI: vPK_PerCTI,
                    pPK_Personal: vPK_Personal
                },
                beforeSend: function() {
                    funBefore2();
                },
                success: function(data) {
                    document.getElementById("divTabPCT").innerHTML = data.pTabPCT;
                    funBeforeClear();
                },
                error: function(data) {
                    funError2();
                }
            });
        } else {
            console.log("Proceso Cancelado");
        }
    });

}

function funPersonal_CursoTallerEditarForm(pPK_PerCTI) {
    var _token = $("input[name='_token']").val();
    var vPK_PerCTI = pPK_PerCTI;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    $.ajax({
        url: '/Personal_CursoTallerEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_PerCTI: vPK_PerCTI,
            pPK_Personal: vPK_Personal
        },
        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            funBeforeClear();

            document.getElementById("HiPK_PerCTI").value = data.pPK_PerCTI;
            document.getElementById("TePCT_Instituto").value = data.pPCT_Instituto;
            document.getElementById("TePCT_Nombre").value = data.pPCT_Nombre;
            document.getElementById("TePCT_DuracionHora").value = data.pPCT_DuracionHora;

            var vPCT_PeriodoInicio = data.pPCT_PeriodoInicio.split("-").reverse().join("/");
            var vPCT_PeriodoFin = data.pPCT_PeriodoFin.split("-").reverse().join("/");

            document.getElementById("TePCT_PeriodoInicio").value = vPCT_PeriodoInicio;
            document.getElementById("TePCT_PeriodoFin").value = vPCT_PeriodoFin;

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}



/*
 *  Experiencia en Diseño Curricular
 */
function funPersonal_ExperienciaDisenoCurricularGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_PerEDC = document.getElementById("HiPK_PerEDC").value;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;
    var vEDC_Instituto = document.getElementById("TeEDC_Instituto").value;
    var vEDC_Nombre = document.getElementById("TeEDC_Nombre").value;
    var vEDC_PeriodoInicio = document.getElementById("TeEDC_PeriodoInicio").value;
    var vEDC_PeriodoFin = document.getElementById("TeEDC_PeriodoFin").value;
    var vExperienciaDT = document.getElementById("SeExperienciaDT").value;

    if (vEDC_Instituto == '' || vEDC_Nombre == '' || vEDC_PeriodoInicio == '' || vEDC_PeriodoFin == '' || vExperienciaDT == '' || vExperienciaDT == 'x1') {
        return false;
    }

    vEDC_PeriodoInicio = vEDC_PeriodoInicio.split("/").reverse().join("-");
    vEDC_PeriodoFin = vEDC_PeriodoFin.split("/").reverse().join("-");

    $.ajax({
        url: '/Personal_ExperienciaDisenoCurricularGuardar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_PerEDC: vPK_PerEDC,
            pPK_Personal: vPK_Personal,
            pEDC_Instituto: vEDC_Instituto,
            pEDC_Nombre: vEDC_Nombre,
            pEDC_PeriodoInicio: vEDC_PeriodoInicio,
            pEDC_PeriodoFin: vEDC_PeriodoFin,
            pExperienciaDT: vExperienciaDT
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPDC").innerHTML = data.pTabPDC;
            funBeforeClear();

            document.getElementById("HiPK_PerEDC").value = -99;
            document.getElementById("TeEDC_Instituto").value = '';
            document.getElementById("TeEDC_Nombre").value = '';
            document.getElementById("TeEDC_PeriodoInicio").value = '';
            document.getElementById("TeEDC_PeriodoFin").value = '';
            document.getElementById("SeExperienciaDT").value = 'x1';

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_ExperienciaDisenoCurricularConsultar(pPK_Personal) {
    var _token = $("input[name='_token']").val();
    var vPK_Personal = pPK_Personal;

    $.ajax({
        url: '/Personal_ExperienciaDisenoCurricularConsultar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_Personal: vPK_Personal
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPDC").innerHTML = data.pTabPDC;
            funBeforeClear();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_ExperienciaDisenoCurricularEliminar(pPK_PerEDC) {
    var _token = $("input[name='_token']").val();
    var vPK_PerEDC = pPK_PerEDC;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    swal({
        title: "¿Realmente desea eliminar el registro?",
        text: 'Si se encuentra seguro haga click en "Si, Continuar", de lo contrario haga click en "No, Cancelar"',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#58748B",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "No, Cancelar"
    }, function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '/Personal_ExperienciaDisenoCurricularEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_PerEDC: vPK_PerEDC,
                    pPK_Personal: vPK_Personal
                },
                beforeSend: function() {
                    funBefore2();
                },
                success: function(data) {
                    document.getElementById("divTabPDC").innerHTML = data.pTabPDC;
                    funBeforeClear();
                },
                error: function(data) {
                    funError2();
                }
            });
        } else {
            console.log("Proceso Cancelado");
        }
    });

}

function funPersonal_ExperienciaDisenoCurricularEditarForm(pPK_PerEDC) {
    var _token = $("input[name='_token']").val();
    var vPK_PerEDC = pPK_PerEDC;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    $.ajax({
        url: '/Personal_ExperienciaDisenoCurricularEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_PerEDC: vPK_PerEDC,
            pPK_Personal: vPK_Personal
        },
        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            funBeforeClear();

            document.getElementById("HiPK_PerEDC").value = data.pPK_PerEDC;
            document.getElementById("TeEDC_Instituto").value = data.pEDC_Instituto;
            document.getElementById("TeEDC_Nombre").value = data.pEDC_Nombre;

            var vEDC_PeriodoInicio = data.pEDC_PeriodoInicio.split("-").reverse().join("/");
            var vEDC_PeriodoFin = data.pEDC_PeriodoFin.split("-").reverse().join("/");

            document.getElementById("TeEDC_PeriodoInicio").value = vEDC_PeriodoInicio;
            document.getElementById("TeEDC_PeriodoFin").value = vEDC_PeriodoFin;

            document.getElementById("SeExperienciaDT").value = data.pPK_EDCTipo;

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}



/*
 *  Experiencia en Investigación
 */
function funPersonal_ExperienciaInvestigacionGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_PerEInv = document.getElementById("HiPK_PerEInv").value;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;
    var vPEInv_Instituto = document.getElementById("TePEInv_Instituto").value;
    var vPEI_Titulo = document.getElementById("TePEI_Titulo").value;
    var vNivelParticipacion = document.getElementById("SeNivelParticipacion").value;
    var vPEInv_PeriodoInicio = document.getElementById("TePEInv_PeriodoInicio").value;
    var vPEInv_PeriodoFin = document.getElementById("TePEInv_PeriodoFin").value;

    if (vPEInv_Instituto == '' || vPEI_Titulo == '' || vPEInv_PeriodoInicio == '' || vPEInv_PeriodoFin == '' || vNivelParticipacion == '' || vNivelParticipacion == 'x1') {
        return false;
    }

    vPEInv_PeriodoInicio = vPEInv_PeriodoInicio.split("/").reverse().join("-");
    vPEInv_PeriodoFin = vPEInv_PeriodoFin.split("/").reverse().join("-");

    $.ajax({
        url: '/Personal_ExperienciaInvestigacionGuardar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_PerEInv: vPK_PerEInv,
            pPK_Personal: vPK_Personal,
            pPEInv_Instituto: vPEInv_Instituto,
            pPEI_Titulo: vPEI_Titulo,
            pNivelParticipacion: vNivelParticipacion,
            pPEInv_PeriodoInicio: vPEInv_PeriodoInicio,
            pPEInv_PeriodoFin: vPEInv_PeriodoFin
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPEIn").innerHTML = data.pTabPEIn;
            funBeforeClear();

            document.getElementById("HiPK_PerEInv").value = -99;
            document.getElementById("TePEInv_Instituto").value = '';
            document.getElementById("TePEI_Titulo").value = '';
            document.getElementById("TePEInv_PeriodoInicio").value = '';
            document.getElementById("TePEInv_PeriodoFin").value = '';
            document.getElementById("SeNivelParticipacion").value = 'x1';

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_ExperienciaInvestigacionConsultar(pPK_Personal) {
    var _token = $("input[name='_token']").val();
    var vPK_Personal = pPK_Personal;

    $.ajax({
        url: '/Personal_ExperienciaInvestigacionConsultar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_Personal: vPK_Personal
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPEIn").innerHTML = data.pTabPEIn;
            funBeforeClear();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_ExperienciaInvestigacionEliminar(pPK_PerEInv) {
    var _token = $("input[name='_token']").val();
    var vPK_PerEInv = pPK_PerEInv;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    swal({
        title: "¿Realmente desea eliminar el registro?",
        text: 'Si se encuentra seguro haga click en "Si, Continuar", de lo contrario haga click en "No, Cancelar"',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#58748B",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "No, Cancelar"
    }, function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '/Personal_ExperienciaInvestigacionEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_PerEInv: vPK_PerEInv,
                    pPK_Personal: vPK_Personal
                },
                beforeSend: function() {
                    funBefore2();
                },
                success: function(data) {
                    document.getElementById("divTabPEIn").innerHTML = data.pTabPEIn;
                    funBeforeClear();
                },
                error: function(data) {
                    funError2();
                }
            });
        } else {
            console.log("Proceso Cancelado");
        }
    });

}

function funPersonal_ExperienciaInvestigacionEditarForm(pPK_PerEInv) {
    var _token = $("input[name='_token']").val();
    var vPK_PerEInv = pPK_PerEInv;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    $.ajax({
        url: '/Personal_ExperienciaInvestigacionEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_PerEInv: vPK_PerEInv,
            pPK_Personal: vPK_Personal
        },
        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            funBeforeClear();

            document.getElementById("HiPK_PerEInv").value = data.pPK_PerEIn;
            document.getElementById("TePEInv_Instituto").value = data.pPEI_Instituto;
            document.getElementById("TePEI_Titulo").value = data.pPEI_Titulo;

            var vPEI_PeriodoInicio = data.pPEI_PeriodoInicio.split("-").reverse().join("/");
            var vPEI_PeriodoFin = data.pPEI_PeriodoFin.split("-").reverse().join("/");
            document.getElementById("TePEInv_PeriodoInicio").value = vPEI_PeriodoInicio;
            document.getElementById("TePEInv_PeriodoFin").value = vPEI_PeriodoFin;

            document.getElementById("SeNivelParticipacion").value = data.pPK_InveNivePart;

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}



/*
 *  Experiencia en Vinculación
 */
function funPersonal_ExperienciaVinculacionGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_PerEV = document.getElementById("HiPK_PerEV").value;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;
    var vPEV_Instituto = document.getElementById("TePEV_Instituto").value;
    var vPEV_Titulo = document.getElementById("TePEV_Titulo").value;
    var vVincNivePart = document.getElementById("SeVincNivePart").value;
    var vPEV_PeriodoInicio = document.getElementById("TePEV_PeriodoInicio").value;
    var vPEV_PeriodoFin = document.getElementById("TePEV_PeriodoFin").value;

    if (vPEV_Instituto == '' || vPEV_Titulo == '' || vPEV_PeriodoInicio == '' || vPEV_PeriodoFin == '' || vVincNivePart == '' || vVincNivePart == 'x1') {
        return false;
    }

    vPEV_PeriodoInicio = vPEV_PeriodoInicio.split("/").reverse().join("-");
    vPEV_PeriodoFin = vPEV_PeriodoFin.split("/").reverse().join("-");

    $.ajax({
        url: '/Personal_ExperienciaVinculacionGuardar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_PerEV: vPK_PerEV,
            pPK_Personal: vPK_Personal,
            pPEV_Instituto: vPEV_Instituto,
            pPEV_Titulo: vPEV_Titulo,
            pVincNivePart: vVincNivePart,
            pPEV_PeriodoInicio: vPEV_PeriodoInicio,
            pPEV_PeriodoFin: vPEV_PeriodoFin
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPEV").innerHTML = data.pTabPEV;
            funBeforeClear();

            document.getElementById("HiPK_PerEV").value = -99;
            document.getElementById("TePEV_Instituto").value = '';
            document.getElementById("TePEV_Titulo").value = '';
            document.getElementById("TePEV_PeriodoInicio").value = '';
            document.getElementById("TePEV_PeriodoFin").value = '';
            document.getElementById("SeVincNivePart").value = 'x1';

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_ExperienciaVinculacionConsultar(pPK_Personal) {
    var _token = $("input[name='_token']").val();
    var vPK_Personal = pPK_Personal;

    $.ajax({
        url: '/Personal_ExperienciaVinculacionConsultar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_Personal: vPK_Personal
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPEV").innerHTML = data.pTabPEV;
            funBeforeClear();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_ExperienciaVinculacionEliminar(pPK_PerEV) {
    var _token = $("input[name='_token']").val();
    var vPK_PerEV = pPK_PerEV;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    swal({
        title: "¿Realmente desea eliminar el registro?",
        text: 'Si se encuentra seguro haga click en "Si, Continuar", de lo contrario haga click en "No, Cancelar"',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#58748B",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "No, Cancelar"
    }, function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '/Personal_ExperienciaVinculacionEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_PerEV: vPK_PerEV,
                    pPK_Personal: vPK_Personal
                },
                beforeSend: function() {
                    funBefore2();
                },
                success: function(data) {
                    document.getElementById("divTabPEV").innerHTML = data.pTabPEV;
                    funBeforeClear();
                },
                error: function(data) {
                    funError2();
                }
            });
        } else {
            console.log("Proceso Cancelado");
        }
    });

}

function funPersonal_ExperienciaVinculacionEditarForm(pPK_PerEV) {
    var _token = $("input[name='_token']").val();
    var vPK_PerEV = pPK_PerEV;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    $.ajax({
        url: '/Personal_ExperienciaVinculacionEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_PerEV: vPK_PerEV,
            pPK_Personal: vPK_Personal
        },
        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            funBeforeClear();

            document.getElementById("HiPK_PerEV").value = data.pPK_PerEV;
            document.getElementById("TePEV_Instituto").value = data.pPEV_Instituto;
            document.getElementById("TePEV_Titulo").value = data.pPEV_Titulo;

            var vPEV_PeriodoInicio = data.pPEV_PeriodoInicio.split("-").reverse().join("/");
            var vPEV_PeriodoFin = data.pPEV_PeriodoFin.split("-").reverse().join("/");
            document.getElementById("TePEV_PeriodoInicio").value = vPEV_PeriodoInicio;
            document.getElementById("TePEV_PeriodoFin").value = vPEV_PeriodoFin;

            document.getElementById("SeVincNivePart").value = data.pPK_VincNivePart;

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}



/*
 *  Publicaciones
 */
function funPersonal_PublicacionesGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_PerPub = document.getElementById("HiPK_PerPub").value;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;
    var vPPu_Titulo = document.getElementById("TePPu_Titulo").value;
    var vPPu_Fecha = document.getElementById("TePPu_Fecha").value;
    var vPPu_ReferenciaBibliografica = document.getElementById("TePPu_ReferenciaBibliografica").value;

    if (vPPu_Titulo == '' || vPPu_Fecha == '' || vPPu_ReferenciaBibliografica == '') {
        return false;
    }

    vPPu_Fecha = vPPu_Fecha.split("/").reverse().join("-");

    $.ajax({
        url: '/Personal_PublicacionesGuardar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_PerPub: vPK_PerPub,
            pPK_Personal: vPK_Personal,
            pPPu_Titulo: vPPu_Titulo,
            pPPu_Fecha: vPPu_Fecha,
            pPPu_ReferenciaBibliografica: vPPu_ReferenciaBibliografica
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPPU").innerHTML = data.pTabPPU;
            funBeforeClear();

            document.getElementById("HiPK_PerPub").value = -99;
            document.getElementById("TePPu_Titulo").value = '';
            document.getElementById("TePPu_Fecha").value = '';
            document.getElementById("TePPu_ReferenciaBibliografica").value = '';

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_PublicacionesConsultar(pPK_Personal) {
    var _token = $("input[name='_token']").val();
    var vPK_Personal = pPK_Personal;

    $.ajax({
        url: '/Personal_PublicacionesConsultar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_Personal: vPK_Personal
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPPU").innerHTML = data.pTabPPU;
            funBeforeClear();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_PublicacionesEliminar(pPK_PerPub) {
    var _token = $("input[name='_token']").val();
    var vPK_PerPub = pPK_PerPub;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    swal({
        title: "¿Realmente desea eliminar el registro?",
        text: 'Si se encuentra seguro haga click en "Si, Continuar", de lo contrario haga click en "No, Cancelar"',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#58748B",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "No, Cancelar"
    }, function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '/Personal_PublicacionesEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_PerPub: vPK_PerPub,
                    pPK_Personal: vPK_Personal
                },
                beforeSend: function() {
                    funBefore2();
                },
                success: function(data) {
                    document.getElementById("divTabPPU").innerHTML = data.pTabPPU;
                    funBeforeClear();
                },
                error: function(data) {
                    funError2();
                }
            });
        } else {
            console.log("Proceso Cancelado");
        }
    });

}

function funPersonal_PublicacionesEditarForm(pPK_PerPub) {
    var _token = $("input[name='_token']").val();
    var vPK_PerPub = pPK_PerPub;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    $.ajax({
        url: '/Personal_PublicacionesEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_PerPub: vPK_PerPub,
            pPK_Personal: vPK_Personal
        },
        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            funBeforeClear();

            document.getElementById("HiPK_PerPub").value = data.pPK_PerPub;
            document.getElementById("TePPu_Titulo").value = data.pPPu_Titulo;

            var vPPu_Fecha = data.pPPu_Fecha.split("-").reverse().join("/");
            document.getElementById("TePPu_Fecha").value = vPPu_Fecha;

            document.getElementById("TePPu_ReferenciaBibliografica").value = data.pPPu_ReferenciaBibliografica;

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}



/*
 *  Participación Ponente
 */

function funPersonal_ParticipacionPonenteGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_PerPPo = document.getElementById("HiPK_PerPPo").value;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;
    var vPPP_Evento = document.getElementById("TePPP_Evento").value;
    var vPPP_PeriodoInicio = document.getElementById("TePPP_PeriodoInicio").value;
    var vPPP_PeriodoFin = document.getElementById("TePPP_PeriodoFin").value;
    var vPPP_Tema = document.getElementById("TePPP_Tema").value;

    if (vPPP_Evento == '' || vPPP_PeriodoInicio == '' || vPPP_PeriodoFin == '' || vPPP_Tema == '') {
        return false;
    }

    vPPP_PeriodoInicio = vPPP_PeriodoInicio.split("/").reverse().join("-");
    vPPP_PeriodoFin = vPPP_PeriodoFin.split("/").reverse().join("-");

    $.ajax({
        url: '/Personal_ParticipacionPonenteGuardar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_PerPPo: vPK_PerPPo,
            pPK_Personal: vPK_Personal,
            pPPP_Evento: vPPP_Evento,
            pPPP_Tema: vPPP_Tema,
            pPPP_PeriodoInicio: vPPP_PeriodoInicio,
            pPPP_PeriodoFin: vPPP_PeriodoFin
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPPP").innerHTML = data.pTabPPP;
            funBeforeClear();

            document.getElementById("HiPK_PerPPo").value = -99;
            document.getElementById("TePPP_Evento").value = '';
            document.getElementById("TePPP_PeriodoInicio").value = '';
            document.getElementById("TePPP_PeriodoFin").value = '';
            document.getElementById("TePPP_Tema").value = '';

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_ParticipacionPonenteConsultar(pPK_Personal) {
    var _token = $("input[name='_token']").val();
    var vPK_Personal = pPK_Personal;

    $.ajax({
        url: '/Personal_ParticipacionPonenteConsultar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_Personal: vPK_Personal
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPPP").innerHTML = data.pTabPPP;
            funBeforeClear();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_ParticipacionPonenteEliminar(pPK_PerPPo) {
    var _token = $("input[name='_token']").val();
    var vPK_PerPPo = pPK_PerPPo;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    swal({
        title: "¿Realmente desea eliminar el registro?",
        text: 'Si se encuentra seguro haga click en "Si, Continuar", de lo contrario haga click en "No, Cancelar"',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#58748B",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "No, Cancelar"
    }, function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '/Personal_ParticipacionPonenteEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_PerPPo: vPK_PerPPo,
                    pPK_Personal: vPK_Personal
                },
                beforeSend: function() {
                    funBefore2();
                },
                success: function(data) {
                    document.getElementById("divTabPPP").innerHTML = data.pTabPPP;
                    funBeforeClear();
                },
                error: function(data) {
                    funError2();
                }
            });
        } else {
            console.log("Proceso Cancelado");
        }
    });

}

function funPersonal_ParticipacionPonenteEditarForm(pPK_PerPPo) {
    var _token = $("input[name='_token']").val();
    var vPK_PerPPo = pPK_PerPPo;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    $.ajax({
        url: '/Personal_ParticipacionPonenteEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_PerPPo: vPK_PerPPo,
            pPK_Personal: vPK_Personal
        },
        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            funBeforeClear();



            document.getElementById("HiPK_PerPPo").value = data.pPK_PerPPo;
            document.getElementById("TePPP_Evento").value = data.pPPP_Evento;

            var vPPP_PeriodoInicio = data.pPPP_PeriodoInicio.split("-").reverse().join("/");
            var vPPP_PeriodoFin = data.pPPP_PeriodoFin.split("-").reverse().join("/");
            document.getElementById("TePPP_PeriodoInicio").value = vPPP_PeriodoInicio;
            document.getElementById("TePPP_PeriodoFin").value = vPPP_PeriodoFin;

            document.getElementById("TePPP_Tema").value = data.pPPP_Tema;

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}



/*
 *  Discapacidad
 */

function funPersonal_DiscapacidadGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_PerDis = document.getElementById("HiPK_PerDis").value;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;
    var vDiscapacidad = document.getElementById("SeDiscapacidad").value;

    if (vDiscapacidad == '' || vDiscapacidad == 'x1') {
        return false;
    }

    $.ajax({
        url: '/Personal_DiscapacidadGuardar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_PerDis: vPK_PerDis,
            pPK_Personal: vPK_Personal,
            pDiscapacidad: vDiscapacidad
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPDI").innerHTML = data.pTabPDI;
            funBeforeClear();

            document.getElementById("HiPK_PerDis").value = -99;
            document.getElementById("SeDiscapacidad").value = 'x1';

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_DiscapacidadConsultar(pPK_Personal) {
    var _token = $("input[name='_token']").val();
    var vPK_Personal = pPK_Personal;

    $.ajax({
        url: '/Personal_DiscapacidadConsultar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_Personal: vPK_Personal
        },

        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            document.getElementById("divTabPDI").innerHTML = data.pTabPDI;
            funBeforeClear();
        },
        error: function(data) {
            funError2();
        }
    });
}

function funPersonal_DiscapacidadEliminar(pPK_PerDis) {
    var _token = $("input[name='_token']").val();
    var vPK_PerDis = pPK_PerDis;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    swal({
        title: "¿Realmente desea eliminar el registro?",
        text: 'Si se encuentra seguro haga click en "Si, Continuar", de lo contrario haga click en "No, Cancelar"',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#58748B",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "No, Cancelar"
    }, function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '/Personal_DiscapacidadEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_PerDis: vPK_PerDis,
                    pPK_Personal: vPK_Personal
                },
                beforeSend: function() {
                    funBefore2();
                },
                success: function(data) {
                    document.getElementById("divTabPDI").innerHTML = data.pTabPDI;
                    funBeforeClear();
                },
                error: function(data) {
                    funError2();
                }
            });
        } else {
            console.log("Proceso Cancelado");
        }
    });

}

function funPersonal_DiscapacidadEditarForm(pPK_PerDis) {
    var _token = $("input[name='_token']").val();
    var vPK_PerDis = pPK_PerDis;
    var vPK_Personal = document.getElementById("HiPK_Personal").value;

    $.ajax({
        url: '/Personal_DiscapacidadEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_PerDis: vPK_PerDis,
            pPK_Personal: vPK_Personal
        },
        beforeSend: function() {
            funBefore2();
        },
        success: function(data) {
            funBeforeClear();

            document.getElementById("HiPK_PerDis").value = data.pPK_PerDis;
            document.getElementById("SeDiscapacidad").value = data.pPK_Discapacidad;

            FormElements.init();
        },
        error: function(data) {
            funError2();
        }
    });
}