<?php

require '../conexion2.php'; 

$sql = "SELECT * FROM product"; 
$sql = mysql_query($sql, $link); 
?> 


<div class="titleBox teal darken-4 white-text">
    <h3 class="center-align">Listar Producto</h3>
</div><br/>

<div class="container">
  <table  class="highlight centered responsive-table">
      <thead>
          <tr>
            <!--<th data-field="id">Id</th> -->
            <th data-field="product_code">Codigo Global</th>
            <th data-field="name">Nombre Del Producto</th>
            <th data-field="code_prod">Codigo</th>
            <th data-field="stock">Cantidad</th>
            <th data-field="category">Rack</th>
            <th data-field="brand">Cantidad Cajas</th>
            <th data-field="color">Posicion</th>
            <th data-field="size">Estado</th>
          </tr>
           </thead> 
      <tbody>
        <?php 
        while($rs=mysql_fetch_array($sql)) 
        { 
        echo "<tr>" 
           //."<td>".$rs['id']."</td>" 
           ."<td>".$rs['product_code']."</td>"
           ."<td>".$rs['name']."</td>"
           ."<td>".$rs['code_prod']."</td>"  
           ."<td>".$rs['stock']."</td>" 
           ."<td>".$rs['idFkCategory']."</td>" 
           ."<td>".$rs['idFkBrand']."</td>"
           ."<td>".$rs['idFkColor']."</td>"
           ."<td>".$rs['idFkSize']."</td>" 
           ."</tr>"; 
        } 
      ?>
      </tbody>       
  </table>   
</div>