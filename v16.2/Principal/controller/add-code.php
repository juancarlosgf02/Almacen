<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require '../../conexion1.php';
	addCode();
}
function addCode(){
	global $connect;
if(isset($_POST['code_cod'])			    && !empty($_POST['code_cod'])		    &&
	isset($_POST['description_cod'])	    && !empty($_POST['description_cod'])	&&
	isset($_POST['stock'])	                && !empty($_POST['stock']))   /* &&
    isset($_POST['status_prod'])			&& !empty($_POST['status_prod']) */
{
	$code_cod = $_POST['code_cod'];
	$description_cod = $_POST['description_cod'];
	$stock = $_POST['stock'];
/*	$status_prod = $_POST['status_prod']; 
	$query = "INSERT INTO code (code_cod,description_cod) 	
		VALUES ('$code_cod','$description_cod');";
*/
	$query = "INSERT INTO code (code_cod,description_cod,stock) 	
		VALUES ('$code_cod','$description_cod','$stock');";
	mysqli_query($connect, $query) or die (mysqli_error($connect));
	mysqli_close($connect);

	echo '<div class="grey lighten-3 stylelogin modal-dialog modal-content modal-body">';
		echo '<h4 class="center col s12 m6">Codigo Registrado</h4>';
		echo "<br>";
		echo '<div class="col s12 m6 right">';
		$regresar = '<a class="waves-effect waves-light btn brown lighten-3" href="../../principal.php#/agregarcodigo">Regresar</a>';
		echo $regresar;
		echo '</div>';
	echo '</div>';
	echo '<script>alert("Codigo REGISTRADO")</script>';
	echo "<script>location.href='../../principal.php#/agregarcodigo'</script>;";
	header("location:../../principal.php#/agregarcodigo");
}
else{
	echo '<div class="grey lighten-3 stylelogin modal-dialog modal-content modal-body">';
	echo '<h4 class="center col s12 m6">Problemas al insertar datos.</h4>';
	echo "<br>";
	echo '<div class="col s12 m6 right">';
		$regresar = '<a class="waves-effect waves-light btn brown lighten-3" href="../../principal.php#/agregarcodigo">Regresar</a>';
	echo $regresar;
	echo '</div>';
	echo '</div>';
	}
}
?>
