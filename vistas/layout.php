<?php

    require_once "../controlador/sesioncontroller.php";

?>
<html>
    <head>
    	<?php if(isset($title)): ?>
        	<title><?php echo $title ?></title>
       	<?php else: ?>
       		<title>Inicio</title>
       	<?php endif; ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='shortcut icon' type='image/x-icon' href='/CrudValdePhp/assets/img/favicon.ico'/>
        <link rel="stylesheet" href="/CrudValdePhp/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/CrudValdePhp/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/CrudValdePhp/assets/bower_components/jquery-ui/themes/dark-hive/jquery-ui.min.css">
        <link rel="stylesheet" href="/CrudValdePhp/assets/css/crud.css">
        <script src="/CrudValdePhp/assets/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="/CrudValdePhp/assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
        <script src="/CrudValdePhp/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="/CrudValdePhp/assets/js/crud.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="">Gestor de clientes</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <?php if(estaLogueado()): ?>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['usuario']; ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="/CrudValdePhp/controlador/logincontroller.php">Cerrar sesión</a></li>
                  </ul>
                </li>
                <?php else: ?>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Ingresar <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <div class="container-fluid">
                            <form class="form" method="POST" action="logincontroller.php">
                                <div class="form-group">
                                    <label for="nombre">Usuario:</label>
                                    <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control" placeholder="Usuario" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña:</label>
                                    <input type="password" name="password" id="password"  class="form-control" placeholder="Contraseña" required>
                                </div>
                                <input type="hidden" name="accion" id="accion" value="login">
                                <button type="submit" class="center-block btn btn-success">Ingresar <span class="glyphicon glyphicon-log-in"></span></button>
                            </form>
                        </div>
                      </ul>
                    </li>
                <?php endif; ?>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>