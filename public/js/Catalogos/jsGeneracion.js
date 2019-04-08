
function funGeneracionGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_Generacion = document.getElementById("hiPK_Generacion").value;
    var vGen_Ano = document.getElementById("DaGen_Ano").value;
    var vGen_Nombre = document.getElementById("TeGen_Nombre").value;
    var vGen_NombreCorto = document.getElementById("TeGen_NombreCorto").value;
    var varr_AnoGen = vGen_Ano.split("-");
    var  vAnoGen = varr_AnoGen[0];
        if (vAnoGen == 0)  {
            funValGenerica();
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
                url: '/GeneracionGuardar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_Generacion: vPK_Generacion,
                    pGen_Ano: vAnoGen,
                    pGen_Nombre: vGen_Nombre,
                    pGen_NombreCorto: vGen_NombreCorto
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/Generacion';", 500);
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

function funGeneracionEliminar(pPK_Generacion) {
    var _token = $("input[name='_token']").val();
    var vPK_Generacion = pPK_Generacion;
   
    if (vPK_Generacion == '') {
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
                url: '/GeneracionEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_Generacion: vPK_Generacion
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/Generacion';", 500);
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


function funGeneracionEditarForm(pPK_Generacion) {
    var _token = $("input[name='_token']").val();
      var vPK_Generacion = pPK_Generacion;

    if (vPK_Generacion == '') {
        funValGenerica();
        return false;
    }


    $.ajax({
        url: '/GeneracionEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_Generacion: vPK_Generacion
        },
        beforeSend: function () {
            funBefore();
        },
        success: function (data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("hiPK_Generacion").value = vPK_Generacion;
            document.getElementById("DaGen_Ano").value =data.pGen_Ano +'-01-01';
            document.getElementById("TeGen_Nombre").value = data.pGen_Nombre;
            document.getElementById("TeGen_NombreCorto").value = data.pGen_NombreCorto;
        


            FormElements.init();
        },
        error: function (data) {
            funError()
        }
    });

}

