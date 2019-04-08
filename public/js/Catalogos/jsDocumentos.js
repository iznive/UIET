function funDocumentosGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_Documentos = document.getElementById("HiPK_Documentos").value;
    var vFK_DocuClasificacion = document.getElementById("SeClasificacion").value;
    var vFK_NivelReq = document.getElementById("SeNivelRequerimiento").value;
    var vDoc_Nombre = document.getElementById("TeDoc_Nombre").value;
    var vDoc_Indicacion = document.getElementById("TeDoc_Indicacion").value;
    var vObservacion = document.getElementById("TeAObservacion_Documentos").value;


    if (vDoc_Nombre == '') {
        return false;
    }

    if (vFK_DocuClasificacion == '' || vFK_DocuClasificacion == 'x1') {
        return false;
    }

    swal({
        title: "¿Realmente desea guardar el registro?",
        text: 'Si se encuentra seguro haga click en "Si, Continuar", de lo contrario haga click en "No, Cancelar"',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#58748B",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "No, Cancelar"
    }, function (isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '/DocumentosGuardar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_Documentos: vPK_Documentos,
                    pFK_DocuClasificacion: vFK_DocuClasificacion,
                    pFK_NivelReq: vFK_NivelReq,
                    pDoc_Nombre: vDoc_Nombre,
                    pDoc_Indicacion: vDoc_Indicacion,
                    pObservacion: vObservacion
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/Documentos';", 500);
                },
                error: function (data) {
                    funError();
                }
            });
        } else {
            console.log("Proceso Cancelado");
        }
    });
}

function funDocumentosEliminar(pPK_Documentos) {
    var _token = $("input[name='_token']").val();
    var vPK_Documentos = pPK_Documentos;

    if (vPK_Documentos == '') {
        funValGenerica();
        return false;
    }

    swal({
        title: "¿Realmente desea eliminar el registro?",
        text: 'Si se encuentra seguro haga click en "Si, Continuar", de lo contrario haga click en "No, Cancelar"',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#58748B",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "No, Cancelar"
    }, function (isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '/DocumentosEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_Documentos: vPK_Documentos
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/Documentos';", 500);
                },
                error: function (data) {
                    funError();
                }
            });
        } else {
            console.log("Proceso Cancelado");
        }
    });

}


function funDocumentosEditarForm(pPK_Documentos) {
    var _token = $("input[name='_token']").val();
    var vPK_Documentos = pPK_Documentos;

    if (vPK_Documentos == '') {
        funValGenerica();
        return false;
    }

    $.ajax({
        url: '/DocumentosEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_Documentos: vPK_Documentos
        },
        beforeSend: function () {
            funBefore();
        },
        success: function (data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("HiPK_Documentos").value = vPK_Documentos;
            document.getElementById("TeDoc_Nombre").value = data.pDoc_Nombre;
            document.getElementById("TeDoc_Indicacion").value = data.pDoc_Indicacion;
            document.getElementById("DivSeNivelRequerimiento").innerHTML = data.pSeNivelRequerimiento;
            document.getElementById("divSeClasificacion").innerHTML = data.pSeClasificacion;

            FormElements.init();
        },
        error: function (data) {
            funError()
        }
    });

}

