<?php
  //realizar la conexion desde otro archivo 
include 'controlador.php';
date_default_timezone_set('America/Caracas');
session_start();

  if(!isset($_SESSION["email"]) and !isset($_SESSION["Nivel"])){ //Comprobacion de inicio de session

    header('Location:login.php');
    exit; 
  }

  //recibir el boton  
$boton=$_POST["boton"];
$Buscar = $_POST['Buscar']; 
$Cedula = $_POST['Cedula'];
$cedula_responsable= $_POST['cedula_responsable'];
$NombreRespo=$_POST["NombreRespo"];
$Telefono = $_POST["Telefono"];
$email = $_POST["email"];


// Almacenar los datos
if($boton=="Guardar"){

           $sql = "insert into resposable (id_responsable, nombre, email, Telefono) values ('$cedula_responsable', '$NombreRespo', '$email', '$Telefono')";
      
            if(mysql_query($sql)){
              
                  echo '<script>alert("Datos Guardados");</script>';

            }else{
                  echo '<script>alert("Datos NO Guardados");</script>';
            }
}


// Buscar los datos
if($boton=="Buscar"){
  $sql="select * from resposable where id_responsable = '$Buscar'";
  $busqueda=mysql_query($sql);
  if( $row=mysql_fetch_array($busqueda)){

    $id_responsable = $row['id_responsable'];
    $Nombre = $row['nombre'];
    $email = $row['email'];
    $telefono = $row['telefono'];

    }else{
    echo '<script>alert("Registro NO EXISTE en el Sistema");</script>';
  }
  
}

if($boton=="Limpiar"){
echo "<script>window.location='Responsable.php'</script>";
}

// Eliminar los datos
if($boton=="Eliminar"){

  if($Cedula!=""){

    $sql="delete from resposable where id_responsable ='$Cedula'";
    if (mysql_query($sql)){

        echo '<script>alert("Datos Eliminados");</script>';
    }
  }else{
    echo $Cedula;
    echo '<script>alert("Para poder ELIMINAR debe Realizar una busqueda");</script>';

  }
  
}


// Modificar los datos
if($boton=="Modificar"){

         $sql="update resposable set nombre='$NombreRespo', email='$email', telefono= '$Telefono' where id_responsable ='$cedula_responsable'";

            if(mysql_query($sql)){

                    echo '<script>alert("Datos Modificados");</script>';

              }else{

                echo '<script>alert("No se puede Modificar");</script>';
              }


 }
  

   
?>
<!DOCTYPE html>
<html>
<head>
  <title>UCAI</title>
  <!--ICONO-->
    <link rel="shortcut icon" type="image/x-icon" href="imagenes/logo.png" />
  <!--Bootstrap -->
    <link href="bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <!--Fuente Glyphycon -->
    <link href="bootstrap-4.0.0-alpha.6-dist/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!--Alertfly-->
    <link href="bootstrap-4.0.0-alpha.6-dist/alertifyjs/css/alertify.min.css" rel="stylesheet" type="text/css">
  <!--Hoja de Estilo-->
    <link href="assets/css/main.css" rel="stylesheet" type="text/css">

    <!--Javascript-->
    <script src="bootstrap-4.0.0-alpha.6-dist/js/jquery-3.2.1.min.js"></script>
    <script src="bootstrap-4.0.0-alpha.6-dist/js/bootstrap.min.js"></script>
    <script src="bootstrap-4.0.0-alpha.6-dist/alertifyjs/alertify.min.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
    <!--Javascript-->

    <!--FullCalendar-->
    <link rel='stylesheet' href="fullcalendar-3.9.0/fullcalendar.min.css"/>
    <script src="fullcalendar-3.9.0/lib/moment.min.js"></script>
    <script src="fullcalendar-3.9.0/fullcalendar.min.js"></script>
    <script src='fullcalendar-3.9.0/locale-all.js'></script>
    <!--End FullCalendar-->

    <!--Date Time Piker-->
    <link rel="stylesheet" href="bootstrap4-datetimepicker-master/css/bootstrap-datetimepicker.min.css" />
    <script src="bootstrap4-datetimepicker-master/js/bootstrap-datetimepicker.min.js"></script>
    <!--End Date Time Piker-->

        <!--Validation-->
    <script src='jquery-validation-1.17.0/dist/jquery.validate.min.js'></script>
    <script src='jquery-validation-1.17.0/dist/additional-methods.min.js'></script>
    <!-- End Validation-->
<body>

  <div class="main-wrapper-first">
     <!-- Barra Superior -->
      <header>
        <div class="container">
          <div class="header-wrap">
            <div class="header-top">
                <nav class="navbar navbar-toggleable-md navbar-light">
                  <a href="index.php">Inicio</a>
                <?php 
                  if (!$_SESSION['Nivel']==1) {
                ?>
                  <a href="login.php">Login</a>
                <?php
                  }
                ?>
                <?php 
                  if ($_SESSION['Nivel']==1) {
                ?>
                <li class="dropdown" style="list-style:none">
                      <a href="#" class="menubar" class="dropdown-toggle" data-toggle="dropdown"> Agregar</a>
                      <ul id="BarraMenu1" class="dropdown-menu" role="menu">
                      <li class="BarraMenu"><a href="Responsable.php">Responsable</a></li>
                      <li class="BarraMenu"><a href="RegistroTipoConex.php">Tipo de Conexion</a></li>
                      <li class="BarraMenu"><a href="TipoEvento.php">Tipo de Evento</a></li>
                  </ul>
                </li>
                    <a href="NuevoUsuario.php">Crear cuenta</a>
                    <a href="Salir.php">Salir</a>
                <?php
                  }
                ?>
                <!--Inicio de session segundo usuario-->
                <?php 
                  if ($_SESSION['Nivel']==2) {
                ?>
                <li class="dropdown" style="list-style:none">
                      <a href="#" class="menubar" class="dropdown-toggle" data-toggle="dropdown"> Agregar</a>
                      <ul id="BarraMenu1" class="dropdown-menu" role="menu">
                      <li class="BarraMenu"><a href="Responsable.php">Responsable</a></li>
                  </ul>
                </li>
                    <a href="Salir.php">Salir</a>
                <?php
                  }
                ?>
                </nav>
            </div>
          </div>
        </div>
      </header>
    </div>

    <!-- Contenedor  -->
    <div class="main-wrapper">
      <section class="story-area">
        <div class="container">
          <div class="row align-items-center">
            <div class="container">
            <div class="content">
              <h1 class="text-white text-center">Unidad Central de Atención en Informática <br> (UCAI-FACES) </h1>
              <p class="text-white text-center">Facultad de Ciencias Económicas y Sociales</p>
                <div class="text-center">
                    <img src="assets/imagenes/ULA-logo2.png" alt="">
                    <img src="assets/imagenes/logo.png" alt="">
                </div>
            </div>
          </div>
          </div>
        </div>
      </section>

    </div>

    
    <div class="main-wrapper">
      <!-- Calendario Completo -->
    <section class="featured-area">
        <div class="container">
          <h1 class="TituloCanledario"> Registro de Responsable</h1>
            <form name="FormNuevoResponsable" id="FormResponsable" method="POST" action="">
             <div class="form-group">
                <label for="recipient-name" class="col-form-label">Cedula</label>
                <input type="text" name="cedula_responsable" class="form-control" id="Cedula" placeholder="Cedula" value="<?php echo $id_responsable ?>">
                <span class="help-block" id="Existe"></span>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Nombres y Apellido</label>
                <input type="text" class="form-control" name="NombreRespo" id="Responsable" placeholder="Nombres y Apellido" value="<?php echo $Nombre ?>">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Telefono:</label>
                <input type="text" class="form-control" name="Telefono" id="Telefono" placeholder="Telefono" value="<?php echo  $telefono ?>">
              </div>
              <div class="form-group">
                <label class="col-form-label">Correo</label>
                <input type="email" class="form-control" name="email" id="Correo" placeholder="Correo" value="<?php echo $email ?>">
              </div>
              <div class="text-center">
              <button type="submit" name="boton" value="Guardar" class="btn btn-success"><i class="fa fa-floppy-o text-white"></i> Guardar</button>
              <button  class="btn btn-primary" id="Buscar" ><i class="fa fa-search text-white"></i> Buscar</button>
              <button type="submit" class="btn btn-danger" value="Limpiar" name="boton"><i class="fa fa-eraser text-white"></i></i> Limpiar</button>
              <a href="#" class="btn btn-danger" id="Eliminar"><i class="fa fa-trash text-white"></i>  Eliminar</a>
              <button type="submit" class="btn btn-primary" value="Modificar" id="Modificar" name="boton"><i class="fa fa-clipboard text-white"></i> Modificar</button>
            </div>
            </form>
        </div>
      </section>
   
 <!-- Start Footer Widget Area -->
      <section class="footer-widget-area">
        <footer class="container">
            <h4 class="text-center text-white"> Copyright &copy; 2018  |  Carlos Barrios </h4>
        </footer>
      </section>
      <!-- End Footer Widget Area -->

    </div>
<form id="FormBuscaRespo" method="POST" action="" style="display: none;">
    <fieldset>
      <div class="container">
      <div class="form-group">
          <label>Buscar</label>
            <input type="text" class="form-control" name="Buscar" id="Buscar" placeholder="Buscar">
      </div>
       <button type="submit" class="btn btn-primary" id="Buscar" value="Buscar" name="boton"><i class="glyphicon glyphicon-search"></i> Buscar</button>
      </div>  
    </fieldset>
</form>

<form id="FormEliminaRespo" method="POST" action="" style="display: none;">
    <fieldset>
      <div class="container">
          <div class="form-group">
              <label>Cedula</label>
               <input type="hidden" name="Cedula" class="form-control" value="<?php echo $id_responsable ?>">
               <input type="text" class="form-control" value="<?php echo $id_responsable ?>" disabled>
          </div>
          <div class="form-group">
              <label>Nombre</label>
              <input type="text" class="form-control" id="Nombre" value="<?php echo $Nombre ?>" disabled>
          </div>
       <button type="submit" class="btn btn-danger" value="Eliminar" name="boton"><i class="glyphicon glyphicon-trash"></i>  Eliminar</button>
      </div>  
    </fieldset>
</form>

<script type="text/javascript">

     $("#Buscar").on('click', function(){
        $("#FormBuscaRespo").css("display", "block");
              alertify.genericDialog || alertify.dialog('genericDialog',function(){
          return {
              main:function(content){
                  this.setContent(content);
              },
              setup:function(){
                  return {
                      focus:{
                          element:function(){
                              return this.elements.body.querySelector(this.get('selector'));
                          },
                          select:true
                      },
                      options:{
                          basic:true,
                          maximizable:false,
                          resizable:false,
                          padding:false
                      }
                  };
              },
              settings:{
                  selector:undefined
              }
          };
      });
      //force focusing password box
      alertify.genericDialog ($('#FormBuscaRespo')[0]).set('selector', 'input[type="text"]');
   });

      $("#Eliminar").on('click', function(){
        $("#FormEliminaRespo").css("display", "block");
              alertify.genericDialog || alertify.dialog('genericDialog',function(){
          return {
              main:function(content){
                  this.setContent(content);
              },
              setup:function(){
                  return {
                      focus:{
                          element:function(){
                              return this.elements.body.querySelector(this.get('selector'));
                          },
                          select:true
                      },
                      options:{
                          basic:true,
                          maximizable:false,
                          resizable:false,
                          padding:false
                      }
                  };
              },
              settings:{
                  selector:undefined
              }
          };
      });
      //force focusing password box
      alertify.genericDialog ($('#FormEliminaRespo')[0]).set('selector', 'input[type="text"]');
   });       

</script>
</body>
</html>