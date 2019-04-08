
function funAreaFormacionGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_AreaFormacion = document.getElementById("hiPK_AreaFormacion").value;
    var vAFo_Nombre = document.getElementById("TeAFo_Nombre").value;
 
      

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
                url: '/AreaFormacionGuardar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_AreaFormacion: vPK_AreaFormacion,
                    pAFo_Nombre: vAFo_Nombre
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/AreaFormacion';", 500);
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

function funAreaFormacionEliminar(pPK_AreaFormacion) {
    var _token = $("input[name='_token']").val();
    var vPK_AreaFormacion = pPK_AreaFormacion;
   
    if (vPK_AreaFormacion == '') {
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
                url: '/AreaFormacionEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_AreaFormacion: vPK_AreaFormacion
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/AreaFormacion';", 500);
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


function funAreaFormacionEditarForm(pPK_AreaFormacion) {
    var _token = $("input[name='_token']").val();
      var vPK_AreaFormacion = pPK_AreaFormacion;

    if (vPK_AreaFormacion == '') {
        funValGenerica();
        return false;
    }

    $.ajax({
        url: '/AreaFormacionEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_AreaFormacion: vPK_AreaFormacion
        },
        beforeSend: function () {
            funBefore();
        },
        success: function (data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("hiPK_AreaFormacion").value = vPK_AreaFormacion;
            document.getElementById("TeAFo_Nombre").value = data.pAFo_Nombre;
        
            FormElements.init();
        },
        error: function (data) {
            funError()
        }
    });

}

