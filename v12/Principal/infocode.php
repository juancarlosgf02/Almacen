<?php
require '../conexion2.php'; 
$query = mysql_query( "SELECT * FROM product" , $link); 
?> 

<div class="titleBox teal darken-4 white-text">
    <h3 class="center-align">Lista General De todos los Códigos</h3>
</div><br/>
<div class="container">
  <table  class="highlight centered responsive-table">
      <thead>
          <tr>
            <!--<th data-field="id">Id</th> -->
            <th data-field="code_cod">Codigo</th>
            <th data-field="box_prod">Cantidad</th>
            <th data-field="rack">Rack</th>
            <th data-field="location_box">Ubicación</th>
          </tr>
           </thead> 
      <tbody>
        <?php 
        while($rs=mysql_fetch_array($query)){ 
        echo "<tr>" 
           //."<td>".$rs['id']."</td>" 
           ."<td>".$rs['code_cod']."</td>"
           ."<td>".$rs['box_prod']."</td>"  
           ."<td>".$rs['rack']."</td>"
           ."<td>".$rs['location_box']."</td>" 
           ."</tr>"; 
        } 
      ?>
      </tbody>       
  </table>   
</div>