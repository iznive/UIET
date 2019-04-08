function funPaisGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_Pais = document.getElementById("HiPK_Pais").value;
    var vPai_Nombre = document.getElementById("TePai_Nombre").value;
    var vPai_NombreCorto = document.getElementById("TePai_NombreCorto").value;
    var vPai_Abreviatura = document.getElementById("TePai_Abreviatura").value;
    var vObservacion = document.getElementById("TeAObservacion_Pais").value;


    if (vPai_Nombre == '') {
        return false;
    }

    swal({
        title: "¿Realmente desea guardar la Información?",
        text: 'Si se encuentra seguro haga click en "Si, Continuar", de lo contrario haga click en "No, Cancelar"',
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#58748B",
        confirmButtonText: "Si, Continuar",
        cancelButtonText: "No, Cancelar"
    }, function (isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '/PaisGuardar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_Pais: vPK_Pais,
                    pPai_Nombre: vPai_Nombre,
                    pPai_NombreCorto: vPai_NombreCorto,
                    pPai_Abreviatura: vPai_Abreviatura,
                    pObservacion: vObservacion
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/Pais';", 500);
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

function funPaisEliminar(pPK_Pais) {
    var _token = $("input[name='_token']").val();
    var vPK_Pais = pPK_Pais;

    if (vPK_Pais == '') {
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
                url: '/PaisEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_Pais: vPK_Pais
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/Pais';", 500);
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


function funPaisEditarForm(pPK_Pais) {
    var _token = $("input[name='_token']").val();
    var vPK_Pais = pPK_Pais;

    if (vPK_Pais == '') {
        funValGenerica();
        return false;
    }

    $.ajax({
        url: '/PaisEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_Pais: vPK_Pais
        },
        beforeSend: function () {
            funBefore();
        },
        success: function (data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("HiPK_Pais").value = vPK_Pais;
            document.getElementById("TePai_Nombre").value = data.pPai_Nombre;
            document.getElementById("TePai_NombreCorto").value = data.pPai_NombreCorto;
            document.getElementById("TePai_Abreviatura").value = data.pPai_Abreviatura;

            FormElements.init();
        },
        error: function (data) {
            funError()
        }
    });

}

