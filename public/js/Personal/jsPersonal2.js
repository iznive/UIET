function funPersonalConsultar() {
    var _token = $("input[name='_token']").val();
    var vPK_PersSituacion = document.getElementById("SeSituacion").value;
    var vPK_Sede = document.getElementById("SeSede").value;
    var vPK_SupeJerarquico = document.getElementById("SeSuperiorJerarquico").value;
    var vPK_CatePuesto = document.getElementById("SeCategoria").value;
    var vPK_TipoContrato = document.getElementById("SeTipoContrato").value;
    var vPK_Departamento = document.getElementById("SeDepartamento").value;
    var vPK_EstaCivil = document.getElementById("SeEstaCivil").value;
    var vPer_Sexo = $('input:radio[name=RaPer_Sexo]:checked').val();

    $.ajax({
        url: '/PersonalConsultar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_PersSituacion: vPK_PersSituacion,
            pPK_Sede: vPK_Sede,
            pPK_SupeJerarquico: vPK_SupeJerarquico,
            pPK_CatePuesto: vPK_CatePuesto,
            pPK_TipoContrato: vPK_TipoContrato,
            pPK_Departamento: vPK_Departamento,
            pPK_EstaCivil: vPK_EstaCivil,
            pPer_Sexo: vPer_Sexo
        },

        beforeSend: function() {
            funBefore();
        },
        success: function(data) {
            document.getElementById("divPanel").innerHTML = data.pTabPer;
            funTable1();
            FormElements.init();
        },
        error: function(data) {
            funError();
        }
    });
}



function funPersonalEditarForm(pPK_Personal) {
    var _token = $("input[name='_token']").val();
    var vPK_Personal = pPK_Personal;
    setTimeout("location.href='/Personal_EditarForm/" + vPK_Personal + "';", 500);
}

function funPersonalConsultarForm(pPK_Personal) {
    var _token = $("input[name='_token']").val();
    var vPK_Personal = pPK_Personal;
    location.href = '/Personal_ConsultarForm/' + vPK_Personal;
}



function funPersonalEliminar(pPK_Personal) {
    var _token = $("input[name='_token']").val();
    var vPK_Personal = pPK_Personal;

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
                url: '/PersonalEliminar',
                type: 'POST',

                data: {
                    _token: _token,
                    pPK_Personal: vPK_Personal
                },
                beforeSend: function() {
                    funBefore2();
                },
                success: function(data) {
                    setTimeout("location.href='/Personal';", 500);
                },
                error: function(data) {
                    funError2();
                }
            });
        } else {
            console.log("Proceso Cancelado");
        }
    });
}