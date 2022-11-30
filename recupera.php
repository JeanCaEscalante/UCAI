<?php
    date_default_timezone_set('America/Caracas');
    include('controlador.php');
    session_start();


    $password = $_POST['password'];
    
    if (isset($_POST['busca'])) {
    
        $sql = ("select * from usuario where email ='$email'");
        $respu = mysql_query($sql);

            if ($fila = mysql_fetch_array($respu)){

                $_SESSION['nombre']  = $fila['nombre'];
                $_SESSION['apellido'] = $fila['apellido'];
                $_SESSION['email'] = $fila['email'];
                echo '<script>alert("Ingrese su nueva contraseña");</script>';
                
        }else{ 

        echo '<script>alert("El correo no existe");</script>';
    }

}


$Cont = $_POST['Cont'];
$ReCont = $_POST['ReCont'];
$Correo = $_SESSION['email'];

if ($_POST['Recupera']) {
        
        if  ($Cont === $ReCont){
                
                $sql="update usuario set password='$Cont' where email='$Correo'";
                if(mysql_query($sql)){
                    
                            echo '<script>alert("Clave modificada"); window.location="login.php"</script>';

                }else{
                    echo '<script>alert("Datos no modificados"); window.location="recupera.php"</script>';
                }
                
        }else{

                echo '<script>alert("Clave no conincide"); window.location="recupera.php"<</script>';
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
                                    <form method="POST" action="">
                                    <div class="form-group input-group">
                                        <input type="text" name="email" class="form-control search-query" placeholder="Ingrese Email" />
                                            <span class="input-group-btn">
                                                <button type="submit" name="busca" class="btn btn-success">
                                                        <span class="glyphicon glyphicon-search"></span>
                                                        Buscar
                                                </button>
                                            </span>
                                    </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nombre" value="<?php echo $fila['nombre']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Apellido" value="<?php echo $fila['apellido']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" name="Cont" placeholder="Ingrese password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password2" name="ReCont" placeholder="Ingrese password">
                                        </div>
                                        <div class="form-group row">
                                        <div class="col-md-12 text-right gl">
                                               <input name="Recupera" type="submit" id="acceso" class="btn btn-primary float-right" value="Recuperar" />
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

</body>
</html>