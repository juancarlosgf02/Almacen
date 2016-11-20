<?php
require '../conexion1.php'; 
$query = "SELECT * FROM product";
$result = mysqli_query($connect,$query); 
?> 

<div class="container">
    <ol class="breadcrumb">
      <li><a href="principal.php#/inicio">Inicio</a></li>
      <li class="active">Lista General De todos los Códigos</li>
    </ol>

    <div class="page-header">
        <h1>Lista General De todos los Códigos</h1>
    </div><br>
    
  <table  class="table table-hover">
      <thead>
          <tr>
            <!--<th data-field="id">Id</th> -->
            <th  data-field="code_cod">Codigo</th>
            <th data-field="box_prod">Cantidad</th>
            <th data-field="size">Size</th> 
            <th data-field="location_box">Ubicación</th>
            <th data-field="date_create">Fecha de Creación</th>
            <th data-field="proveedor">Provedor</th>
          </tr>
           </thead> 
      <tbody>
        <?php         
        if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($rs = mysqli_fetch_assoc($result)) {
        echo "<tr>" 
           //."<td>".$rs['id']."</td>" 
           ."<td>".$rs['code_cod']."</td>"
           ."<td>".$rs['box_prod']."</td>"  
           ."<td>".$rs['size']."</td>"
           ."<td>".$rs['location_box']."</td>"
           ."<td>".$rs['date_create']."</td>"
           ."<td>".$rs['proveedor']."</td>" 
           ."</tr>"; 
    }
} else {
    echo "0 results";
}
mysqli_close($connect);
      ?>
      </tbody>       
  </table>   
</div>