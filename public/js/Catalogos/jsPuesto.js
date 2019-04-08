function funPuestoGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_Puesto = document.getElementById("HiPK_Puesto").value;
    var vFK_CatePuesto = document.getElementById("SeCatPuesto").value;
    var vPue_Nombre = document.getElementById("TePue_Nombre").value;


    if (vPue_Nombre == '') {
        return false;
    }

    if (vFK_CatePuesto == '' || vFK_CatePuesto == 'x1') {
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
                url: '/PuestoGuardar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_Puesto: vPK_Puesto,
                    pFK_CatePuesto: vFK_CatePuesto,
                    pPue_Nombre: vPue_Nombre
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/Puesto';", 500);
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

function funPuestoEliminar(pPK_Puesto) {
    var _token = $("input[name='_token']").val();
    var vPK_Puesto = pPK_Puesto;

    if (vPK_Puesto == '') {
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
                url: '/PuestoEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_Puesto: vPK_Puesto
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/Puesto';", 500);
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


function funPuestoEditarForm(pPK_Puesto) {
    var _token = $("input[name='_token']").val();
    var vPK_Puesto = pPK_Puesto;

    if (vPK_Puesto == '') {
        funValGenerica();
        return false;
    }

    $.ajax({
        url: '/PuestoEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_Puesto: vPK_Puesto
        },
        beforeSend: function () {
            funBefore();
        },
        success: function (data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("HiPK_Puesto").value = vPK_Puesto;
            document.getElementById("TePue_Nombre").value = data.pPue_Nombre;
            document.getElementById("divSeCatPuesto").innerHTML = data.pSeCatPuesto;

            FormElements.init();
        },
        error: function (data) {
            funError()
        }
    });

}

