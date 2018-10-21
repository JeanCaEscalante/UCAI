<?php
    date_default_timezone_set('America/Caracas');
    include('controlador.php');
    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if ($_POST['acceso']) {

                        $sql = ("select * from usuario where email ='$email' and password = '$password'");
                        $respu = mysql_query($sql);

                                if ($fila = mysql_fetch_array($respu)){



                                            $_SESSION['email'] = trim($fila["email"]);
                                            $_SESSION['Nivel'] = trim($fila["Nivel"]);

                                    // inicio la sesión
                                    $_SESSION["autentificado"]= "SI";
                                    //defino la sesión que demuestra que el usuario está autorizado
                                    $_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s"); 

                                                echo '<script>alert("Bienvenido");
                                                window.location.href = "index.php"</script>';
                                        
                                        
                                }else{ 

                                     echo '<script>alert("Error Correo y/o Contraseña")';
                                    
                                }

}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>UCAI</title>
    <!--Bootstrap -->
    <link href="bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!--Fuente Glyphycon -->
    <link href="bootstrap-4.0.0-alpha.6-dist/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--Alertfly-->
    <link href="bootstrap-4.0.0-alpha.6-dist/alertify/css/alertify.min.css" rel="stylesheet" type="text/css">
    <!--Hoja de Estilo-->
    <link href="assets/css/estilologin.css" rel="stylesheet" type="text/css">

    <!--Javascript -->
    <script src="bootstrap-4.0.0-alpha.6-dist/js/jquery-3.2.1.min.js"></script>
    <script src="bootstrap-4.0.0-alpha.6-dist/js/bootstrap.min.js"></script>
    <script src="bootstrap-4.0.0-alpha.6-dist/alertify/js/alertify.min.js"></script>
    <!--Javascript -->

    <!--Validation-->
    <script src='jquery-validation-1.17.0/dist/jquery.validate.min.js'></script>
    <script src='jquery-validation-1.17.0/dist/additional-methods.min.js'></script>
    
</head>
<body>

  <!--hero section-->
        <section class="hero align-self-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-8 mx-auto">
                        <div class="card border-none align-self-center">
                            <div class="card-body">
                                <br>
                                <br>
                                <br>
                                <p class="mt-4 text-white lead text-center">
                                    Ingrese usuario y contraseña
                                </p>
                                <div class="col-md-12">
                                    <form name="formLogin" id="formLogin" method="POST" action="">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese email">

                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese password">

                                        </div>

                                        <div class="form-group row">
                                        <div class="col-md-9">
                                            <a class="link" href="recupera.php"><h5><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;¿Olvido su Clave?</h5></a>
                                        </div>
                                        <div class="col-md-3 text-right gl">
                                               <input name="acceso" type="submit" id="acceso" class="btn btn-primary float-right" value="Ingresar" />
                                        </div>
                                    </div>
                                    </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
            <footer><h6 class="text-center text-white"> Copyright &copy; 2018  |  Carlos Barrios </h4></footer>

<script type="text/javascript">
    $().ready(function() {

        // validate signup form on keyup and submit
        $("#formLogin").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                email: "Por favor, introduce una dirección de correo electrónico válida",
                password: {
                    required: "Por favor ingrese un password",
                    minlength: "Su contraseña debe tener al menos 5 caracteres de largo"
                }
            },
                        errorElement: "em",
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
    </script>
</body>
</html>