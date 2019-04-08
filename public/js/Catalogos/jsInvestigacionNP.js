function funInvestigacionNivelParticipacionGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_InveNivePart = document.getElementById("HiPK_InveNivePart").value;
    var vINP_Nombre = document.getElementById("TeINP_Nombre").value;
    var vObservacion = document.getElementById("TeAObservacion_InvestigacionParticipacion").value;

    if (vINP_Nombre == '') {
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
                url: '/InvestigacionNivelParticipacionGuardar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_InveNivePart: vPK_InveNivePart,
                    pINP_Nombre: vINP_Nombre,
                    pObservacion:vObservacion
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/InvestigacionNivelParticipacion';", 500);
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

function funInvestigacionNivelParticipacionEliminar(pPK_InveNivePart) {
    var _token = $("input[name='_token']").val();
    var vPK_InveNivePart = pPK_InveNivePart;

    if (vPK_InveNivePart == '') {
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
                url: '/InvestigacionNivelParticipacionEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_InveNivePart: vPK_InveNivePart
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/InvestigacionNivelParticipacion';", 500);
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


function funInvestigacionNivelParticipacionEditarForm(pPK_InveNivePart) {
    var _token = $("input[name='_token']").val();
    var vPK_InveNivePart = pPK_InveNivePart;

    if (vPK_InveNivePart == '') {
        funValGenerica();
        return false;
    }

    $.ajax({
        url: '/InvestigacionNivelParticipacionEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_InveNivePart: vPK_InveNivePart
        },
        beforeSend: function () {
            funBefore();
        },
        success: function (data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("HiPK_InveNivePart").value = vPK_InveNivePart;
            document.getElementById("TeINP_Nombre").value = data.pINP_Nombre;

            FormElements.init();
        },
        error: function (data) {
            funError()
        }
    });

}

