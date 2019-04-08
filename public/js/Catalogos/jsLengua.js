function funLenguaGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_Lengua = document.getElementById("HiPK_Lengua").value;
    var vLen_Nombre = document.getElementById("TeLen_Nombre").value;
    var vSeLen_Tipo = $('input:radio[name=SeLen_Tipo]:checked').val();
    var vObservacion = document.getElementById("TeAObservacion_Lengua").value;

    if (vLen_Nombre == '') {
        return false;
    }

     if (vSeLen_Tipo == '') {
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
                url: '/LenguaGuardar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_Lengua: vPK_Lengua,
                    pLen_Nombre: vLen_Nombre,
                    pLen_Tipo: vSeLen_Tipo,
                    pObservacion: vObservacion
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/Lengua';", 500);
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

function funLenguaEliminar(pPK_Lengua) {
    var _token = $("input[name='_token']").val();
    var vPK_Lengua = pPK_Lengua;

    if (vPK_Lengua == '') {
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
                url: '/LenguaEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_Lengua: vPK_Lengua
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/Lengua';", 500);
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


function funLenguaEditarForm(pPK_Lengua) {
    var _token = $("input[name='_token']").val();
    var vPK_Lengua = pPK_Lengua;

    if (vPK_Lengua == '') {
        funValGenerica();
        return false;
    }

    $.ajax({
        url: '/LenguaEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_Lengua: vPK_Lengua
        },
        beforeSend: function () {
            funBefore();
        },
        success: function (data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("HiPK_Lengua").value = vPK_Lengua;
            document.getElementById("TeLen_Nombre").value = data.pLen_Nombre;
            document.getElementById("SeLen_Tipo").value = data.pSeLen_Tipo;

            FormElements.init();
        },
        error: function (data) {
            funError()
        }
    });

}

