
//datetimepickerMODAL
        $(function () {

    $(".menu-bar").on('click', function(e){
        e.preventDefault();
        $("nav").toggleClass('hide');
        $("span", this).toggleClass("fa-align-justify fa-times");
        $(".main-menu").addClass('mobile-menu');
    });


                $('#datetimepickerInicio').datetimepicker({
                  icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
                  locale: 'es', //Control idioma
                  daysOfWeekDisabled: [0, 6],  //Desactiva los dias de la semana
                  format: 'YYYY/MM/DD hh:mm a' //Formato de fecha y hora
                });
                $('#datetimepickerFinal').datetimepicker({
                  icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
                  locale: 'es', //Control idioma
                  daysOfWeekDisabled: [0, 6], //Desactiva los dias de la semana
                  format: 'YYYY/MM/DD hh:mm a', //Formato de fecha y hora
                  useCurrent: false
                });

                $("#datetimepickerInicio").on("dp.change", function (e) {
                  $('#datetimepickerFinal').data("DateTimePicker").minDate(e.date);
                });

                $("#datetimepickerFinal").on("dp.change", function (e) {
                  $('#datetimepickerInicio').data("DateTimePicker").maxDate(e.date);
                });



                $('#datetimepickerInicio1').datetimepicker({
                  icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
                  locale: 'es', //Control idioma
                  daysOfWeekDisabled: [0, 6],  //Desactiva los dias de la semana
                  format: 'YYYY/MM/DD hh:mm a' //Formato de fecha y hora
                });
                $('#datetimepickerFinal1').datetimepicker({
                  icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
                  locale: 'es', //Control idioma
                  daysOfWeekDisabled: [0, 6], //Desactiva los dias de la semana
                  format: 'YYYY/MM/DD hh:mm a', //Formato de fecha y hora
                  useCurrent: false
                });

                $("#datetimepickerInicio1").on("dp.change", function (e) {
                  $('#datetimepickerFinal1').data("DateTimePicker").minDate(e.date);
                });

                $("#datetimepickerFinal1").on("dp.change", function (e) {
                  $('#datetimepickerInicio1').data("DateTimePicker").maxDate(e.date);
                });

            });
//Validaciones de los formularios
   $(document).ready(function() {
    
// Validaciones Extras
jQuery.validator.addMethod("lettersonly", function(value, element) {
      return this.optional(element) || /^[a-z ]+$/i.test(value);
});


        // validacion formulario FormAddEvent
        $("#FormAddEvent").validate({
      rules: {
                nombre_evento:{
                  required:true,
                  minlength: 10,
                },
                tipo_evento:{
                   required:true
                },
                id_conexion:{
                   required:true
                },

                fecha_inicio:{
                  required:true
                },
                color:{
                    required:true
                },
                cedula_responsable:{
                    required:true,
                    digits: true,
                    minlength: 7,
                },
                NombreRespo:{
                    required:true,
                    lettersonly: true
                },
                Telefono:{
                   required:true,
                   phoneUS: true 
                },
                email: {
                    required: true,
                    email: true
                }

            },
            messages: {
                nombre_evento:{
                  required: "Por favor, Introduzca un evento",
                  minlength: "Su evento debe tener al menos 10 caracteres de largo"
                },
                tipo_evento:"Por favor, Seleccione una opción",
                id_conexion:"Por favor, Seleccione una opción",
                       fecha_inicio:{
                  required:"Este Campo es necesario"
                },
                color:"Por favor, Seleccione una opción",
                cedula_responsable:{
                  required: "Por favor, Introduzca una cedula",
                  digits:"El campo solo puede contener números",
                  minlength: "Su evento debe tener al menos 7 caracteres de largo",
                },
                NombreRespo:{
                  required:"Por favor, Introduzca el nombre del responsable",
                  lettersonly:"El nombre contiene caracteres númericos"
                },
                Telefono:{
                   required:"Por favor, Introduzca un número de telefono",
                   phoneUS:"El formato es: 000-0000000" 
                },
                email: "Por favor, introduce una dirección de correo electrónico válida"

            },
                        errorElement: "span",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block form-control-feedback" );

                    // Add `has-feedback` class to the parent div.form-group
                    // in order to add icons to inputs
                    element.parents(".form-group").addClass("has-feedback");

                    error.insertAfter( element );
                    
             
                    $( element ).addClass("form-control-danger");
                    
                },
                success: function ( label, element ) {
    
                        $( element ).addClass("form-control-success");
                    
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents(".form-group").addClass("has-danger").removeClass("has-success");
             
                },
                unhighlight: function ( element, errorClass, validClass ) {
                    $( element ).parents(".form-group").addClass( "has-success" ).removeClass("has-danger");
            
                }
        });
       // validacion formulario FormEditEvent
        $("#FormEditEvent").validate({
      rules: {
                nombre_evento1:{
                  required:true,
                  minlength: 10,
                },

                color1:{
                    required:true
                }

            },
            messages: {
                nombre_evento1:{
                  required: "Por favor, Introduzca un evento",
                  minlength: "Su evento debe tener al menos 10 caracteres de largo"
                },

                color1:"Por favor, Seleccione una opción"

            },
                        errorElement: "span",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block form-control-feedback" );

                    // Add `has-feedback` class to the parent div.form-group
                    // in order to add icons to inputs
                    element.parents(".form-group").addClass("has-feedback");

                    error.insertAfter( element );
                    
             
                    $( element ).addClass("form-control-danger");
                    
                },
                success: function ( label, element ) {
    
                        $( element ).addClass("form-control-success");
                    
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents(".form-group").addClass("has-danger").removeClass("has-success");
             
                },
                unhighlight: function ( element, errorClass, validClass ) {
                    $( element ).parents(".form-group").addClass( "has-success" ).removeClass("has-danger");
            
                }
        });

                // validacion formulario FormNuevoUsuario
        $("#FormNuevoUsuario").validate({
      rules: {
                Nombre:{
                    required:true,
                    lettersonly: true
                },
                Apellido:{
                    required:true,
                    lettersonly: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                  required: true,
                  minlength: 5
                },
                confirm_password: {
                  required: true,
                  minlength: 5,
                  equalTo: "#password"
                },
                Nivel:{
                  required:true
                }

            },
            messages: {
                Nombre:{
                  required:"Por favor, Introduzca el nombre del usuario",
                  lettersonly:"El nombre contiene caracteres númericos"
                },
                Apellido:{
                  required:"Por favor, Introduzca el apellido del usuario",
                  lettersonly:"El nombre contiene caracteres númericos"
                },
                email: "Por favor, introduce una dirección de correo electrónico válida",
                password: {
                  required: "Por favor, Introduzca un password",
                  minlength: "Su password debe tener al menos 5 caracteres de largo"
                },
                confirm_password: {
                  required: "Por favor, confirme su password",
                  minlength: "Su password debe tener al menos 5 caracteres de largo",
                  equalTo: "Su password no conincide"
                },
                Nivel:"Por favor, Seleccione una opción"

            },
                        errorElement: "span",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block form-control-feedback" );

                    // Add `has-feedback` class to the parent div.form-group
                    // in order to add icons to inputs
                    element.parents(".form-group").addClass("has-feedback");

                    error.insertAfter( element );
                    
             
                    $( element ).addClass("form-control-danger");
                    
                },
                success: function ( label, element ) {
    
                        $( element ).addClass("form-control-success");
                    
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents(".form-group").addClass("has-danger").removeClass("has-success");
             
                },
                unhighlight: function ( element, errorClass, validClass ) {
                    $( element ).parents(".form-group").addClass( "has-success" ).removeClass("has-danger");
            
                }
        });

      // validacion formulario FormRegConex
        $("#FormRegConex").validate({
      rules: {
                conexion:{
                  required:true,
                  lettersonly: true
                }

            },
            messages: {
                conexion:{
                  required: "Por favor, Introduzca un tipo de conexion",
                  lettersonly:"El tipo de conexion contiene caracteres númericos"

                }

            },
                        errorElement: "span",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block form-control-feedback" );

                    // Add `has-feedback` class to the parent div.form-group
                    // in order to add icons to inputs
                    element.parents(".form-group").addClass("has-feedback");

                    error.insertAfter( element );
                    
             
                    $( element ).addClass("form-control-danger");
                    
                },
                success: function ( label, element ) {
    
                        $( element ).addClass("form-control-success");
                    
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents(".form-group").addClass("has-danger").removeClass("has-success");
             
                },
                unhighlight: function ( element, errorClass, validClass ) {
                    $( element ).parents(".form-group").addClass( "has-success" ).removeClass("has-danger");
            
                }
        });

              // validacion formulario FormRegEvento
        $("#FormRegEvento").validate({
      rules: {
                tipo:{
                  required:true,
                  lettersonly: true
                }

            },
            messages: {
                tipo:{
                  required: "Por favor, Introduzca un tipo de evento",
                  lettersonly:"El tipo de evento contiene caracteres númericos"

                }

            },
                        errorElement: "span",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block form-control-feedback" );

                    // Add `has-feedback` class to the parent div.form-group
                    // in order to add icons to inputs
                    element.parents(".form-group").addClass("has-feedback");

                    error.insertAfter( element );
                    
             
                    $( element ).addClass("form-control-danger");
                    
                },
                success: function ( label, element ) {
    
                        $( element ).addClass("form-control-success");
                    
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents(".form-group").addClass("has-danger").removeClass("has-success");
             
                },
                unhighlight: function ( element, errorClass, validClass ) {
                    $( element ).parents(".form-group").addClass( "has-success" ).removeClass("has-danger");
            
                }
        });

      // validacion formulario FormBusca
        $("#FormBusca").validate({
      rules: {
                Buscar:{
                  required:true,
                  lettersonly: true
                }

            },
            messages: {
                Buscar:{
                  required: "Por favor, Introduzca un nombre para buscar",
                  lettersonly:"El nombre de evento contiene caracteres númericos"

                }

            },
                        errorElement: "span",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block form-control-feedback" );

                    // Add `has-feedback` class to the parent div.form-group
                    // in order to add icons to inputs
                    element.parents(".form-group").addClass("has-feedback");

                    error.insertAfter( element );
                    
             
                    $( element ).addClass("form-control-danger");
                    
                },
                success: function ( label, element ) {
    
                        $( element ).addClass("form-control-success");
                    
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents(".form-group").addClass("has-danger").removeClass("has-success");
             
                },
                unhighlight: function ( element, errorClass, validClass ) {
                    $( element ).parents(".form-group").addClass( "has-success" ).removeClass("has-danger");
            
                }
        });

              // validacion formulario FormElimina
        $("#FormElimina").validate({
      rules: {
                vista:{
                  required:true
                }

            },
            messages: {
                vista:{
                  required: "Para Eliminar, debe realizar una busqueda"

                }

            },
                        errorElement: "span",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block form-control-feedback" );

                    // Add `has-feedback` class to the parent div.form-group
                    // in order to add icons to inputs
                    element.parents(".form-group").addClass("has-feedback");

                    error.insertAfter( element );
                    
             
                    $( element ).addClass("form-control-danger");
                    
                },
                success: function ( label, element ) {
    
                        $( element ).addClass("form-control-success");
                    
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents(".form-group").addClass("has-danger").removeClass("has-success");
             
                },
                unhighlight: function ( element, errorClass, validClass ) {
                    $( element ).parents(".form-group").addClass( "has-success" ).removeClass("has-danger");
            
                }
        });

               // validacion formulario FormAddEvent
        $("#FormResponsable").validate({
      rules: {
                cedula_responsable:{
                    required:true,
                    digits: true,
                    minlength: 7,
                },
                NombreRespo:{
                    required:true,
                    lettersonly: true
                },
                Telefono:{
                   required:true,
                   phoneUS: true 
                },
                email:{
                    required: true,
                    email: true
                }

            },
            messages: {
                cedula_responsable:{
                  required: "Por favor, Introduzca una cedula",
                  digits:"El campo solo puede contener números",
                  minlength: "Su evento debe tener al menos 7 caracteres de largo",
                },
                NombreRespo:{
                  required:"Por favor, Introduzca el nombre del responsable",
                  lettersonly:"El nombre contiene caracteres númericos"
                },
                Telefono:{
                   required:"Por favor, Introduzca un número de telefono",
                   phoneUS:"El formato es: 000-0000000" 
                },
                email: "Por favor, introduce una dirección de correo electrónico válida"

            },
                        errorElement: "span",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block form-control-feedback" );

                    // Add `has-feedback` class to the parent div.form-group
                    // in order to add icons to inputs
                    element.parents(".form-group").addClass("has-feedback");

                    error.insertAfter( element );
                    
             
                    $( element ).addClass("form-control-danger");
                    
                },
                success: function ( label, element ) {
    
                        $( element ).addClass("form-control-success");
                    
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents(".form-group").addClass("has-danger").removeClass("has-success");
             
                },
                unhighlight: function ( element, errorClass, validClass ) {
                    $( element ).parents(".form-group").addClass( "has-success" ).removeClass("has-danger");
            
                }
        });

           // validacion formulario FormBuscaRespo
        $("#FormBuscaRespo").validate({
      rules: {
                Buscar:{
                  required:true,
                  digits: true,

                }

            },
            messages: {
                Buscar:{
                  required: "Por favor, Introduzca un nombre para buscar",
                  digits:"El campo solo puede contener números",


                }

            },
                        errorElement: "span",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block form-control-feedback" );

                    // Add `has-feedback` class to the parent div.form-group
                    // in order to add icons to inputs
                    element.parents(".form-group").addClass("has-feedback");

                    error.insertAfter( element );
                    
             
                    $( element ).addClass("form-control-danger");
                    
                },
                success: function ( label, element ) {
    
                        $( element ).addClass("form-control-success");
                    
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents(".form-group").addClass("has-danger").removeClass("has-success");
             
                },
                unhighlight: function ( element, errorClass, validClass ) {
                    $( element ).parents(".form-group").addClass( "has-success" ).removeClass("has-danger");
            
                }
        });

              // validacion formulario FormElimina
        $("#FormEliminaRespo").validate({
      rules: {
                Cedula:{
                  required:true
                }

            },
            messages: {
                Cedula:{
                  required: "Para Eliminar, debe realizar una busqueda"

                }

            },
                        errorElement: "span",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block form-control-feedback" );

                    // Add `has-feedback` class to the parent div.form-group
                    // in order to add icons to inputs
                    element.parents(".form-group").addClass("has-feedback");

                    error.insertAfter( element );
                    
             
                    $( element ).addClass("form-control-danger");
                    
                },
                success: function ( label, element ) {
    
                        $( element ).addClass("form-control-success");
                    
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents(".form-group").addClass("has-danger").removeClass("has-success");
             
                },
                unhighlight: function ( element, errorClass, validClass ) {
                    $( element ).parents(".form-group").addClass( "has-success" ).removeClass("has-danger");
            
                }
        });
    });
//END validaciones de los formularios

