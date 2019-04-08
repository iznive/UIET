function funEmpresaGuardar() {
    var _token = $("input[name='_token']").val();
    var vPK_Empresa = document.getElementById("HiPK_Empresa").value;
    var vEmp_RFC = document.getElementById("TeEmp_RFC").value;
    var vEmp_Nombre = document.getElementById("TeEmp_Nombre").value;
    var vEmp_Direccion = document.getElementById("TeEmp_Direccion").value;
    var vEmp_Web = document.getElementById("TeEmp_Web").value;

    if (vEmp_Nombre == '') {
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
                url: '/EmpresaGuardar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_Empresa: vPK_Empresa,
                    pEmp_RFC: vEmp_RFC,
                    pEmp_Nombre: vEmp_Nombre,
                    pEmp_Direccion: vEmp_Direccion,
                    pEmp_Web: vEmp_Web
                },
                beforeSend: function () {
                    funBefore();
                },
                success: function (data) {
                    document.getElementById("divPanel").innerHTML = '';
                    swal("Notificación", data.Msj, data.TMsj);
                    setTimeout("location.href='/Empresa';", 500);
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


function funEmpresaEditarForm(pPK_Empresa) {
    var _token = $("input[name='_token']").val();
    var vPK_Empresa = pPK_Empresa;

    if (vPK_Empresa == '') {
        funValGenerica();
        return false;
    }

    $.ajax({
        url: '/EmpresaEditarForm',
        type: 'POST',

        data: {
            _token: _token,
            pPK_Empresa: vPK_Empresa
        },
        beforeSend: function () {
            funBefore();
        },
        success: function (data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("HiPK_Empresa").value = vPK_Empresa;
            document.getElementById("TeEmp_RFC").value = data.pEmp_RFC;
            document.getElementById("TeEmp_Nombre").value = data.pEmp_Nombre;
            document.getElementById("TeEmp_Direccion").value = data.pEmp_Direccion;
            document.getElementById("TeEmp_Web").value = data.pEmp_Web;

            FormElements.init();
        },
        error: function (data) {
            funError()
        }
    });

}

