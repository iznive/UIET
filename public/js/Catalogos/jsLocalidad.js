function funLocalidadGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_Localidad = document.getElementById("HiPK_Localidad").value;
    var vFK_Municipio = document.getElementById("SeMunicipio").value;
    var vLoc_Nombre = document.getElementById("TeLoc_Nombre").value;
    var vLoc_CP = document.getElementById("TeLoc_CP").value;
    var vObservacion = document.getElementById("TeAObservacion_Localidad").value;


    if (vLoc_Nombre == '') {
        return false;
    }

    if (vFK_Municipio == '' || vFK_Municipio == 'x1') {
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
                url: '/LocalidadGuardar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_Localidad: vPK_Localidad,
                    pFK_Municipio: vFK_Municipio,
                    pLoc_Nombre: vLoc_Nombre,
                    pLoc_CP: vLoc_CP,
                    pObservacion: vObservacion
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/Localidad';", 500);
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

function funLocalidadEliminar(pPK_Localidad) {
    var _token = $("input[name='_token']").val();
    var vPK_Localidad = pPK_Localidad;

    if (vPK_Localidad == '') {
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
                url: '/LocalidadEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_Localidad: vPK_Localidad
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/Localidad';", 500);
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


function funLocalidadEditarForm(pPK_Localidad) {
    var _token = $("input[name='_token']").val();
    var vPK_Localidad = pPK_Localidad;

    if (vPK_Localidad == '') {
        funValGenerica();
        return false;
    }

    $.ajax({
        url: '/LocalidadEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_Localidad: vPK_Localidad
        },
        beforeSend: function () {
            funBefore();
        },
        success: function (data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("HiPK_Localidad").value = vPK_Localidad;
            document.getElementById("TeLoc_Nombre").value = data.pLoc_Nombre;
            document.getElementById("TeLoc_CP").value = data.pLoc_CP;
            document.getElementById("divSeMunicipio").innerHTML = data.pSeMunicipio;

            FormElements.init();
        },
        error: function (data) {
            funError()
        }
    });

}

