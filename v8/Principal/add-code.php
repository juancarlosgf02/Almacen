<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require '../conexion1.php';
	addCode();
}
function addCode(){

	global $connect;
	
if(isset($_POST['code_cod'])			    && !empty($_POST['code_cod'])		&&
	isset($_POST['description_cod'])	        && !empty($_POST['description_cod'])    &&
    isset($_POST['status_prod'])			&& !empty($_POST['status_prod']))
{

	$code_cod = $_POST['code_cod'];
	$description_cod = $_POST['description_cod'];
	$status_prod = $_POST['status_prod'];

	$query = "INSERT INTO code (code_cod,description,status_prod) 	
		VALUES ('$code_cod','$description_cod','$status_prod');";

	mysqli_query($connect, $query) or die (mysqli_error($connect));
	mysqli_close($connect);

	echo '<div class="grey lighten-3 stylelogin modal-dialog modal-content modal-body">';

		echo '<h4 class="center col s12 m6">Codigo Registrado</h4>';
		echo "<br>";

		echo '<div class="col s12 m6 right">';
		$regresar = '<a class="waves-effect waves-light btn brown lighten-3" href="principal.php">Regresar</a>';
		echo $regresar;
		echo '</div>';
	echo '</div>';
	echo '<script>alert("Codigo REGISTRADO")</script>';
	echo "<script>location.href='../principal.html'</script>;";
	header("location:../principal.php#/inicio");
	
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
