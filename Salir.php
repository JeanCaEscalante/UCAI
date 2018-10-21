<?php
date_default_timezone_set('America/Caracas');

session_start();
 $Usuario = $_SESSION['Usuario'];

header('location:index.php');

session_destroy();
?>