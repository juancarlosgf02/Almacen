<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link type="text/css" rel="stylesheet" href="resources/css/icon.css "/>
    <link href="resources/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="resources/css/styles2.css" rel="stylesheet" type="text/css">
	<title>Aceptacion de Usuario</title>
	<link rel="shortcut icon" href="resources/images/logo.ico"/>
</head>
<body class="principal">
<div class="container">

<?php
require 'conexion2.php'; 
	session_start();
	ob_start();
$username=mysqli_real_escape_string($link,$_POST['username']);
$password=mysqli_real_escape_string($link,$_POST['password']);
$login="SELECT * FROM employee where username='$username'	AND password='$password'";
$result=mysqli_query($link,$login);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$count=mysqli_num_rows($result);// If result matched $username and $password, table row must be 1 row
if($count==1){
	$_SESSION['usuario']=$username; 
	header("location:principal.php#/inicio");
}
else{
	    echo '<div class="grey lighten-3 modal-dialog1 modal-content1 modal-body1">';
		echo '<h4 class="center col s12 m6">Error en el usuario o contrasena incorrecto </h4>';
		echo "<br>";
		echo '<div class="col s12 m6 right">';
		$regresar = '<a class="waves-effect waves-light btn brown lighten-3" href="index.html">Regresar</a>';
		echo $regresar;
		echo '</div>';
		echo '</div>';
}
?>
</div>
   	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="resources/js/materialize.min.js"></script>
</body>
</html>

