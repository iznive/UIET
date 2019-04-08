function funVinculacionNivelParticipacionGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_VincNivePart = document.getElementById("HiPK_VincNivePart").value;
    var vVNP_Nombre = document.getElementById("TeVNP_Nombre").value;
    var vObservacion = document.getElementById("TeAObservacion_VinculacionParticipacion").value;

    if (vVNP_Nombre == '') {
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
                url: '/VinculacionNivelParticipacionGuardar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_VincNivePart: vPK_VincNivePart,
                    pVNP_Nombre: vVNP_Nombre,
                    pObservacion: vObservacion
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/VinculacionNivelParticipacion';", 500);
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

function funVinculacionNivelParticipacionEliminar(pPK_VincNivePart) {
    var _token = $("input[name='_token']").val();
    var vPK_VincNivePart = pPK_VincNivePart;

    if (vPK_VincNivePart == '') {
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
                url: '/VinculacionNivelParticipacionEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_VincNivePart: vPK_VincNivePart
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/VinculacionNivelParticipacion';", 500);
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


function funVinculacionNivelParticipacionEditarForm(pPK_VincNivePart) {
    var _token = $("input[name='_token']").val();
    var vPK_VincNivePart = pPK_VincNivePart;

    if (vPK_VincNivePart == '') {
        funValGenerica();
        return false;
    }

    $.ajax({
        url: '/VinculacionNivelParticipacionEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_VincNivePart: vPK_VincNivePart
        },
        beforeSend: function () {
            funBefore();
        },
        success: function (data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("HiPK_VincNivePart").value = vPK_VincNivePart;
            document.getElementById("TeVNP_Nombre").value = data.pVNP_Nombre;

            FormElements.init();
        },
        error: function (data) {
            funError()
        }
    });

}

