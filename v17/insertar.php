<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="generator" content="Bootply" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="resources/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link type="text/css" rel="stylesheet" href="resources/css/styles2.css "/>
  <title>Almacen</title>
  <link rel="shortcut icon" href="resources/images/logo.ico"/>
</head>
<body class="principal">

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'conexion1.php';
	Insertar();
}
function Insertar(){
	global $connect;
if( isset($_POST['name'])		&& !empty($_POST['name'])		&&
	isset($_POST['lastname'])	&& !empty($_POST['lastname'])	&&
	isset($_POST['email'])		&& !empty($_POST['email'])		&&
	isset($_POST['username'])	&& !empty($_POST['username'])	&&
	isset($_POST['password'])	&& !empty($_POST['password']))	
{
	$name = $_POST['name'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "INSERT INTO employee(name,lastname,email,username,password) 	
		VALUES ('$name','$lastname','$email','$username','$password');";

	mysqli_query($connect, $query) or die (mysqli_error($connect));
	mysqli_close($connect);
	    echo '<div class="modal-dialog modal-content modal-body">';
		echo '<h4 class="text-center">Usuario Registrado</h4>';
		echo "<br>";
		echo '<div class="col-md-6 col-md-offset-8">';
		$regresar = '<a href="index.html"> <button type="button" class="btn btn-warning btn-lg">Regresar</button></a>';
	    echo $regresar;
		echo '</div>';
	    echo '</div>';
}
else{
	echo '<div class="modal-dialog modal-content modal-body">';
	echo '<h4 class="text-center">Problemas al insertar datos.</h4>';
	echo "<br>";
	echo '<div class="col-md-6 col-md-offset-8">';
		$regresar = '<a href="register.html"> <button type="button" class="btn btn-warning btn-lg">Regresar</button></a>';
	echo $regresar;
	echo '</div>';
	echo '</div>';
	}
}
?>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
</body>
</html>
