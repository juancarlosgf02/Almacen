<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require '..\..\conexion1.php';
	Modificar();
}
function Modificar(){
	global $connect;
	$query = "UPDATE code
	          SET stock='$_POST[stock]'
			  WHERE code_cod='$_POST[code_cod]';";
	
	mysqli_query($connect, $query) or die (mysqli_error($connect));
	mysqli_close($connect);
	header("location:../../principal.php#/inicio");	
}
?>