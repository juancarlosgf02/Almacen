<!DOCTYPE html>
<html ng-app='angularRoutingApp' lang="es">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="generator" content="Bootply" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="resources/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link type="text/css" rel="stylesheet" href="../resources/css/styles2.css "/>
  <title>Almacen</title>
  <link rel="shortcut icon" href="resources/images/logo.ico"/>
</head>
<body> 
<!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../principal.php#/inicio">Almacén</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ingreso <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="../principal.php#/agregarcodigo">Agregar Código</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Modificar</li>                  
                <li><a href="../principal.php#/modifydescrip">Modificar Descripción</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Distribución <span class="caret"></span></a>
              <ul class="dropdown-menu">
                 <li><a href="../principal.php#/distribucion">Distribucion de Cajas</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Lista</li>
                <li><a href="../principal.php#/viewproduct">Listar Códigos</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Egreso <span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="#">Egreso</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Informes<span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="#infocodigo">Informe de Códigos</a></li>
                  <li><a href="#informacion">Informe de distribución</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a>Bienvenido <?php session_start(); ob_start(); echo $_SESSION['usuario'];?></a></li>
            <li><a href="../close.php">Cerrar Sesión <i class="glyphicon glyphicon-off"></i></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<div class="container">
    <ol class="breadcrumb">
      <li><a href="../principal.php#/inicio">Inicio</a></li>
      <li class="active">Listado por Codigo</li>
    </ol>
    <a href="../principal.php#/viewproduct"><button type="button" class="btn btn-info">Atras</button></a>
    <div class="page-header">
        <h1>Lista de Producto de <?php echo $_POST["code_cod"]?> </h1>
    </div>
</div>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require '../conexion1.php';
	Buscar();
}
function Buscar(){
	global $connect;
    $code_cod = $_POST["code_cod"];
    //$query = "SELECT * FROM product WHERE code_cod LIKE '$code_cod%';";
	//$query = "SELECT code.code_cod, code.description_cod, product.code_prod, product.stock, 
    //product.idFkCategory, product.idFkBrand FROM code, product ";

    $query = "SELECT code.code_cod, code.description_cod, code.Stock, product.box_prod, product.size,
    product.location_box,product.date_create,product.nfactura,product.proveedor
      FROM 
      code INNER JOIN product
      ON code.code_cod = product.code_cod
      WHERE code.code_cod = '$code_cod'
      ORDER BY product.box_prod ASC;" ;

    $result = mysqli_query($connect, $query);
    mysqli_close($connect);
	  $number_of_rows = mysqli_num_rows($result);
  	$temp_array  = array();
	  if($number_of_rows > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
		$temp_array[]= $row;
    
		}
	}
	//header('Content-Type: application/json');
	build_table(json_decode(json_encode($temp_array),true));		
}

function build_table($temp_array){
	//$keys_arr=array_keys($temp_array[0]);
echo "<div class='container'>";
echo "<hr/>";
echo "<table class='table table-hover'>";
echo "<thead>";
echo         "<tr>";
echo 			      "<th data-field='code_cod'>Codigo</th>";
echo            "<th data-field='descrip_cod'>Descripcion del Codigo</th>";
echo            "<th data-field='stock'>Cantidad</th>";
echo            "<th data-field='box_prod'>Cantidad de cajas</th>";
echo            "<th data-field='size'>Talla</th>";
echo            "<th data-field='location_box'>Ubicación</th>";
echo            "<th data-field='date_create'>Fecha de Creación</th>";
echo            "<th data-field='nfactura'>Numero de factura</th>";
echo            "<th data-field='proveedor'>Proveedor</th>";
echo          "</tr>";
echo "</thead>";
echo "<tbody>"; 
 
/*echo "<tr>";
    echo "<th>orden</th>";
    foreach ($keys_arr as $key_3 => $value_key)
    {
        echo "<th>".$value_key."</th>";
    }
echo "</tr>";*/
 

foreach ($temp_array as $key => $usuario){
    echo "<tr>";
      //  echo "<td>".$key."</td>";
        foreach ($usuario as $key2 => $values){
            //echo "<pre>".$key2;
            echo "<td>";
            print_r($values);
            echo "</td>";
            //echo "</pre>";
        }
    echo "</tr>";    }

echo "</tbody>";
echo "</table>";
echo "</div>";
}
?>
    <!--Import jQuery and bootstrap.js--> 
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
</body>
</html>