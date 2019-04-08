function funSedeGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_Sede = document.getElementById("HiPK_Sede").value;
    var vFK_Localidad = document.getElementById("SeLocalidad").value;
    var vSed_Nombre = document.getElementById("TeNombreSede").value;
    var vSed_Direccion = document.getElementById("TeDireccionSede").value;
    var vSed_Telefono = document.getElementById("TeTelefonoSede").value;

    if (vSed_Nombre == '') {
        return false;
    }

    if (vSed_Direccion == '') {
        return false;
    }

    if (vFK_Localidad == '' || vFK_Localidad == 'x1') {
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
                url: '/SedeGuardar',
                type: 'POST',

                data: {
                    _token: _token,
                    pFK_Localidad: vFK_Localidad,
                    pSed_Nombre: vSed_Nombre,
                    pSed_Direccion: vSed_Direccion,
                    pSed_Telefono: vSed_Telefono,
                    pPK_Sede: vPK_Sede
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/Sede';", 500);
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

function funSedeEliminar(pPK_Sede) {
    var _token = $("input[name='_token']").val();
    var vPK_Sede = pPK_Sede;

    if (vPK_Sede == '') {
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
                url: '/SedeEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_Sede: vPK_Sede
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/Sede';", 500);
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


function funSedeEditar(pPK_Sede) {
    var _token = $("input[name='_token']").val();
    var vPK_Sede = pPK_Sede;

    if (vPK_Sede == '') {
        funValGenerica();
        return false;
    }

    $.ajax({
        url: '/SedeEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_Sede: vPK_Sede
        },
        beforeSend: function () {
            funBefore();
        },
        success: function (data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("HiPK_Sede").value = vPK_Sede;
            document.getElementById("TeNombreSede").value = data.pSed_Nombre;
            document.getElementById("TeTelefonoSede").value = data.pSed_Telefono;
            document.getElementById("TeDireccionSede").value = data.pSed_Direccion;
            document.getElementById("divSePais").innerHTML = data.pSePais;
            document.getElementById("divSeEntidad").innerHTML = data.pSeEntidad;
            document.getElementById("divSeMunicipio").innerHTML = data.pSeMunicipio;
            document.getElementById("divSeLocalidad").innerHTML = data.pSeLocalidad;

            FormElements.init();
        },
        error: function (data) {
            funError()
        }
    });

}