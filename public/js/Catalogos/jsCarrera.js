 
function funCarreraGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_Carrera = document.getElementById("hiPK_Carrera").value;
    var vCar_ClaveDGP = document.getElementById("TeCar_ClaveDGP").value;
    var vCar_Nombre = document.getElementById("TeCar_Nombre").value;
    var vCar_NombreCorto = document.getElementById("TeCar_NombreCorto").value;
    var vCar_FechaRegistro = document.getElementById("TeCar_FechaRegistro").value;
    var vCar_Modalidad  = $('input:radio[name=RaCar_Modalidad]:checked').val();
 
     

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
                url: '/CarreraGuardar',
                type: 'POST',

                data: {
                    _token: _token,
                   pCar_ClaveDGP: vCar_ClaveDGP,
                    pPK_Carrera: vPK_Carrera,
                    pCar_Nombre: vCar_Nombre,
                    pCar_NombreCorto: vCar_NombreCorto,
                    pCar_Modalidad: vCar_Modalidad,
                    pCar_FechaRegistro:vCar_FechaRegistro
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/Carrera';", 500);
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

function funCarreraEliminar(pPK_Carrera) {
    var _token = $("input[name='_token']").val();
    var vPK_Carrera = pPK_Carrera;
   
    if (vPK_Carrera == '') {
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
                url: '/CarreraEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_Carrera: vPK_Carrera
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/Carrera';", 500);
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


function funCarreraEditarForm(pPK_Carrera) {
    var _token = $("input[name='_token']").val();
      var vPK_Carrera = pPK_Carrera;

    if (vPK_Carrera == '') {
        funValGenerica();
        return false;
    }

    $.ajax({
        url: '/CarreraEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_Carrera: vPK_Carrera
        },
        beforeSend: function () {
            funBefore();
        },
        success: function (data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("hiPK_Carrera").value = pPK_Carrera;
            document.getElementById("TeCar_ClaveDGP").value = data.pCar_ClaveDGP;
            document.getElementById("TeCar_Nombre").value = data.pCar_Nombre;
            document.getElementById("TeCar_NombreCorto").value = data.pCar_NombreCorto;
            document.getElementById("TeCar_FechaRegistro").value = data.pCar_FechaRegistro;  
            //$('input:radio[name=RaCar_Modalidad]:checked').value = data.pCar_Modalidad;
         
                   
            FormElements.init();
        },
        error: function (data) {
            funError()
        }
    });

}

