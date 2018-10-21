 <?php 
 
include('controlador.php');

	$Cedula = $_POST['Cedula'];
	
	
	$sql="select * from resposable where id_responsable='$Cedula'";
	$busqueda=mysql_query($sql);

	$resultado = mysql_num_rows($busqueda);	

	if ($resultado == 1) {

		echo "<p style='font-weight:bold;color:red;'>Registro ya Existe<p>";


	}else{

		echo "<p style='font-weight:bold;color:red;'>Registro No Existe<p>";
	}

 ?>	