<?php
require '../conexion1.php'; 
$query = "SELECT * FROM code";
$result = mysqli_query($connect,$query); 
?> 

<div class="container">
    <ol class="breadcrumb">
      <li><a href="principal.php#/inicio">Inicio</a></li>
      <li class="active">Lista General De todos los Códigos</li>
    </ol>

    <div class="page-header">
        <h1>Lista General de todos los Códigos</h1>
    </div><br>
    
  <table  class="table table-hover">
      <thead>
          <tr>
            <!--<th data-field="id">Id</th> -->
            <th  data-field="code_cod">Codigo</th>
            <th data-field="stock">Stock</th>
            <th data-field="description_cod">Descripción del código</th> 
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
           ."<td>".$rs['stock']."</td>"  
           ."<td>".$rs['description_cod']."</td>"
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