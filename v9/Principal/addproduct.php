<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require '../conexion1.php';
	addProduct();
}
function addProduct(){

	global $connect;
	
if(isset($_POST['name'])			&& !empty($_POST['name'])			&&
	isset($_POST['code_prod'])		&& !empty($_POST['code_prod'])		&&
	isset($_POST['product_code'])   && !empty($_POST['product_code'])   &&
	isset($_POST['stock'])			&& !empty($_POST['stock'])			&&
	isset($_POST['idFkCategory'])	&& !empty($_POST['idFkCategory'])	&&
	isset($_POST['idFkBrand'])		&& !empty($_POST['idFkBrand'])		&&
	isset($_POST['idFkSize'])		&& !empty($_POST['idFkSize'])		&&
	isset($_POST['idFkcolor'])		&& !empty($_POST['idFkcolor']))
{

	$name = $_POST['name'];
	$code_prod = $_POST['code_prod'];
	$product_code = $_POST['product_code'];
	$stock = $_POST['stock'];
	$idCate = $_POST['idFkCategory'];
	$idBrand = $_POST['idFkBrand'];
	$idSize = $_POST['idFkSize'];
	$idcolor = $_POST['idFkcolor'];

	$query = "INSERT INTO product(name,code_prod,product_code,stock,idFkCategory,idFkBrand,idFkSize,idFkcolor) 	
		VALUES ('$name','$code_prod','$product_code','$stock','$idCate','$idBrand','$idSize','$idcolor');";

	mysqli_query($connect, $query) or die (mysqli_error($connect));
	mysqli_close($connect);

	echo '<div class="grey lighten-3 stylelogin modal-dialog modal-content modal-body">';

		echo '<h4 class="center col s12 m6">Producto Registrado</h4>';
		echo "<br>";

		echo '<div class="col s12 m6 right">';
		$regresar = '<a class="waves-effect waves-light btn brown lighten-3" href="../principal.php#/inicio">Regresar</a>';
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
