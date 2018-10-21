<?php


        if (!$cnn=mysql_connect('localhost','root',"12345678")){
	  
	      	echo"<script>alert('No se puede conectar al servidor');</script>;";
	    }
	   
	    if(!mysql_select_db('bducai',$cnn)){
	     	echo"<script>alert('No se pude conectar a la base de datos');</script>";
	   }

?>
	  
