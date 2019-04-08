
function funEjeFormacionGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_EjeFormacion = document.getElementById("hiPK_EjeFormacion").value;
    var vEFo_Nombre = document.getElementById("TeEFo_Nombre").value;
 
     
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
                url: '/EjeFormacionGuardar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_EjeFormacion: vPK_EjeFormacion,
                    pEFo_Nombre: vEFo_Nombre
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/EjeFormacion';", 500);
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

function funEjeFormacionEliminar(pPK_EjeFormacion) {
    var _token = $("input[name='_token']").val();
    var vPK_EjeFormacion = pPK_EjeFormacion;
   
    if (vPK_EjeFormacion == '') {
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
                url: '/EjeFormacionEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_EjeFormacion: vPK_EjeFormacion
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/EjeFormacion';", 500);
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


function funEjeFormacionEditarForm(pPK_EjeFormacion) {
    var _token = $("input[name='_token']").val();
      var vPK_EjeFormacion = pPK_EjeFormacion;

    if (vPK_EjeFormacion == '') {
        funValGenerica();
        return false;
    }

    $.ajax({
        url: '/EjeFormacionEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_EjeFormacion: vPK_EjeFormacion
        },
        beforeSend: function () {
            funBefore();
        },
        success: function (data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("hiPK_EjeFormacion").value = vPK_EjeFormacion;
            document.getElementById("TeEFo_Nombre").value = data.pEFo_Nombre;
        
            FormElements.init();
        },
        error: function (data) {
            funError()
        }
    });

}

