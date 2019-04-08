function funMunicipioGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_Municipio = document.getElementById("HiPK_Municipio").value;
    var vFK_Entidad = document.getElementById("SeFK_Entidad").value;
    var vMun_Nombre = document.getElementById("TeMun_Nombre").value;
    var vObservacion = document.getElementById("TeAObservacion_Municipio").value;


    if (vMun_Nombre == '') {
        return false;
    }

    if (vFK_Entidad == '' || vFK_Entidad == 'x1') {
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
                url: '/MunicipioGuardar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_Municipio: vPK_Municipio,
                    pFK_Entidad: vFK_Entidad,
                    pMun_Nombre: vMun_Nombre,
                    pObservacion: vObservacion
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/Municipio';", 500);
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
function funMunicipioEliminar(pPK_Municipio) {
    var _token = $("input[name='_token']").val();
    var vPK_Municipio = pPK_Municipio;

    if (vPK_Municipio == '') {
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
                url: '/MunicipioEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_Municipio: vPK_Municipio
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/Municipio';", 500);
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


function funMunicipioEditarForm(pPK_Municipio) {
    var _token = $("input[name='_token']").val();
    var vPK_Municipio = pPK_Municipio;

    if (vPK_Municipio == '') {
        funValGenerica();
        return false;
    }

    $.ajax({
        url: '/MunicipioEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_Municipio: vPK_Municipio
        },
        beforeSend: function () {
            funBefore();
        },
        success: function (data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("HiPK_Municipio").value = vPK_Municipio;
            document.getElementById("TeMun_Nombre").value = data.pMun_Nombre;
            document.getElementById("divSeFK_Entidad").innerHTML = data.pSeFK_Entidad;

            FormElements.init();
        },
        error: function (data) {
            funError()
        }
    });

}


