function funEntidadGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_Entidad = document.getElementById("HiPK_Entidad").value;
    var vFK_Pais = document.getElementById("SeFK_Pais").value;
    var vEFe_Nombre = document.getElementById("TeEFe_Nombre").value;
    var vObservacion = document.getElementById("TeAObservacion_Entidad").value;


    if (vEFe_Nombre == '') {
        return false;
    }

    if (vFK_Pais == '' || vFK_Pais == 'x1') {
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
                url: '/EntidadGuardar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_Entidad: vPK_Entidad,
                    pFK_Pais: vFK_Pais,
                    pEFe_Nombre: vEFe_Nombre,
                    pObservacion: vObservacion
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/Entidad';", 500);
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

function funEntidadEliminar(pPK_Entidad) {
    var _token = $("input[name='_token']").val();
    var vPK_Entidad = pPK_Entidad;

    if (vPK_Entidad == '') {
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
                url: '/EntidadEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_Entidad: vPK_Entidad
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/Entidad';", 500);
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


function funEntidadEditarForm(pPK_Entidad) {
    var _token = $("input[name='_token']").val();
    var vPK_Entidad = pPK_Entidad;

    if (vPK_Entidad == '') {
        funValGenerica();
        return false;
    }

    $.ajax({
        url: '/EntidadEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_Entidad: vPK_Entidad
        },
        beforeSend: function () {
            funBefore();
        },
        success: function (data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("HiPK_Entidad").value = vPK_Entidad;
            document.getElementById("TeEFe_Nombre").value = data.pEFe_Nombre;
            document.getElementById("divSeFK_Pais").innerHTML = data.pSeFK_Pais;

            FormElements.init();
        },
        error: function (data) {
            funError()
        }
    });

}

