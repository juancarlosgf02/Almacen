<!DOCTYPE html>
<html ng-app='angularRoutingApp' lang="es">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="generator" content="Bootply" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="../resources/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link type="text/css" rel="stylesheet" href="../resources/css/styles.css "/>
  <title>Almacen</title>
  <link rel="shortcut icon" href="../resources/images/logo.ico"/>
</head>
<body class="principal"> 
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require '../../conexion1.php';
	addProduct();
}
function addProduct(){
	global $connect;
if(isset($_POST['code_cod'])		&& !empty($_POST['code_cod'])		&&
	isset($_POST['size'])	        && !empty($_POST['size'])	        &&
	isset($_POST['box_prod'])		&& !empty($_POST['box_prod'])		&&
	isset($_POST['proveedor'])		&& !empty($_POST['proveedor'])		&&
	isset($_POST['date_create'])	&& !empty($_POST['date_create'])	&&
	isset($_POST['box_prod'])		&& !empty($_POST['box_prod'])		&&
	isset($_POST['location_box'])	&& !empty($_POST['location_box']))
{
	$code_cod = $_POST['code_cod'];
	$size = $_POST['size'];
	$box_prod = $_POST['box_prod'];
	$date_create = $_POST['date_create'];
	$proveedor = $_POST['proveedor'];
	$location_box = $_POST['location_box'];

	$query = "INSERT INTO product(code_cod,size,box_prod,location_box,date_create,proveedor) 	
		VALUES ('$code_cod','$size','$box_prod','$location_box','$date_create','$proveedor');";

	mysqli_query($connect, $query) or die (mysqli_error($connect));
	mysqli_close($connect);

	echo '<div class="grey lighten-3 stylelogin modal-dialog modal-content modal-body">';
		echo '<h4 class="center col s12 m6">Producto Registrado</h4>';
		echo "<br>";
		echo '<div class="col s12 m6 right">';
		$regresar = '<a class="waves-effect waves-light btn brown lighten-3" href="../../principal.php#/distribucion">Regresar</a>';
		echo $regresar;
		echo '</div>';
	echo '</div>';
	echo '<script>alert("Cantidad Registrada")</script>';
	echo "<script>location.href='../../principal.php#/distribucion'</script>;";
	header("location:../../principal.php#/distribucion");
}
else{
	echo '<div class="modal-dialog modal-content modal-body">';
	echo '<h4 class="text-center">Problemas al insertar datos.</h4>';
	echo "<br>";
	echo '<div class="col-md-6 col-md-offset-8">';
		$regresar = '<a href="../../principal.php#/distribucion"> <button type="button" class="btn btn-warning btn-lg">Regresar</button></a>';
	echo $regresar;
	echo '</div>';
	echo '</div>';
	}
}
?>
    <!--Import jQuery and bootstrap.js--> 
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../resources/js/bootstrap.min.js"></script>
    <script src="../resources/js/angular.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.3/angular-route.js"></script>
    <script src="../resources/js/main.js"></script>
</body>
</html>