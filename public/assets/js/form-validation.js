var FormValidator = function() {
    "use strict";
    var validateCheckRadio = function(val) {
        $("input[type='radio'], input[type='checkbox']").on('ifChecked', function(event) {
            $(this).parent().closest(".has-error").removeClass("has-error").addClass("has-success").find(".help-block").hide().end().find('.symbol').addClass('ok');
        });
    };

    // function to initiate Validation Sample 2
    var runValidator = function() {
        var form = $('#form');
        var errorHandler2 = $('.errorHandler', form);
        var successHandler2 = $('.successHandler', form);

        form.validate({
            errorElement: "span", // contain the error msg in a small tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
                    error.insertAfter($(element).closest('.form-group').children('div'));
                } else {
                    error.insertAfter(element);
                    // for other inputs, just perform default behavior
                }
            },
            ignore: "",
            rules: {
                TeNombreSede: {
                    required: true
                },
                TeDireccionSede: {
                    required: true
                },
                TePue_Nombre: {
                    required: true
                },
                SeCatPuesto: {
                    required: true
                },
                TeCPu_Nombre: {
                    required: true
                },
                TeTCo_Nombre: {
                    required: true
                },
                TeSJe_Nombre: {
                    required: true
                },
                TeSJe_Abreviatura: {
                    required: true,
                    maxlength: 10
                },
                TeDep_Nombre: {
                    required: true
                },
                TeECi_Nombre: {
                    required: true
                },
                TeDep_Abreviatura: {
                    required: true,
                    maxlength: 10
                },
                TePer_Correo: {
                    email: true
                },
                TePer_Nombre: {
                    required: true,
                    maxlength: 50
                },
                TePer_Paterno: {
                    required: true,
                    maxlength: 50
                },
                TePer_Materno: {
                    required: true,
                    maxlength: 50
                },
                TePer_CURP: {
                    required: true,
                    maxlength: 18,
                    minlength: 18
                },
                TePer_RFC: {
                    required: true,
                    maxlength: 15
                },
                TePer_FecNacimiento: {
                    required: true,
                    maxlength: 10
                },
                SeEstaCivil: {
                    required: true
                },
                SePais: {
                    required: true
                },
                SeEntidad: {
                    required: true
                },
                SeMunicipio: {
                    required: true
                },
                SeLocalidad: {
                    required: true
                },
                SePais2: {
                    required: true
                },
                SeEntidad2: {
                    required: true
                },
                SeMunicipio2: {
                    required: true
                },
                SeLocalidad2: {
                    required: true
                },
                TeEFe_Nombre: {
                    required: true
                },
                SeFK_Pais: {
                    required: true
                },
                SeFK_Entidad: {
                    required: true
                },
                TeMun_Nombre: {
                    required: true
                },
                TeLoc_Nombre: {
                    required: true
                },
                TeLoc_CP: {
                    required: true
                },
                TeEmp_RFC: {
                    required: true
                },
                TeEmp_Nombre: {
                    required: true
                },
                TeEmp_Direccion: {
                    required: true
                },
                TeEmp_Web: {
                    required: true
                },
                TeDoc_Nombre: {
                    required: true
                },
                TeDoc_Indicacion: {
                    required: true
                },
                TeDoc_NivelRequerimiento: {
                    required: true
                },
                SeClasificacion: {
                    required: true
                },
                TeDCl_Nombre: {
                    required: true
                },
                TeLen_Nombre: {
                    required: true
                },
                SeLen_Tipo: {
                    required: true
                },
                TeDis_Nombre: {
                    required: true
                },
                TeFBa_Nombre: {
                    required: true
                },
                TeVNP_Nombre: {
                    required: true
                },
                TeINP_Nombre: {
                    required: true
                },
                RaPer_Sexo: {
                    required: true
                },
                TePer_Correo: {
                    required: true
                },
                TePFB_Instituto: {
                    required: true
                },
                SeNivelEducativo: {
                    required: true
                },
                TePFB_PeriodoInicio: {
                    required: true
                },
                TePFB_PeriodoFin: {
                    required: true
                },
                TePFB_Promedio: {
                    required: true
                }
            },
            messages: {
                TePer_Correo: {
                    email: "Por favor cumplir el formato correo@dominio.com"
                },
                TeSJe_Abreviatura: {
                    maxlength: jQuery.validator.format("Por favor ingresar máximo {0} caracteres.")
                },
                TeDep_Abreviatura: {
                    maxlength: jQuery.validator.format("Por favor ingresar máximo {0} caracteres.")
                },
                TePer_Nombre: {
                    maxlength: jQuery.validator.format("Por favor ingresar máximo {0} caracteres.")
                },
                TePer_Paterno: {
                    maxlength: jQuery.validator.format("Por favor ingresar máximo {0} caracteres.")
                },
                TePer_Materno: {
                    maxlength: jQuery.validator.format("Por favor ingresar máximo {0} caracteres.")
                },
                TePer_CURP: {
                    maxlength: jQuery.validator.format("Por favor ingresar máximo {0} caracteres."),
                    minlength: jQuery.validator.format("Por favor ingresar minimo {0} caracteres.")
                },
                TePer_RFC: {
                    maxlength: jQuery.validator.format("Por favor ingresar máximo {0} caracteres.")
                }
            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                successHandler2.hide();
                errorHandler2.show();
            },
            highlight: function(element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function(label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function(form) {
                successHandler2.show();
                errorHandler2.hide();
            }
        });
    };

    var runValidator0 = function() {
        var form = $('#form0');
        var errorHandler0 = $('.errorHandler', form);
        var successHandler0 = $('.successHandler', form);

        form.validate({
            errorElement: "span", // contain the error msg in a small tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
                    error.insertAfter($(element).closest('.form-group').children('div'));
                } else {
                    error.insertAfter(element);
                    // for other inputs, just perform default behavior
                }
            },
            ignore: "",
            rules: {
                TeNombreSede: {
                    required: true
                },
                TeDireccionSede: {
                    required: true
                },
                TePue_Nombre: {
                    required: true
                },
                SeCatPuesto: {
                    required: true
                },
                TeCPu_Nombre: {
                    required: true
                },
                TeTCo_Nombre: {
                    required: true
                },
                TeSJe_Nombre: {
                    required: true
                },
                TeSJe_Abreviatura: {
                    required: true,
                    maxlength: 10
                },
                TeDep_Nombre: {
                    required: true
                },
                TeECi_Nombre: {
                    required: true
                },
                TeDep_Abreviatura: {
                    required: true,
                    maxlength: 10
                },
                TePer_Correo: {
                    email: true
                },
                TePer_Nombre: {
                    required: true,
                    maxlength: 50
                },
                TePer_Paterno: {
                    required: true,
                    maxlength: 50
                },
                TePer_Materno: {
                    required: true,
                    maxlength: 50
                },
                TePer_CURP: {
                    required: true,
                    maxlength: 18,
                    minlength: 18
                },
                TePer_RFC: {
                    required: true,
                    maxlength: 15
                },
                TePer_FecNacimiento: {
                    required: true,
                    maxlength: 10
                },
                SeEstaCivil: {
                    required: true
                },
                SePais: {
                    required: true
                },
                SeEntidad: {
                    required: true
                },
                SeMunicipio: {
                    required: true
                },
                SeLocalidad: {
                    required: true
                },
                SePais2: {
                    required: true
                },
                SeEntidad2: {
                    required: true
                },
                SeMunicipio2: {
                    required: true
                },
                SeLocalidad2: {
                    required: true
                },
                TeEFe_Nombre: {
                    required: true
                },
                SeFK_Pais: {
                    required: true
                },
                SeFK_Entidad: {
                    required: true
                },
                TeMun_Nombre: {
                    required: true
                },
                TeLoc_Nombre: {
                    required: true
                },
                TeLoc_CP: {
                    required: true
                },
                TeEmp_RFC: {
                    required: true
                },
                TeEmp_Nombre: {
                    required: true
                },
                TeEmp_Direccion: {
                    required: true
                },
                TeEmp_Web: {
                    required: true
                },
                TeDoc_Nombre: {
                    required: true
                },
                TeDoc_Indicacion: {
                    required: true
                },
                TeDoc_NivelRequerimiento: {
                    required: true
                },
                SeClasificacion: {
                    required: true
                },
                TeDCl_Nombre: {
                    required: true
                },
                TeLen_Nombre: {
                    required: true
                },
                SeLen_Tipo: {
                    required: true
                },
                TeDis_Nombre: {
                    required: true
                },
                TeFBa_Nombre: {
                    required: true
                },
                TeVNP_Nombre: {
                    required: true
                },
                TeINP_Nombre: {
                    required: true
                },
                RaPer_Sexo: {
                    required: true
                },
                TePer_Correo: {
                    required: true
                }
            },
            messages: {
                TePer_Correo: {
                    email: "Por favor cumplir el formato correo@dominio.com"
                },
                TeSJe_Abreviatura: {
                    maxlength: jQuery.validator.format("Por favor ingresar máximo {0} caracteres.")
                },
                TeDep_Abreviatura: {
                    maxlength: jQuery.validator.format("Por favor ingresar máximo {0} caracteres.")
                },
                TePer_Nombre: {
                    maxlength: jQuery.validator.format("Por favor ingresar máximo {0} caracteres.")
                },
                TePer_Paterno: {
                    maxlength: jQuery.validator.format("Por favor ingresar máximo {0} caracteres.")
                },
                TePer_Materno: {
                    maxlength: jQuery.validator.format("Por favor ingresar máximo {0} caracteres.")
                },
                TePer_CURP: {
                    maxlength: jQuery.validator.format("Por favor ingresar máximo {0} caracteres."),
                    minlength: jQuery.validator.format("Por favor ingresar minimo {0} caracteres.")
                },
                TePer_RFC: {
                    maxlength: jQuery.validator.format("Por favor ingresar máximo {0} caracteres.")
                }
            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                successHandler0.hide();
                errorHandler0.show();
            },
            highlight: function(element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function(label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function(form) {
                successHandler0.show();
                errorHandler0.hide();
            }
        });
    };

    var runValidator2 = function() {
        var form = $('#form2');
        var errorHandler2 = $('.errorHandler', form);
        var successHandler2 = $('.successHandler', form);

        form.validate({
            errorElement: "span", // contain the error msg in a small tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
                    error.insertAfter($(element).closest('.form-group').children('div'));
                } else {
                    error.insertAfter(element);
                    // for other inputs, just perform default behavior
                }
            },
            ignore: "",
            rules: {
                SePFB_Tipo: {
                    required: true
                },
                TePFP_Instituto: {
                    required: true
                },
                TePFP_Estudio: {
                    required: true
                },
                TePFP_PeriodoInicio: {
                    required: true
                },
                TePFP_PeriodoFin: {
                    required: true
                },
                TePFP_Promedio: {
                    required: true
                }

            },
            messages: {

            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                successHandler2.hide();
                errorHandler2.show();
            },
            highlight: function(element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function(label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function(form) {
                successHandler2.show();
                errorHandler2.hide();
            }
        });
    };

    var runValidator3 = function() {
        var form = $('#form3');
        var errorHandler3 = $('.errorHandler', form);
        var successHandler3 = $('.successHandler', form);

        form.validate({
            errorElement: "span", // contain the error msg in a small tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
                    error.insertAfter($(element).closest('.form-group').children('div'));
                } else {
                    error.insertAfter(element);
                    // for other inputs, just perform default behavior
                }
            },
            ignore: "",
            rules: {
                SePostTipo: {
                    required: true
                },
                SePostSituacion: {
                    required: true
                },
                TePPo_Instituto: {
                    required: true
                },
                TePPo_Nombre: {
                    required: true
                },
                TePPo_PeriodoInicio: {
                    required: true
                },
                TePPo_PeriodoFin: {
                    required: true
                }

            },
            messages: {

            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                successHandler3.hide();
                errorHandler3.show();
            },
            highlight: function(element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function(label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function(form) {
                successHandler3.show();
                errorHandler3.hide();
            }
        });
    };

    var runValidator4 = function() {
        var form = $('#form4');
        var errorHandler4 = $('.errorHandler', form);
        var successHandler4 = $('.successHandler', form);

        form.validate({
            errorElement: "span", // contain the error msg in a small tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
                    error.insertAfter($(element).closest('.form-group').children('div'));
                } else {
                    error.insertAfter(element);
                    // for other inputs, just perform default behavior
                }
            },
            ignore: "",
            rules: {
                TePTe_Titulo: {
                    required: true
                },
                TePTe_Instituto: {
                    required: true
                },
                TePTe_PeriodoInicio: {
                    required: true
                },
                TePTe_PeriodoFin: {
                    required: true
                },
                TePTe_GradoObtenido: {
                    required: true
                }
            },
            messages: {

            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                successHandler4.hide();
                errorHandler4.show();
            },
            highlight: function(element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function(label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function(form) {
                successHandler4.show();
                errorHandler4.hide();
            }
        });
    };

    var runValidator5 = function() {
        var form = $('#form5');
        var errorHandler5 = $('.errorHandler', form);
        var successHandler5 = $('.successHandler', form);

        form.validate({
            errorElement: "span", // contain the error msg in a small tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
                    error.insertAfter($(element).closest('.form-group').children('div'));
                } else {
                    error.insertAfter(element);
                    // for other inputs, just perform default behavior
                }
            },
            ignore: "",
            rules: {
                TePFC_Instituto: {
                    required: true
                },
                TePFC_Nombre: {
                    required: true
                },
                TePFC_PeriodoInicio: {
                    required: true
                },
                TePFC_PeriodoFin: {
                    required: true
                }
            },
            messages: {

            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                successHandler5.hide();
                errorHandler5.show();
            },
            highlight: function(element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function(label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function(form) {
                successHandler5.show();
                errorHandler5.hide();
            }
        });
    };

    var runValidator6 = function() {
        var form = $('#form6');
        var errorHandler6 = $('.errorHandler', form);
        var successHandler6 = $('.successHandler', form);

        form.validate({
            errorElement: "span", // contain the error msg in a small tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
                    error.insertAfter($(element).closest('.form-group').children('div'));
                } else {
                    error.insertAfter(element);
                    // for other inputs, just perform default behavior
                }
            },
            ignore: "",
            rules: {
                SeLenTipo: {
                    required: true
                },
                SeLengua: {
                    required: true
                },
                SeHabla: {
                    required: true
                },
                SeLee: {
                    required: true
                },
                SeEscribe: {
                    required: true
                },
                SeComprende: {
                    required: true
                }
            },
            messages: {

            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                successHandler6.hide();
                errorHandler6.show();
            },
            highlight: function(element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function(label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function(form) {
                successHandler6.show();
                errorHandler6.hide();
            }
        });
    };

    var runValidator7 = function() {
        var form = $('#form7');
        var errorHandler7 = $('.errorHandler', form);
        var successHandler7 = $('.successHandler', form);

        form.validate({
            errorElement: "span", // contain the error msg in a small tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
                    error.insertAfter($(element).closest('.form-group').children('div'));
                } else {
                    error.insertAfter(element);
                    // for other inputs, just perform default behavior
                }
            },
            ignore: "",
            rules: {
                SeConoComputo: {
                    required: true
                },
                SeNivel: {
                    required: true
                }
            },
            messages: {

            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                successHandler7.hide();
                errorHandler7.show();
            },
            highlight: function(element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function(label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function(form) {
                successHandler7.show();
                errorHandler7.hide();
            }
        });
    };

    var runValidator8 = function() {
        var form = $('#form8');
        var errorHandler8 = $('.errorHandler', form);
        var successHandler8 = $('.successHandler', form);

        form.validate({
            errorElement: "span", // contain the error msg in a small tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
                    error.insertAfter($(element).closest('.form-group').children('div'));
                } else {
                    error.insertAfter(element);
                    // for other inputs, just perform default behavior
                }
            },
            ignore: "",
            rules: {
                TePAc_Instituto: {
                    required: true
                },
                TePAc_Nombre: {
                    required: true
                },
                TePAc_PeriodoInicio: {
                    required: true
                },
                TePAc_PeriodoFin: {
                    required: true
                }
            },
            messages: {

            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                successHandler8.hide();
                errorHandler8.show();
            },
            highlight: function(element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function(label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function(form) {
                successHandler8.show();
                errorHandler8.hide();
            }
        });
    };

    var runValidator9 = function() {
        var form = $('#form9');
        var errorHandler9 = $('.errorHandler', form);
        var successHandler9 = $('.successHandler', form);

        form.validate({
            errorElement: "span", // contain the error msg in a small tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
                    error.insertAfter($(element).closest('.form-group').children('div'));
                } else {
                    error.insertAfter(element);
                    // for other inputs, just perform default behavior
                }
            },
            ignore: "",
            rules: {
                TeEPr_Instituto: {
                    required: true
                },
                TeEPr_Puesto: {
                    required: true
                },
                TeEPr_PeriodoInicio: {
                    required: true
                },
                TeEPr_PeriodoFin: {
                    required: true
                }
            },
            messages: {

            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                successHandler9.hide();
                errorHandler9.show();
            },
            highlight: function(element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function(label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function(form) {
                successHandler9.show();
                errorHandler9.hide();
            }
        });
    };

    var runValidator10 = function() {
        var form = $('#form10');
        var errorHandler10 = $('.errorHandler', form);
        var successHandler10 = $('.successHandler', form);

        form.validate({
            errorElement: "span", // contain the error msg in a small tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
                    error.insertAfter($(element).closest('.form-group').children('div'));
                } else {
                    error.insertAfter(element);
                    // for other inputs, just perform default behavior
                }
            },
            ignore: "",
            rules: {
                TePDo_Instituto: {
                    required: true
                },
                SeNivEducativo: {
                    required: true
                },
                TePDo_PeriodoInicio: {
                    required: true
                },
                TePDo_PeriodoFin: {
                    required: true
                }
            },
            messages: {

            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                successHandler10.hide();
                errorHandler10.show();
            },
            highlight: function(element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function(label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function(form) {
                successHandler10.show();
                errorHandler10.hide();
            }
        });
    };

    var runValidator11 = function() {
        var form = $('#form11');
        var errorHandler11 = $('.errorHandler', form);
        var successHandler11 = $('.successHandler', form);

        form.validate({
            errorElement: "span", // contain the error msg in a small tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
                    error.insertAfter($(element).closest('.form-group').children('div'));
                } else {
                    error.insertAfter(element);
                    // for other inputs, just perform default behavior
                }
            },
            ignore: "",
            rules: {
                TePAT_Instituto: {
                    required: true
                },
                TePAT_Nombre: {
                    required: true
                },
                TePAT_CarreraPosgrado: {
                    required: true
                },
                TePAT_PeriodoInicio: {
                    required: true
                },
                TePAT_PeriodoFin: {
                    required: true
                }
            },
            messages: {

            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                successHandler11.hide();
                errorHandler11.show();
            },
            highlight: function(element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function(label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function(form) {
                successHandler11.show();
                errorHandler11.hide();
            }
        });
    };

    var runValidator12 = function() {
        var form = $('#form12');
        var errorHandler12 = $('.errorHandler', form);
        var successHandler12 = $('.successHandler', form);

        form.validate({
            errorElement: "span", // contain the error msg in a small tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
                    error.insertAfter($(element).closest('.form-group').children('div'));
                } else {
                    error.insertAfter(element);
                    // for other inputs, just perform default behavior
                }
            },
            ignore: "",
            rules: {
                TePEI_Instituto: {
                    required: true
                },
                TePEI_PeriodoInicio: {
                    required: true
                },
                TePEI_PeriodoFin: {
                    required: true
                }
            },
            messages: {

            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                successHandler12.hide();
                errorHandler12.show();
            },
            highlight: function(element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function(label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function(form) {
                successHandler12.show();
                errorHandler12.hide();
            }
        });
    };

    var runValidator13 = function() {
        var form = $('#form13');
        var errorHandler13 = $('.errorHandler', form);
        var successHandler13 = $('.successHandler', form);

        form.validate({
            errorElement: "span", // contain the error msg in a small tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
                    error.insertAfter($(element).closest('.form-group').children('div'));
                } else {
                    error.insertAfter(element);
                    // for other inputs, just perform default behavior
                }
            },
            ignore: "",
            rules: {
                TePCT_Instituto: {
                    required: true
                },
                TePCT_Nombre: {
                    required: true
                },
                TePCT_PeriodoInicio: {
                    required: true
                },
                TePCT_PeriodoFin: {
                    required: true
                }
            },
            messages: {

            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                successHandler13.hide();
                errorHandler13.show();
            },
            highlight: function(element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function(label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function(form) {
                successHandler13.show();
                errorHandler13.hide();
            }
        });
    };

    var runValidator14 = function() {
        var form = $('#form14');
        var errorHandler14 = $('.errorHandler', form);
        var successHandler14 = $('.successHandler', form);

        form.validate({
            errorElement: "span", // contain the error msg in a small tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
                    error.insertAfter($(element).closest('.form-group').children('div'));
                } else {
                    error.insertAfter(element);
                    // for other inputs, just perform default behavior
                }
            },
            ignore: "",
            rules: {
                TeEDC_Instituto: {
                    required: true
                },
                TeEDC_Nombre: {
                    required: true
                },
                SeExperienciaDT: {
                    required: true
                },
                TeEDC_PeriodoInicio: {
                    required: true
                },
                TeEDC_PeriodoFin: {
                    required: true
                }
            },
            messages: {

            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                successHandler14.hide();
                errorHandler14.show();
            },
            highlight: function(element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function(label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function(form) {
                successHandler14.show();
                errorHandler14.hide();
            }
        });
    };

    var runValidator15 = function() {
        var form = $('#form15');
        var errorHandler15 = $('.errorHandler', form);
        var successHandler15 = $('.successHandler', form);

        form.validate({
            errorElement: "span", // contain the error msg in a small tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
                    error.insertAfter($(element).closest('.form-group').children('div'));
                } else {
                    error.insertAfter(element);
                    // for other inputs, just perform default behavior
                }
            },
            ignore: "",
            rules: {
                TePEInv_Instituto: {
                    required: true
                },
                TePEI_Titulo: {
                    required: true
                },
                SeNivelParticipacion: {
                    required: true
                },
                TePEInv_PeriodoInicio: {
                    required: true
                },
                TePEInv_PeriodoFin: {
                    required: true
                }
            },
            messages: {

            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                successHandler15.hide();
                errorHandler15.show();
            },
            highlight: function(element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function(label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function(form) {
                successHandler15.show();
                errorHandler15.hide();
            }
        });
    };

    var runValidator16 = function() {
        var form = $('#form16');
        var errorHandler16 = $('.errorHandler', form);
        var successHandler16 = $('.successHandler', form);

        form.validate({
            errorElement: "span", // contain the error msg in a small tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
                    error.insertAfter($(element).closest('.form-group').children('div'));
                } else {
                    error.insertAfter(element);
                    // for other inputs, just perform default behavior
                }
            },
            ignore: "",
            rules: {
                TePEV_Instituto: {
                    required: true
                },
                TePEV_Titulo: {
                    required: true
                },
                SeVincNivePart: {
                    required: true
                },
                TePEV_PeriodoInicio: {
                    required: true
                },
                TePEV_PeriodoFin: {
                    required: true
                }
            },
            messages: {

            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                successHandler16.hide();
                errorHandler16.show();
            },
            highlight: function(element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function(label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function(form) {
                successHandler16.show();
                errorHandler16.hide();
            }
        });
    };

    var runValidator17 = function() {
        var form = $('#form17');
        var errorHandler17 = $('.errorHandler', form);
        var successHandler17 = $('.successHandler', form);

        form.validate({
            errorElement: "span", // contain the error msg in a small tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
                    error.insertAfter($(element).closest('.form-group').children('div'));
                } else {
                    error.insertAfter(element);
                    // for other inputs, just perform default behavior
                }
            },
            ignore: "",
            rules: {
                TePPu_Titulo: {
                    required: true
                },
                TePPu_Fecha: {
                    required: true
                },
                TePPu_ReferenciaBibliografica: {
                    required: true
                }
            },
            messages: {

            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                successHandler17.hide();
                errorHandler17.show();
            },
            highlight: function(element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function(label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function(form) {
                successHandler17.show();
                errorHandler17.hide();
            }
        });
    };

    var runValidator18 = function() {
        var form = $('#form18');
        var errorHandler18 = $('.errorHandler', form);
        var successHandler18 = $('.successHandler', form);

        form.validate({
            errorElement: "span", // contain the error msg in a small tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
                    error.insertAfter($(element).closest('.form-group').children('div'));
                } else {
                    error.insertAfter(element);
                    // for other inputs, just perform default behavior
                }
            },
            ignore: "",
            rules: {
                TePPP_Evento: {
                    required: true
                },
                TePPP_Tema: {
                    required: true
                },
                TePPP_PeriodoInicio: {
                    required: true
                },
                TePPP_PeriodoFin: {
                    required: true
                }
            },
            messages: {

            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                successHandler18.hide();
                errorHandler18.show();
            },
            highlight: function(element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function(label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function(form) {
                successHandler18.show();
                errorHandler18.hide();
            }
        });
    };

    var runValidator19 = function() {
        var form = $('#form19');
        var errorHandler19 = $('.errorHandler', form);
        var successHandler19 = $('.successHandler', form);

        form.validate({
            errorElement: "span", // contain the error msg in a small tag
            errorClass: 'help-block',
            errorPlacement: function(error, element) { // render error placement for each input type
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
                    error.insertAfter($(element).closest('.form-group').children('div'));
                } else {
                    error.insertAfter(element);
                    // for other inputs, just perform default behavior
                }
            },
            ignore: "",
            rules: {
                SeDiscapacidad: {
                    required: true
                }

            },
            messages: {

            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                successHandler19.hide();
                errorHandler19.show();
            },
            highlight: function(element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function(label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function(form) {
                successHandler19.show();
                errorHandler19.hide();
            }
        });
    };

    return {
        //main function to initiate template pages
        init: function() {
            validateCheckRadio();
            runValidator();
            runValidator0();
            runValidator2();
            runValidator3();
            runValidator4();
            runValidator5();
            runValidator6();
            runValidator7();
            runValidator8();
            runValidator9();
            runValidator10();
            runValidator11();
            runValidator12();
            runValidator13();
            runValidator14();
            runValidator15();
            runValidator16();
            runValidator17();
            runValidator18();
            runValidator19();
        }
    };
}();