<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="generator" content="Bootply" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="resources/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="resources/css/login.css" type="text/css" rel="stylesheet" media="screen,projection">
  <title>Almacen</title>
  <link rel="shortcut icon" href="resources/images/logo.ico"/>
</head>

<body class="principal">
<?php
require 'conexion1.php'; 
	session_start();
	ob_start();

if( isset($_POST['username'])	&& !empty($_POST['username'])	&&
	isset($_POST['password'])	&& !empty($_POST['password']))

$username = $_POST['username'];
$password = $_POST['password']; 
	
$login="SELECT * FROM employee where username ='$username'AND password ='$password' ";
$result=mysqli_query($connect,$login);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$count=mysqli_num_rows($result);// If result matched $username and $password, table row must be 1 row

if($count==1){
	$_SESSION['usuario']=$username; 
	header("location:principal.php#/inicio");
}
else{
	echo '<div class="modal-dialog modal-content modal-body">';
	echo '<h4 class="text-center">Problemas al insertar datos.</h4>';
	echo "<br>";
	echo '<div class="col-md-6 col-md-offset-8">';
		$regresar = '<a href="index.html"> <button type="button" class="btn btn-warning btn-lg">Regresar</button></a>';
	echo $regresar;
	echo '</div>';
	echo '</div>';
mysqli_close($connect);
}
?>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
</body>
</html>
