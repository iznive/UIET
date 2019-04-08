


function funTipoContratoGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_TipoContrato = document.getElementById("HiPK_TipoContrato").value;
    var vTCo_Nombre = document.getElementById("TeTCo_Nombre").value;

    if (vTCo_Nombre == '') {
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
                url: '/TipoContratoGuardar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_TipoContrato: vPK_TipoContrato,
                    pTCo_Nombre: vTCo_Nombre
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/TipoContrato';", 500);
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

function funTipoContratoEliminar(pPK_TipoContrato) {
    var _token = $("input[name='_token']").val();
    var vPK_TipoContrato = pPK_TipoContrato;

    if (vPK_TipoContrato == '') {
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
                url: '/TipoContratoEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_TipoContrato: vPK_TipoContrato
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/TipoContrato';", 500);
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


function funTipoContratoEditarForm(pPK_TipoContrato) {
    var _token = $("input[name='_token']").val();
    var vPK_TipoContrato = pPK_TipoContrato;

    if (vPK_TipoContrato == '') {
        funValGenerica();
        return false;
    }

    $.ajax({
        url: '/TipoContratoEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_TipoContrato: vPK_TipoContrato
        },
        beforeSend: function () {
            funBefore();
        },
        success: function (data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("HiPK_TipoContrato").value = vPK_TipoContrato;
            document.getElementById("TeTCo_Nombre").value = data.pTCo_Nombre;

            FormElements.init();
        },
        error: function (data) {
            funError()
        }
    });

}

