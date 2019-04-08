

function funGenRH_Personal() {
    var _token = $("input[name='_token']").val();

    var vRep = document.getElementById("SeReporte").value;

    if (vRep == '' || vRep == 'x1') {
        swal("Notificación", "Seleccionar Reporte", "warning");
        return false;
    }

    var vPK_Sede = document.getElementById("SeSede").value;
    var vPK_SupeJerarquico = document.getElementById("SeSuperiorJerarquico").value;
    var vPK_CatePuesto = document.getElementById("SeCategoria").value;
    var vPK_TipoContrato = document.getElementById("SeTipoContrato").value;
    var vPK_Departamento = document.getElementById("SeDepartamento").value;
    var vPK_Entidad = document.getElementById("SeEntidad").value;
    var vPK_EstaCivil = document.getElementById("SeEstaCivil").value;

    var vFecInicio = document.getElementById("TeFecInicio").value;
    var vFecFin = document.getElementById("TeFecFin").value;

    if (vFecInicio=="") {
        vFecInicio = "NULL";
    } else {
        vFecInicio = vFecInicio.split("/").reverse().join("-");
    }

    if (vFecFin=="") {
        vFecFin = "NULL";
    } else {
        vFecFin = vFecFin.split("/").reverse().join("-");
    }

    var vPer_Sexo = $('input:radio[name=RaPer_Sexo]:checked').val();

    var form =
        $('<form action="http://localhost:51452/index.aspx" method="get" target="_blank">' +
            '<input type="hidden" name="pREP" value="' + vRep + '" />' +
            '<input type="hidden" name="pPK_Sede" value="' + vPK_Sede + '" />' +
            '<input type="hidden" name="pPK_SupeJerarquico" value="' + vPK_SupeJerarquico + '" />' +
            '<input type="hidden" name="pPK_CatePuesto" value="' + vPK_CatePuesto + '" />' +
            '<input type="hidden" name="pPK_TipoContrato" value="' + vPK_TipoContrato + '" />' +
            '<input type="hidden" name="pFecInicio" value="' + vFecInicio + '" />' +
            '<input type="hidden" name="pFecFin" value="' + vFecFin + '" />' +
            '<input type="hidden" name="pPer_Sexo" value="' + vPer_Sexo + '" />' +
            '<input type="hidden" name="pPK_Departamento" value="' + vPK_Departamento + '" />' +
            '<input type="hidden" name="pPK_Entidad" value="' + vPK_Entidad + '" />' +
            '<input type="hidden" name="pPK_EstaCivil" value="' + vPK_EstaCivil + '" />' +
            '</form>');

    $('body').append(form);
    form.submit();
}