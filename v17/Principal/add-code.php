<div class="container">
<ol class="breadcrumb">
  <li><a href="principal.php#/inicio">Inicio</a></li>
  <li class="active">Agregar Código</li>
</ol>
</div>
<div class="container">
  <!-- Main component for a primary marketing message or call to action -->
   <div class="page-header">
        <h1> Agregar Código</h1>
   </div>
  <div class="col-xs-10">
    <div class="col-md-4">
      <!-- Button trigger modal -->
    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#codigos">Listado Códigos</button>
    </div><br> 
    <div class="col-md-4 col-md-offset-4">
      <span class="glyphicon glyphicon-import"> </span> <a href="principal.php#/import">IMPORTAR</a>
    </div>
    <br><br>
       <div class="row">
           <form class="form-horizontal" action="Principal/controller/add-code.php" method="post">    
                <div class="form-group">
                  <div class="col-xs-4">
                      <label for="code_cod">Código</label>
                       <input id="code_cod" type="text" class="form-control" name="code_cod" placeholder="Código">
                  </div>
                </div>
                <div class="form-group"> 
                  <div class="col-xs-4">
                    <label for="stock">Stock</label>
                       <input id="stock" type="text" class="form-control" name="stock" placeholder="Stock">
                  </div>
                </div>
              <div class="row">
                <div class="col-xs-8">
                  <label for="description_cod">Descripción</label>
                  <input id="description_cod" type="text" class="form-control" name="description_cod" placeholder="Descripción">
                </div>                
              </div><br><br>
            <div class="row">
              <div class="col-md-4 col-md-offset-9">
                <a href="principal.php#/inicio"><button type="button" class="btn btn-danger">Cancelar</button></a> 
                <button class="btn btn-success" type="submit" >Procesar</button>
              </div>  
            </div>          
        </form> 
    </div>  
    </div>

<!-- Modal -->
<div class="modal fade" id="codigos" tabindex="-1" role="dialog" aria-labelledby="codigos">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="codigos">Listado de todos los Códigos</h4>
      </div>
      <div class="modal-body">
          <?php
            require '../conexion1.php'; 
              $query = "SELECT * FROM code";
              $result = mysqli_query($connect,$query); 
          ?> 
          <table  class="table table-hover">
            <thead>
              <tr>
                <th  data-field="code_cod">Codigo</th>
                <th data-field="stock">Cantidad</th>
                <th data-field="descripcion_cod">Descripción</th> 
              </tr>
            </thead> 
            <tbody>
              <?php         
                if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($rs = mysqli_fetch_assoc($result)) {
                    echo "<tr>" 
                        ."<td>".$rs['code_cod']."</td>"
                        ."<td>".$rs['stock']."</td>"  
                        ."<td>".$rs['description_cod']."</td>"
                        ."</tr>";}
                } else {
                  echo "0 results";
                  }
                  mysqli_close($connect);
                ?>
            </tbody>
            </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</div>