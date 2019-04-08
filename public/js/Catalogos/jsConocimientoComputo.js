function funConocimientoComputoGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_ConoComputo = document.getElementById("HiPK_ConoComputo").value;
    var vCCo_Nombre = document.getElementById("TeCCo_Nombre").value;
    var vCCo_Descripcion = document.getElementById("TeCCo_Descripcion").value;
    var vObservacion = document.getElementById("TeAObservacion_ConoComputo").value;

    if (vCCo_Nombre == '') {
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
                url: '/ConocimientoComputoGuardar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_ConoComputo: vPK_ConoComputo,
                    pCCo_Nombre: vCCo_Nombre,
                    pCCo_Descripcion: vCCo_Descripcion,
                    pObservacion: vObservacion
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/ConocimientoComputo';", 500);
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

function funConocimientoComputoEliminar(pPK_ConoComputo) {
    var _token = $("input[name='_token']").val();
    var vPK_ConoComputo = pPK_ConoComputo;

    if (vPK_ConoComputo == '') {
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
                url: '/ConocimientoComputoEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_ConoComputo: vPK_ConoComputo
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/ConocimientoComputo';", 500);
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


function funConocimientoComputoEditarForm(pPK_ConoComputo) {
    var _token = $("input[name='_token']").val();
    var vPK_ConoComputo = pPK_ConoComputo;

    if (vPK_ConoComputo == '') {
        funValGenerica();
        return false;
    }

    $.ajax({
        url: '/ConocimientoComputoEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_ConoComputo: vPK_ConoComputo
        },
        beforeSend: function () {
            funBefore();
        },
        success: function (data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("HiPK_ConoComputo").value = vPK_ConoComputo;
            document.getElementById("TeCCo_Nombre").value = data.pCCo_Nombre;
            document.getElementById("TeCCo_Descripcion").value = data.pCCo_Descripcion;

            FormElements.init();
        },
        error: function (data) {
            funError()
        }
    });

}

