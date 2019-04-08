

function funSeCarrGeneracion() {
    var _token = $("input[name='_token']").val();
    var vPK_Carrera = document.getElementById("SeCarrera").value;

    $.ajax({
        url: '/SeCarrGeneracion',
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
            document.getElementById("divSeCarrGeneracion").innerHTML = data.pSeCarrGeneracion;
            FormElements.init();
        },
        error: function (data) {
            funError();
        }
    });
}


function funSEAlumno_Consultar() {
    var _token = $("input[name='_token']").val();
    var vPK_Alumno = "NULL";
    var vAlu_Matricula = "NULL";
    var vPK_Sede = document.getElementById("SeSede").value;
    var vPK_Carrera = document.getElementById("SeCarrera").value;
    var vPK_CarrGeneracion = document.getElementById("SeCarrGeneracion").value;
    var vFK_Periodo_Inicio = document.getElementById("SePeriodoIni").value;
    var vFK_Periodo_Fin = document.getElementById("SePeriodoFin").value;
    var vPK_AlumSituacion = document.getElementById("SeAlumSituacion").value;
    var vAlu_Sexo = $('input:radio[name=RaAlu_Sexo]:checked').val();

    $.ajax({
        url: '/SE_Alumno_Consultar',
        type: 'POST',
        data: {
            _token: _token,
            pPK_Alumno: vPK_Alumno,
            pAlu_Matricula: vAlu_Matricula,
            pPK_Sede: vPK_Sede,
            pPK_Carrera: vPK_Carrera,
            pPK_CarrGeneracion: vPK_CarrGeneracion,
            pFK_Periodo_Inicio: vFK_Periodo_Inicio,
            pFK_Periodo_Fin: vFK_Periodo_Fin,
            pPK_AlumSituacion: vPK_AlumSituacion,
            pAlu_Sexo: vAlu_Sexo
        },

        beforeSend: function () {
            document.getElementById("divTabConsultar").innerHTML = '<center><img src="/img/iconos/iLoading.svg" style="width:50px; height:50px;" /> Cargando, por favor espere...</center>';
        },
        success: function (data) {
            document.getElementById("divTabConsultar").innerHTML = data.pTabConsultar;
            funTable1();
        },
        error: function (data) {
            swal("Error Interno", "Ha ocurrido un error, inténtelo nuevamente, si el problema persiste comuníquese con el administrador del sistema.", "error");
            document.getElementById("divTabConsultar").innerHTML = '<center><img src="/img/iconos/iFail.svg" style="width:50px; height:50px;"/></center>';
        }
    });
}
