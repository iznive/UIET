function funDepartamentoGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_Departamento = document.getElementById("HiPK_Departamento").value;
    var vDep_Nombre = document.getElementById("TeDep_Nombre").value;
    var vDep_Abreviatura = document.getElementById("TeDep_Abreviatura").value;

    if (vDep_Nombre == '') {
        return false;
    }

    if (vDep_Abreviatura == '') {
        return false;
    }

    if (vDep_Abreviatura.length  > 10) {
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
                url: '/DepartamentoGuardar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_Departamento: vPK_Departamento,
                    pDep_Nombre: vDep_Nombre,
                    pDep_Abreviatura: vDep_Abreviatura
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/Departamento';", 500);
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

function funDepartamentoEliminar(pPK_Departamento) {
    var _token = $("input[name='_token']").val();
    var vPK_Departamento = pPK_Departamento;

    if (vPK_Departamento == '') {
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
                url: '/DepartamentoEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_Departamento: vPK_Departamento
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/Departamento';", 500);
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


function funDepartamentoEditarForm(pPK_Departamento) {
    var _token = $("input[name='_token']").val();
    var vPK_Departamento = pPK_Departamento;

    if (vPK_Departamento == '') {
        funValGenerica();
        return false;
    }

    $.ajax({
        url: '/DepartamentoEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_Departamento: vPK_Departamento
        },
        beforeSend: function () {
            funBefore();
        },
        success: function (data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("HiPK_Departamento").value = vPK_Departamento;
            document.getElementById("TeDep_Nombre").value = data.pDep_Nombre;
            document.getElementById("TeDep_Abreviatura").value = data.pDep_Abreviatura;

            FormElements.init();
        },
        error: function (data) {
            funError()
        }
    });

}

