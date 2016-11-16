<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require '../conexion1.php';
	addProduct();
}
function addProduct(){

	global $connect;
	
if(isset($_POST['code_cod'])		&& !empty($_POST['code_cod'])		&&
	isset($_POST['rack'])	        && !empty($_POST['rack'])	        &&
	isset($_POST['box_prod'])		&& !empty($_POST['box_prod'])		&&
	isset($_POST['location_box'])	&& !empty($_POST['location_box']))
{

	$code_cod = $_POST['code_cod'];
	$rack = $_POST['rack'];
	$box_prod = $_POST['box_prod'];
	$location_box = $_POST['location_box'];

	$query = "INSERT INTO product(code_cod,rack,box_prod,location_box) 	
		VALUES ('$code_cod','$rack','$box_prod','$location_box');";

	mysqli_query($connect, $query) or die (mysqli_error($connect));
	mysqli_close($connect);

	echo '<div class="grey lighten-3 stylelogin modal-dialog modal-content modal-body">';

		echo '<h4 class="center col s12 m6">Producto Registrado</h4>';
		echo "<br>";

		echo '<div class="col s12 m6 right">';
		$regresar = '<a class="waves-effect waves-light btn brown lighten-3" href="../principal.php#/addproduct">Regresar</a>';
		echo $regresar;
		echo '</div>';
	echo '</div>';
	echo '<script>alert("Codigo REGISTRADO")</script>';
	echo "<script>location.href='../principal.php#/addproduct'</script>;";
	header("location:../principal.php#/addproduct");
	
}
else
	{
	echo '<div class="grey lighten-3 stylelogin modal-dialog modal-content modal-body">';
	echo '<h4 class="center col s12 m6">Problemas al insertar datos.</h4>';
	echo "<br>";
	echo '<div class="col s12 m6 right">';
		$regresar = '<a class="waves-effect waves-light btn brown lighten-3" href="../principal.php#/inicio">Regresar</a>';
	echo $regresar;
	echo '</div>';
	echo '</div>';
	}
}
?>
