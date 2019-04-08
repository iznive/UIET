function funDocumentoClasificacionGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_DocumentoClasificacion = document.getElementById("HiPK_DocuClasificacion").value;
    var vDCl_Nombre = document.getElementById("TeDCl_Nombre").value;
    var vObservacion = document.getElementById("TeAObservacion_Clasificacion").value;

    if (vDCl_Nombre == '') {
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
                url: '/DocumentoClasificacionGuardar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_DocuClasificacion: vPK_DocumentoClasificacion,
                    pDCl_Nombre: vDCl_Nombre,
                    pObservacion:vObservacion
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/DocumentoClasificacion';", 500);
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
function funDocumentoClasificacionEliminar(pPK_DocuClasificacion) {
    var _token = $("input[name='_token']").val();
    var vPK_DocumentoClasificacion = pPK_DocuClasificacion;

    if (vPK_DocumentoClasificacion == '') {
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
                url: '/DocumentoClasificacionEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_DocuClasificacion: vPK_DocumentoClasificacion
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/DocumentoClasificacion';", 500);
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


function funDocumentoClasificacionEditarForm(pPK_DocuClasificacion) {
    var _token = $("input[name='_token']").val();
    var vPK_DocumentoClasificacion = pPK_DocuClasificacion;

    if (vPK_DocumentoClasificacion == '') {
        funValGenerica();
        return false;
    }

    $.ajax({
        url: '/DocumentoClasificacionEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_DocuClasificacion: vPK_DocumentoClasificacion
        },
        beforeSend: function () {
            funBefore();
        },
        success: function (data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("HiPK_DocuClasificacion").value = vPK_DocumentoClasificacion;
            document.getElementById("TeDCl_Nombre").value = data.pDCl_Nombre;

            FormElements.init();
        },
        error: function (data) {
            funError()
        }
    });

}

