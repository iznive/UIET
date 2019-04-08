function funDiscapacidadGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_Discapacidad = document.getElementById("HiPK_Discapacidad").value;
    var vDis_Nombre = document.getElementById("TeDis_Nombre").value;
    var vObservacion = document.getElementById("TeAObservacion_Discapacidad").value;

    if (vDis_Nombre == '') {
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
    }, function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '/DiscapacidadGuardar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_Discapacidad: vPK_Discapacidad,
                    pDis_Nombre: vDis_Nombre,
                    pObservacion: vObservacion
                },
                beforeSend: function() {
                    funBefore();
                },
                success: function(data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/Discapacidad';", 500);
                },
                error: function(data) {
                    funError();
                }
            });
        } else {
            console.log("Proceso Cancelado");
        }
    });
}


function funDiscapacidadEliminar(pPK_Discapacidad) {
    var _token = $("input[name='_token']").val();
    var vPK_Discapacidad = pPK_Discapacidad;

    if (vPK_Discapacidad == '') {
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
    }, function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: '/DiscapacidadEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_Discapacidad: vPK_Discapacidad
                },
                beforeSend: function() {
                    funBefore();
                },
                success: function(data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/Discapacidad';", 500);
                },
                error: function(data) {
                    funError();
                }
            });
        } else {
            console.log("Proceso Cancelado");
        }
    });

}


function funDiscapacidadEditarForm(pPK_Discapacidad) {
    var _token = $("input[name='_token']").val();
    var vPK_Discapacidad = pPK_Discapacidad;

    if (vPK_Discapacidad == '') {
        funValGenerica();
        return false;
    }

    $.ajax({
        url: '/DiscapacidadEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_Discapacidad: vPK_Discapacidad
        },
        beforeSend: function() {
            funBefore();
        },
        success: function(data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("HiPK_Discapacidad").value = vPK_Discapacidad;
            document.getElementById("TeDis_Nombre").value = data.pDis_Nombre;

            FormElements.init();
        },
        error: function(data) {
            funError()
        }
    });

}