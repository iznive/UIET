
function funPostgradoSituacionGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_PostSituacion = document.getElementById("hiPK_PostSituacion").value;
    var vPSi_Nombre = document.getElementById("TePSi_Nombre").value;
 
   
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
                url: '/PostgradoSituacionGuardar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_PostSituacion: vPK_PostSituacion,
                    pPSi_Nombre: vPSi_Nombre
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/PostgradoSituacion';", 500);
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

function funPostgradoSituacionEliminar(pPK_PostSituacion) {
    var _token = $("input[name='_token']").val();
    var vPK_PostSituacion = pPK_PostSituacion;
   
    if (vPK_PostSituacion == '') {
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
                url: '/PostgradoSituacionEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_PostSituacion: vPK_PostSituacion
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/PostgradoSituacion';", 500);
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


function funPostgradoSituacionEditarForm(pPK_PostSituacion) {
    var _token = $("input[name='_token']").val();
      var vPK_PostSituacion = pPK_PostSituacion;

    if (vPK_PostSituacion == '') {
        funValGenerica();
        return false;
    }

    $.ajax({
        url: '/PostgradoSituacionEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_PostSituacion: vPK_PostSituacion
        },
        beforeSend: function () {
            funBefore();
        },
        success: function (data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("hiPK_PostSituacion").value = vPK_PostSituacion;
            document.getElementById("TePSi_Nombre").value = data.pPSi_Nombre;
        
            FormElements.init();
        },
        error: function (data) {
            funError()
        }
    });

}

