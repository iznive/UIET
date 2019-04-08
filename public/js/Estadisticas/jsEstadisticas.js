function funGenRH_INEGI() {
    var _token = $("input[name='_token']").val();

    var vFecInicio = document.getElementById("TeFecInicio").value;
    var vFecFin = document.getElementById("TeFecFin").value;
    
    vFecInicio = vFecInicio.split("/").reverse().join("-");
    vFecFin = vFecFin.split("/").reverse().join("-");

    $.ajax({
        url: '/Esta_RH_INEGI_Generar',
        type: 'POST',

        data: {
            _token: _token,
            pFecInicio: vFecInicio,
            pFecFin: vFecFin
        },
        beforeSend: function () {
            funBefore();
        },
        success: function (data) {
            document.getElementById("divPanel").innerHTML = "";
            document.getElementById("divTablaContEdad").innerHTML = data.pTablaContEdad;
            document.getElementById("divTablaContNivelEstudio").innerHTML = data.pTablaContNivelEstudio;
        },
        error: function (data) {
            funError();
        }
    });

}
