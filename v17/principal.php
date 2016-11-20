<!DOCTYPE html>
<html ng-app='angularRoutingApp' lang="es">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="generator" content="Bootply" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="resources/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link type="text/css" rel="stylesheet" href="resources/css/styles2.css "/>
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
          <a class="navbar-brand" href="#inicio">Almacén</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ingreso <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#agregarcodigo">Agregar Código</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Modifición</li>
                <li><a href="#modifydescrip">Modificar Descripción</a></li>
              </ul>
            </li>
            <!--<li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Modificar<span class="caret"></span></a>
              <ul class="dropdown-menu">
                 <li><a href="#modifystock">Modificar Cantidad</a></li> 
                  <li><a href="#modifydescrip">Modificar Descripción</a></li>
              </ul>
            </li>-->
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Distribución <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#distribucion">Distribución de Cajas</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Lista</li>
                <li><a href="#viewproduct">Listar Códigos</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Egreso <span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="#modifystock">Egreso</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Informe de Productos <span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="#informacion">Informe de Productos</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a>Bienvenido <?php session_start(); ob_start(); echo $_SESSION['usuario'];?></a></li>
            <li><a href="close.php">Cerrar Sesión <i class="glyphicon glyphicon-off"></i></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

   <div ng-view></div> 
<br><br>
<footer class="panel-footer">
  <div class="container">
    <p class="text-muted">© 2016 Todos los Derechos Reservados</p>
  </div>
</footer>

    <!--Import jQuery and bootstrap.js--> 
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
    <script src="resources/js/angular.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.3/angular-route.js"></script>
    <script src="resources/js/main.js"></script>
</body>
</html>