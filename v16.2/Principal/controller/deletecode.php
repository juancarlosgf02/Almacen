<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require '../../conexion1.php';
	delete();
}
function delete(){
	global $connect;
	$code_cod = $_POST["code_cod"];  /* Eliminar por codigo principal*/
	$query = "DELETE FROM code where code_cod ='$code_cod';";
	mysqli_query($connect, $query) or die (mysqli_error($connect));
	mysqli_close($connect);
	header("location:../../principal.php#/inicio");
}
?>