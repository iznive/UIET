function funCategoriaPuestoGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_CatePuesto = document.getElementById("HiPK_CatePuesto").value;
    var vCPu_Nombre = document.getElementById("TeCPu_Nombre").value;

    if (vCPu_Nombre == '') {
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
                url: '/CategoriaPuestoGuardar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_CatePuesto: vPK_CatePuesto,
                    pCPu_Nombre: vCPu_Nombre
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/CategoriaPuesto';", 500);
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

function funCategoriaPuestoEliminar(pPK_CatePuesto) {
    var _token = $("input[name='_token']").val();
    var vPK_CatePuesto = pPK_CatePuesto;

    if (vPK_CatePuesto == '') {
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
                url: '/CategoriaPuestoEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_CatePuesto: vPK_CatePuesto
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/CategoriaPuesto';", 500);
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


function funCategoriaPuestoEditarForm(pPK_CatePuesto) {
    var _token = $("input[name='_token']").val();
    var vPK_CatePuesto = pPK_CatePuesto;

    if (vPK_CatePuesto == '') {
        funValGenerica();
        return false;
    }

    $.ajax({
        url: '/CategoriaPuestoEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_CatePuesto: vPK_CatePuesto
        },
        beforeSend: function () {
            funBefore();
        },
        success: function (data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("HiPK_CatePuesto").value = vPK_CatePuesto;
            document.getElementById("TeCPu_Nombre").value = data.pCPu_Nombre;

            FormElements.init();
        },
        error: function (data) {
            funError()
        }
    });

}

