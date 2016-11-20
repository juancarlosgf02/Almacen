<!DOCTYPE html>
<html ng-app='angularRoutingApp' lang="es">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="generator" content="Bootply" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="../resources/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link type="text/css" rel="stylesheet" href="../resources/css/styles.css "/>
  <title>Almacen</title>
  <link rel="shortcut icon" href="../../resources/images/logo.ico"/>
</head>

<body class="principal"> 
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require '../../conexion1.php';
	csv();
}
function csv(){
	global $connect;
    $table = 'code';
    if(isset($_POST['submit'])){
        //Aquí es donde seleccionamos nuestro csv
         $fname = $_FILES['sel_file']['name'];
         echo '<div class="modal-dialog modal-content modal-body">';
         echo '<h4 class="text-center">Cargando nombre del archivo:</h4>'.$fname.'<br/>';        
         $chk_ext = explode(".",$fname);
         if(strtolower(end($chk_ext)) == "csv"){
             //si es correcto, entonces damos permisos de lectura para subir
             $filename = $_FILES['sel_file']['tmp_name'];
             $handle = fopen($filename, "r");
             while (($data = fgetcsv($handle, 1000, ",")) !== FALSE){
               //Insertamos los datos con los valores...
                $sql = "INSERT into code (code_cod, description_cod, stock) values('$data[0]','$data[1]','$data[2]')";
                mysqli_query($connect, $sql) or die (mysqli_error($connect));
             }
             //cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
            fclose($handle);
             mysqli_close($connect);  
            echo '<h4 class="text-center">Archivo invalido</h4>';
	        echo '<div class="col-md-6 col-md-offset-8">';
		        $regresar = '<a href="../../principal.php#/inicio"> <button type="button" class="btn btn-warning btn-lg">Regresar</button></a>';
	        echo $regresar;
	        echo '</div>';         
         }
         else {
            //si aparece esto es posible que el archivo no tenga el formato adecuado, inclusive cuando es cvs, revisarlo para  
	        echo '<h4 class="text-center">Archivo invalido</h4>';
	        echo "<br>";
	        echo '<div class="col-md-6 col-md-offset-8">';
		        $regresar = '<a href="../../principal.php#/agregarcodigo"> <button type="button" class="btn btn-warning btn-lg">Regresar</button></a>';
	        echo $regresar;
	        echo '</div>';
            echo '</div>';
         }   
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