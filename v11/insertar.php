<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="resources/css/materialize.css"  media="screen,projection"/>
    <link href="resources/css/styles2.css" rel="stylesheet" type="text/css">
	<title>Aceptacion de Usuario</title>
	 <link rel="shortcut icon" href="resourse/images/logo.ico"/>
</head>
<body class="principal">

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'conexion1.php';
	Insertar();
}
function Insertar(){

	global $connect;

if(isset($_POST['name'])		&& !empty($_POST['name'])		&&
	isset($_POST['lastname'])	&& !empty($_POST['lastname'])	&&
	isset($_POST['email'])		&& !empty($_POST['email'])		&&
	isset($_POST['username'])	&& !empty($_POST['username'])	&&
	isset($_POST['password'])	&& !empty($_POST['password'])	&&
	isset($_POST['dni'])		&& !empty($_POST['dni']))
{
	$name = $_POST['name'];
	$last = $_POST['lastname'];
	$ema = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$dni = $_POST['dni'];

	$query = "INSERT INTO employee(name,lastname,email,username,password,dni) 	
		VALUES ('$name','$last','$ema','$user','$pass','$dni');";

	mysqli_query($connect, $query) or die (mysqli_error($connect));
	mysqli_close($connect);

	echo '<div class="grey lighten-3 modal-dialog1 modal-content1 modal-body1">';

		echo '<h4 class="center col s12 m6">Usuario Registrado</h4>';
		echo "<br>";
		echo '<div class="col s12 m6 right">';
		$regresar = '<a class="waves-effect waves-light btn brown lighten-3" href="index.html">Regresar</a>';
		echo $regresar;
		echo '</div>';
	echo '</div>';
	
}
else
	{
	echo '<div class="grey lighten-3 modal-dialog1 modal-content1 modal-body1">';
	echo '<h4 class="center col s12 m6">Problemas al insertar datos.</h4>';
	echo "<br>";	
	echo '<div class="col s12 m6 right">';
		$regresar = '<a class="waves-effect waves-light btn brown lighten-3" href="index.html">Regresar</a>';
	echo $regresar;
	echo '</div>';
	echo '</div>';
	}
}
?>


  	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="resources/js/materialize.min.js"></script>
</body>
</html>
