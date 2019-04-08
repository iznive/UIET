
function funPostgradoTipoGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_PostTipo = document.getElementById("hiPK_PostTipo").value;
    var vPTi_Nombre = document.getElementById("TePTi_Nombre").value;
 
   
  
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
                url: '/PostgradoTipoGuardar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_PostTipo: vPK_PostTipo,
                    pPTi_Nombre: vPTi_Nombre
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/PostgradoTipo';", 500);
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

function funPostgradoTipoEliminar(pPK_PostTipo) {
    var _token = $("input[name='_token']").val();
    var vPK_PostTipo = pPK_PostTipo;
   
    if (vPK_PostTipo == '') {
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
                url: '/PostgradoTipoEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_PostTipo: vPK_PostTipo
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/PostgradoTipo';", 500);
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


function funPostgradoTipoEditarForm(pPK_PostTipo) {
    var _token = $("input[name='_token']").val();
      var vPK_PostTipo = pPK_PostTipo;

    if (vPK_PostTipo == '') {
        funValGenerica();
        return false;
    }

    $.ajax({
        url: '/PostgradoTipoEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_PostTipo: vPK_PostTipo
        },
        beforeSend: function () {
            funBefore();
        },
        success: function (data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("hiPK_PostTipo").value = pPK_PostTipo;
            document.getElementById("TePTi_Nombre").value = data.pPTi_Nombre;
        
            FormElements.init();
        },
        error: function (data) {
            funError()
        }
    });

}

