function funFormacionBasicaGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_FormBasica = document.getElementById("HiPK_FormBasica").value;
    var vFBa_Nombre = document.getElementById("TeFBa_Nombre").value;
    var vObservacion = document.getElementById("TeAObservacion_FormBasica").value;

    if (vFBa_Nombre == '') {
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
                url: '/FormacionBasicaGuardar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_FormBasica: vPK_FormBasica,
                    pFBa_Nombre: vFBa_Nombre,
                    pObservacion:vObservacion
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/FormacionBasica';", 500);
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

function funFormacionBasicaEliminar(pPK_FormBasica) {
    var _token = $("input[name='_token']").val();
    var vPK_FormBasica = pPK_FormBasica;

    if (vPK_FormBasica == '') {
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
                url: '/FormacionBasicaEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_FormBasica: vPK_FormBasica
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/FormacionBasica';", 500);
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


function funFormacionBasicaEditarForm(pPK_FormBasica) {
    var _token = $("input[name='_token']").val();
    var vPK_FormBasica = pPK_FormBasica;

    if (vPK_FormBasica == '') {
        funValGenerica();
        return false;
    }

    $.ajax({
        url: '/FormacionBasicaEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_FormBasica: vPK_FormBasica
        },
        beforeSend: function () {
            funBefore();
        },
        success: function (data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("HiPK_FormBasica").value = vPK_FormBasica;
            document.getElementById("TeFBa_Nombre").value = data.pFBa_Nombre;

            FormElements.init();
        },
        error: function (data) {
            funError()
        }
    });

}

