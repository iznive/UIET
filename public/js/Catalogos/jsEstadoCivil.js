function funEstadoCivilGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_EstaCivil = document.getElementById("HiPK_EstaCivil").value;
    var vECi_Nombre = document.getElementById("TeECi_Nombre").value;

    if (vECi_Nombre == '') {
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
                url: '/EstadoCivilGuardar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_EstaCivil: vPK_EstaCivil,
                    pECi_Nombre: vECi_Nombre
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/EstadoCivil';", 500);
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

function funEstadoCivilEliminar(pPK_EstaCivil) {
    var _token = $("input[name='_token']").val();
    var vPK_EstaCivil = pPK_EstaCivil;

    if (vPK_EstaCivil == '') {
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
                url: '/EstadoCivilEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_EstaCivil: vPK_EstaCivil
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/EstadoCivil';", 500);
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


function funEstadoCivilEditarForm(pPK_EstaCivil) {
    var _token = $("input[name='_token']").val();
    var vPK_EstaCivil = pPK_EstaCivil;

    if (vPK_EstaCivil == '') {
        funValGenerica();
        return false;
    }

    $.ajax({
        url: '/EstadoCivilEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_EstaCivil: vPK_EstaCivil
        },
        beforeSend: function () {
            funBefore();
        },
        success: function (data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("HiPK_EstaCivil").value = vPK_EstaCivil;
            document.getElementById("TeECi_Nombre").value = data.pECi_Nombre;

            FormElements.init();
        },
        error: function (data) {
            funError()
        }
    });

}

