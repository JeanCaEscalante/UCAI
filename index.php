<?php
  //realizar la conexion desde otro archivo 
include 'controlador.php';
date_default_timezone_set('America/Caracas');
session_start();

  //recibir el boton  
  $boton=$_POST["boton"];
  
  //recibir los datos del formulario para agregar
  $nombre_evento= $_POST['nombre_evento'];
  $cedula_responsable= $_POST['cedula_responsable'];
  $id_tpevento = $_POST["tipo_evento"];
  $id_conexion = $_POST["id_conexion"];
  $fecha_inicio = $_POST["fecha_inicio"];
  $fecha_final = $_POST["fecha_final"];
  $color = $_POST["color"];

  //recibir los datos del formulario para Modificar
  $id_evento = $_POST["id_evento"];
  $nombre_evento1 = $_POST["nombre_evento1"];
  $fecha_inicio1 = $_POST["fecha_inicio1"];
  $fecha_final1 = $_POST["fecha_final1"];
  $color1 = $_POST["color1"];

// Almacenar los datos
if($boton=="Guardar"){

      $sql="insert into eventos(id_evento,nombre_evento,cedula_responsable,id_tpevento,id_conexion,fecha_inicio,fecha_final,color)values (null, '$nombre_evento', '$cedula_responsable', '$id_tpevento',  '$id_conexion', '$fecha_inicio', '$fecha_final','$color')";
      
            if(mysql_query($sql)){
              
                  echo '<script>alert("Datos Guardados");</script>';

            }else{
              echo '<script>alert("Datos NO Guardados");</script>';
            }

      

}


// Modificar los datos
if($boton=="Modificar"){

         $sql="update eventos set nombre_evento='$nombre_evento1', fecha_inicio='$fecha_inicio1', fecha_final='$fecha_final1',color='$color1' where id_evento ='$id_evento'";

            if(mysql_query($sql)){

                    echo '<script>alert("Datos Modificados");</script>';

              }else{

                echo '<script>alert("No se puede Modificar");</script>';
              }


 }
  
if($boton=="Eliminar"){  

    if (isset($_POST['delete']) && isset($_POST['id_evento'])){

        $sql = "delete from eventos where id_evento = $id_evento";
        if (mysql_query($sql)){

            echo '<script>alert("Datos Eliminados");</script>';
        }
    }else{
        echo '<script>alert("Debes marcar la casilla eliminar");</script>';
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
                  <a href="#Calendario">Calendario</a>
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
                   <a href="http://www.ula.ve/" target="_blank"><img src="assets/imagenes/ULA-logo2.png" alt=""></a> 
                   &nbsp;
                   <a href="http://ucai.faces.ula.ve/" target="_blank"><img src="assets/imagenes/logo.png" alt=""></a>
                   <!--<a href="http://ucai.faces.ula.ve/" target="_blank"><img src="assets/imagenes/ULA-logo2.png" alt=""></a>--> 
                </div>
            </div>
          </div>
          </div>
        </div>
      </section>

    </div>

    
    <div class="main-wrapper">
      <!-- Calendario Completo -->
      <section class="featured-area" >
        <div class="container">
          <div class="row">
            <div class="col-md-12">
                <h1 class="TituloCanledario"> Calendario UCAI</h1>
                <div id="Calendario" class="container"></div>
            </div>
          </div>
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
<!--Ventana Modal Agregar-->
<div class="modal fade" id="ModalRegEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
          <div class="modal-header bg-primary"> <!--COLOR Y FORMA -->
            <h5 class="modal-title text-white text-center" id="exampleModalLabel" style="font-size:25px;">Agregar Eventos</h5>
            <button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span> <!--Incluye la X para cerrar la ventana modal-->
            </button>
          </div>
        <form name="FormAddEvent" id="FormAddEvent" action="" method="POST">
          <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Nombre del Evento:</label>
                <input type="text" class="form-control" name="nombre_evento" id="NuevoEvento" placeholder="Ingresar Nombre">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Tipo de Evento:</label>
                <select class="form-control" name="tipo_evento" id="tipo_evento">
                    <option value="" selected="" disabled="">Seleccione</option>
                        <?php

                        $tipo_evento ="Select * From tipo_evento";
                        $result=mysql_query($tipo_evento);
                        while($row = mysql_fetch_array($result)) {
                                echo "<option value='".$row['id_tpevento']."'>".$row['tipo']."</option>";
                        }

                        ?>
                </select>
              </div>
              <div class="form-group">
                <label class="col-form-label">Tipo Conexion</label>
                <select class="form-control" name="id_conexion" id="id_conexion">
                    <option value="" selected="" disabled="">Seleccione</option>
                        <?php

                        $tipo_conexion ="Select * From tipo_conexion";
                        $result=mysql_query($tipo_conexion);
                        while($row = mysql_fetch_array($result)) {
                                echo "<option value='".$row['id_conexion']."'>".$row['tipo']."</option>";
                        }

                        ?>
                </select>
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Inicio:</label>
                  <div class="form-group">
                      <div class='input-group date' id='datetimepickerInicio'>
                          <input type='text' name="fecha_inicio" class="form-control"/>
                          <span class="input-group-addon">
                              <span class="fa fa-calendar"></span>
                          </span>
                      </div>
                  </div>
               </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Final:</label>
                  <div class="form-group">
                      <div class='input-group date' id='datetimepickerFinal'>
                          <input type='text' name="fecha_final" class="form-control"/>
                          <span class="input-group-addon">
                              <span class="fa fa-calendar"></span>
                          </span>
                      </div>
                  </div>
                  </div>
                  <div class="form-group">
                  <label class="col-form-label">Color</label>
                  <select name="color" class="form-control" id="color">
                      <option value="" selected="" disabled="">Seleccione</option>
                      <option style="color:#008000;" value="#008000">&#9724; Verde</option>  
                      <option style="color:#0071c5;" value="#0071c5">&#9724; Azul </option>
                      <option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
                      <option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranja</option>
                      <option style="color:#FF0080;" value="#FF0080">&#9724; fuchsia</option>
                      <option style="color:#572364;" value="#572364"> &#9724;Morado</option>
                  </select>
                </div>
              <hr/>
              <h5 class="text-center">Responsable:</h5>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Cedula</label>
                <input type="text" name="cedula_responsable" class="form-control" id="Cedula" id="Evento" placeholder="Cedula">
                <span class="help-block" id="Existe"></span>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times text-white"></i> Close</button>
            <button type="submit" name="boton" value="Guardar" id="Guardar" class="btn btn-success"><i class="fa fa-floppy-o text-white"></i> Guardar</button>
          </div>
      </form>
    </div>
  </div>
</div>
<!-- EndVentana Modal Agregar-->

<!--Ventana Modal Modificar-->
<div class="modal fade" id="ModalEditEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form name="FormEditEvent" id="FormEditEvent" action="" method="POST">
          <div class="modal-header bg-primary"> <!--COLOR Y FORMA -->
            <h5 class="modal-title text-white text-center" id="exampleModalLabel" style="font-size:25px;">Modificar Evento</h5>
            <button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span> <!--Incluye la X para cerrar la ventana modal-->
            </button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Nombre del Evento:</label>
                <input type="text" class="form-control" name="nombre_evento1" id="nombre_evento1" placeholder="Ingresar Nombre">
              </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Inicio:</label>
                  <div class="form-group">
                      <div class='input-group date' id='datetimepickerInicio1'>
                          <input type='text' name="fecha_inicio1" id="fecha_inicio1" class="form-control"/>
                          <span class="input-group-addon">
                              <span class="fa fa-calendar"></span>
                          </span>
                      </div>
                  </div>
               </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Final:</label>
                  <div class="form-group">
                      <div class='input-group date' id='datetimepickerFinal1'>
                          <input type='text' name="fecha_final1" id="fecha_final1" class="form-control"/>
                          <span class="input-group-addon">
                              <span class="fa fa-calendar"></span>
                          </span>
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-form-label">Color</label>

                  <select name="color1" class="form-control" id="color1">
                      <option value="" selected="" disabled="">Seleccione</option>
                      <option style="color:#008000;" value="#008000">&#9724; Verde</option>  
                      <option style="color:#0071c5;" value="#0071c5">&#9724; Azul </option>
                      <option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
                      <option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranja</option>
                      <option style="color:#FF0080;" value="#FF0080">&#9724; fuchsia</option>
                      <option style="color:#572364;" value="#572364"> &#9724;Morado</option>
                  </select>
                </div>
             <hr>   
          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
              <label class="text-danger"><input type="checkbox" id="Chek"  name="delete"> Eliminar Evento</label>
              </div>
            </div>
          </div>
          <input type="hidden" name="id_evento" class="form-control" id="id">
          <div class="modal-footer">
           <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times text-white"></i> Close</button>
           <button type="submit" class="btn btn-primary" value="Modificar" id="Modificar1" name="boton"><i class="fa fa-clipboard text-white"></i> Modificar</button>
           <button type="submit" class="btn btn-danger" value="Eliminar" name="boton"><i class="fa fa-trash text-white"></i> </i>  Eliminar</button>
          </div>
      </form>
    </div>
  </div>
</div>
<!--End Ventana Modal Modificar-->


 <script type="text/javascript">
//Cambio de color en los combos de los formularios
$('#color').on('change', function(){   
    $(this).css("color",this.value);
});

$('#color1').on('change', function(){   
    $(this).css("color",this.value);
    $('#Modificar').attr('class', 'disabled');
});
//Cambio de color en los combos de los formularios

  $('#Chek').on('click', function(){
     //obtenemos el texto introducido en el campo
       if( $(this).is(':checked') ){
            alert("Vas Eliminar tu evento");
            $
       }
  });
    //MOSTRAR EL CALENDARIO COMPLETO
       $(document).ready(function(){

$('#ModalRegEvent #color').css('color', color);

          $('#Calendario').fullCalendar({

            locale: 'es',
            header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listWeek'

            },
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            selectHelper: true,
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            businessHours: {
              dow: [ 1, 2, 3, 4, 5 ] // dias de semana, 0=Domingo
            },

         <?php if ($_SESSION['Nivel']==1) { ?>
            
            //MOSTRAR LA VENTA MODAL
          dayClick: function(fecha,javascriptEvent,vista) { //Guardar Eventos
              $('#ModalRegEvent').modal({backdrop: 'static', keyboard: false}); //EVITAR EL CIERRE DE LA VENTANA MODAL
              $('#ModalRegEvent').modal('show'); //EVITAR EL CIERRE DE LA VENTANA MODAL           
            
          },
          eventRender: function(event, element) { //Modificar eventos
              element.bind('dblclick', function() {
                $('#ModalEditEvent #id').val(event.id);
                $('#ModalEditEvent #nombre_evento1').val(event.title);
                $('#ModalEditEvent #color1').val(event.color);
                $('#ModalEditEvent').modal('show');
              });
          },
          <?php  } ?>

          <?php if ($_SESSION['Nivel']==2) { ?>
            
            //MOSTRAR LA VENTA MODAL
          dayClick: function(fecha,javascriptEvent,vista) { //Guardar Eventos
              $('#ModalRegEvent').modal({backdrop: 'static', keyboard: false}); //EVITAR EL CIERRE DE LA VENTANA MODAL
              $('#ModalRegEvent').modal('show'); //EVITAR EL CIERRE DE LA VENTANA MODAL           
            
          },
          eventRender: function(event, element) { //Modificar eventos
              element.bind('dblclick', function() {
                $('#ModalEditEvent #id').val(event.id);
                $('#ModalEditEvent #nombre_evento1').val(event.title);
                $('#ModalEditEvent #color1').val(event.color);
                $('#ModalEditEvent').modal('show');
              });
          },
          <?php  } ?>
       
          events: [ //Carga los eventos de la ventana modal 
                <?php 
                        $sql = "Select * from eventos";
                        $result=mysql_query($sql);
                        while($row = mysql_fetch_array($result)) {
                       
                ?>
                {
                  id: '<?php echo $row['id_evento']; ?>',
                  title: '<?php echo $row['nombre_evento']; ?>',
                  start: '<?php echo $row['fecha_inicio']; ?>',
                  end: '<?php echo $row['fecha_final']; ?>',
                  color: '<?php echo $row['color']; ?>',
                },
            <?php  } ?>
    
            ]
                  
            });


        
          });

  </script>
  <script type="text/javascript">
    $(document).ready(function(){
          var Cedula;
        //hacemos focus
        $("#Cedula").focus();
                      
        //comprobamos si se escribe en campo
        $("#Cedula").keyup(function(e){
           //obtenemos el texto introducido en el campo
           Cedula = $("#Cedula").val();
           
           //hace la búsqueda
           $("#Existe").delay(2000).queue(function(n) { 

              $.ajax({
                type: "POST",
                url: "Consulta-Cedula.php",
                data: "Cedula="+Cedula,
                error: function(){
                  alert("Error de conexion al servidor");
                },
                success: function(data){                  
                  $("#Existe").html(data);
                  n();
                }
            });
                    
           });
                 
        });
               
      });
  </script>
</body>
</html>