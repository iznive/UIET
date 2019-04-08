function funError() {
    swal("Error Interno", "Ha ocurrido un error, inténtelo nuevamente, si el problema persiste comuníquese con el administrador del sistema.", "error");
    document.getElementById("divPanel").innerHTML = '<center><img src="img/iconos/iFail.svg" style="width:50px; height:50px;"/></center>';
}

function funBefore() {
    document.getElementById("divPanel").innerHTML = '<center><img src="img/iconos/iLoading.svg" style="width:50px; height:50px;" /> Cargando, por favor espere...</center>';
}

function funError2() {
    swal("Error Interno", "Ha ocurrido un error, inténtelo nuevamente, si el problema persiste comuníquese con el administrador del sistema.", "error");
    document.getElementById("divPanel").innerHTML = '<center><img src="../img/iconos/iFail.svg" style="width:50px; height:50px;"/></center>';
}

function funBefore2() {
    document.getElementById("divPanel").innerHTML = '<center><img src="../img/iconos/iLoading.svg" style="width:50px; height:50px;" /> Cargando, por favor espere...</center>';
}

function funBeforeClear() {
    document.getElementById("divPanel").innerHTML = '';
}

function funValGenerica() {
    swal("Notificación", "Volver a intentarlo por favor", "warning");
}

function funValNumCaracteres(pMaxCaracteres) {
    swal("Notificación", "Volver a intentarlo por favor, no mas de " + pMaxCaracteres + " caracteres", "warning");
}



function funBitacora(pBit_Tabla, pBit_PK) {
    var _token = $("input[name='_token']").val();
    var vBit_Tabla = pBit_Tabla;
    var vBit_PK = pBit_PK;

    $.ajax({
        url: '/Bitacora',
        type: 'POST',
        data: {
            _token: _token,
            pBit_Tabla: vBit_Tabla,
            pBit_PK: vBit_PK,
        },

        beforeSend: function() {
            document.getElementById("divMoBitacora").innerHTML = '<center><img src="img/iconos/iLoading.svg" style="width:50px; height:50px;" /> Cargando, por favor espere...</center>';
        },
        success: function(data) {
            document.getElementById("divMoBitacora").innerHTML = data.pTaBitacora;
            funTable2();
        },
        error: function(data) {
            swal("Error Interno", "Ha ocurrido un error, intentelo nuevamente, si el problema persiste comuniquese con el administrador del sistema.", "error");
            document.getElementById("divMoBitacora").innerHTML = '<center><img src="img/iconos/iFail.svg" style="width:50px; height:50px;"/></center>';
        }
    });
}

function funBitacora2(pBit_Tabla, pBit_PK) {
    var _token = $("input[name='_token']").val();
    var vBit_Tabla = pBit_Tabla;
    var vBit_PK = pBit_PK;

    $.ajax({
        url: '/Bitacora',
        type: 'POST',
        data: {
            _token: _token,
            pBit_Tabla: vBit_Tabla,
            pBit_PK: vBit_PK,
        },

        beforeSend: function() {
            document.getElementById("divMoBitacora").innerHTML = '<center><img src="../img/iconos/iLoading.svg" style="width:50px; height:50px;" /> Cargando, por favor espere...</center>';
        },
        success: function(data) {
            document.getElementById("divMoBitacora").innerHTML = data.pTaBitacora;
            funTable2();
        },
        error: function(data) {
            funError();
        }
    });
}

function funSeEntidad() {
    var _token = $("input[name='_token']").val();
    var vPK_Pais = document.getElementById("SePais").value;

    $.ajax({
        url: '/SeEntidad',
        type: 'POST',
        data: {
            _token: _token,
            pPK_Pais: vPK_Pais
        },

        beforeSend: function() {
            funBefore();
        },
        success: function(data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("divSeEntidad").innerHTML = data.divSeEntidad;
            FormElements.init();
        },
        error: function(data) {
            funError();
        }
    });
}


function funSeMunicipio() {
    var _token = $("input[name='_token']").val();
    var vPK_Entidad = document.getElementById("SeEntidad").value;

    $.ajax({
        url: '/SeMunicipio',
        type: 'POST',
        data: {
            _token: _token,
            pPK_Entidad: vPK_Entidad
        },

        beforeSend: function() {
            funBefore();
        },
        success: function(data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("divSeMunicipio").innerHTML = data.divSeMunicipio;
            FormElements.init();
        },
        error: function(data) {
            funError();
        }
    });
}


function funSeLocalidad() {
    var _token = $("input[name='_token']").val();
    var vPK_Municipio = document.getElementById("SeMunicipio").value;

    $.ajax({
        url: '/SeLocalidad',
        type: 'POST',
        data: {
            _token: _token,
            pPK_Municipio: vPK_Municipio
        },

        beforeSend: function() {
            funBefore();
        },
        success: function(data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("divSeLocalidad").innerHTML = data.divSeLocalidad;
            FormElements.init();
        },
        error: function(data) {
            funError();
        }
    });
}



function funSeEntidad2() {
    var _token = $("input[name='_token']").val();
    var vPK_Pais = document.getElementById("SePais2").value;

    $.ajax({
        url: '/SeEntidad2',
        type: 'POST',
        data: {
            _token: _token,
            pPK_Pais: vPK_Pais
        },

        beforeSend: function() {
            funBefore();
        },
        success: function(data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("divSeEntidad2").innerHTML = data.divSeEntidad2;
            FormElements.init();
        },
        error: function(data) {
            funError();
        }
    });
}


function funSeMunicipio2() {
    var _token = $("input[name='_token']").val();
    var vPK_Entidad = document.getElementById("SeEntidad2").value;

    $.ajax({
        url: '/SeMunicipio2',
        type: 'POST',
        data: {
            _token: _token,
            pPK_Entidad: vPK_Entidad
        },

        beforeSend: function() {
            funBefore();
        },
        success: function(data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("divSeMunicipio2").innerHTML = data.divSeMunicipio2;
            FormElements.init();
        },
        error: function(data) {
            funError();
        }
    });
}


function funSeLocalidad2() {
    var _token = $("input[name='_token']").val();
    var vPK_Municipio = document.getElementById("SeMunicipio2").value;

    $.ajax({
        url: '/SeLocalidad2',
        type: 'POST',
        data: {
            _token: _token,
            pPK_Municipio: vPK_Municipio
        },

        beforeSend: function() {
            funBefore();
        },
        success: function(data) {
            document.getElementById("divPanel").innerHTML = '';
            document.getElementById("divSeLocalidad2").innerHTML = data.divSeLocalidad2;
            FormElements.init();
        },
        error: function(data) {
            funError();
        }
    });
}


function funTable1() {
    var oTable = $('#sample_1').dataTable({
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        "aoColumnDefs": [{
            "aTargets": [0]
        }],
        "aaSorting": [
            [0, 'asc']
        ],
        "aLengthMenu": [
            [50, 100, 200, 500, -1],
            [50, 100, 200, 500, "Todo"] // change per page values here
        ],

        // set the initial value
        "iDisplayLength": 50,
        destroy: true,
    });
    $('#sample_1_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "");
    // modify table search input
    $('#sample_1_wrapper .dataTables_length select').addClass("m-wrap small");
    // modify table per page dropdown
    $('#sample_1_wrapper .dataTables_length select').wrap("<div class='clip-select inline-block'></div>");
    // add custom class to select dropdown
    $('#sample_1_column_toggler input[type="checkbox"]').change(function() {
        /* Get the DataTables object again - this is not a recreation, just a get of the object */
        var iCol = parseInt($(this).attr("data-column"));
        var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
        oTable.fnSetColumnVis(iCol, (bVis ? false : true));
    });
}


function funTable2() {
    var oTable = $('#sample_2').dataTable({
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        "aoColumnDefs": [{
            "aTargets": [0]
        }],
        "aaSorting": [
            [0, 'asc']
        ],
        "aLengthMenu": [
            [50, 100, 200, 500, -1],
            [50, 100, 200, 500, "Todo"] // change per page values here
        ],

        // set the initial value
        "iDisplayLength": 50,
        destroy: true,
    });
    $('#sample_2_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "");
    // modify table search input
    $('#sample_2_wrapper .dataTables_length select').addClass("m-wrap small");
    // modify table per page dropdown
    $('#sample_2_wrapper .dataTables_length select').wrap("<div class='clip-select inline-block'></div>");
    // add custom class to select dropdown
    $('#sample_2_column_toggler input[type="checkbox"]').change(function() {
        /* Get the DataTables object again - this is not a recreation, just a get of the object */
        var iCol = parseInt($(this).attr("data-column"));
        var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
        oTable.fnSetColumnVis(iCol, (bVis ? false : true));
    });
}