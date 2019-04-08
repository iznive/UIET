function funSuperiorJerarquicoGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_SupeJerarquico = document.getElementById("HiPK_SupeJerarquico").value;
    var vSJe_Nombre = document.getElementById("TeSJe_Nombre").value;
    var vSJe_Abreviatura = document.getElementById("TeSJe_Abreviatura").value;

    if (vSJe_Nombre == '') {
        return false;
    }

    if (vSJe_Abreviatura == '') {
        return false;
    }

    if (vSJe_Abreviatura.length > 10) {
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
                url: '/SuperiorJerarquicoGuardar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_SupeJerarquico: vPK_SupeJerarquico,
                    pSJe_Nombre: vSJe_Nombre,
                    pSJe_Abreviatura: vSJe_Abreviatura
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/SuperiorJerarquico';", 500);
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

function funSuperiorJerarquicoEliminar(pPK_SupeJerarquico) {
    var _token = $("input[name='_token']").val();
    var vPK_SupeJerarquico = pPK_SupeJerarquico;

    if (vPK_SupeJerarquico == '') {
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
                url: '/SuperiorJerarquicoEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_SupeJerarquico: vPK_SupeJerarquico
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/SuperiorJerarquico';", 500);
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


function funSuperiorJerarquicoEditarForm(pPK_SupeJerarquico) {
    var _token = $("input[name='_token']").val();
    var vPK_SupeJerarquico = pPK_SupeJerarquico;

    if (vPK_SupeJerarquico == '') {
        funValGenerica();
        return false;
    }

    $.ajax({
        url: '/SuperiorJerarquicoEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_SupeJerarquico: vPK_SupeJerarquico
        },
        beforeSend: function () {
            funBefore();
        },
        success: function (data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("HiPK_SupeJerarquico").value = vPK_SupeJerarquico;
            document.getElementById("TeSJe_Nombre").value = data.pSJe_Nombre;
            document.getElementById("TeSJe_Abreviatura").value = data.pSJe_Abreviatura;

            FormElements.init();
        },
        error: function (data) {
            funError()
        }
    });

}