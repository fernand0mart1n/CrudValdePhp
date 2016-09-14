<?php require "layout.php"; ?>
    <body>
        <legend>Editar cliente</legend>
        <div class="col-xs-offset-3 col-xs-6">
            <form class="form form-horizontal" method="POST" action="../controlador/editarcontroller.php">
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="nombre"><b>Nombre:</b></label>
                    <div class="col-xs-8">
                        <input type="text" value="<?php echo $cliente["nombre"]; ?>" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required autofocus="">
                        <?php if(!empty($_SESSION["errores"]["nombre"])): ?>
                            <div class="alert alert-danger" role="alert"><b><?php echo $_SESSION["errores"]["nombre"]; ?></b></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="apellido"><b>Apellido:</b></label>
                    <div class="col-xs-8">
                        <input type="text" value="<?php echo $cliente["apellido"]; ?>" id="apellido" name="apellido" class="form-control" placeholder="Apellido" required>
                        <?php if(!empty($_SESSION["errores"]["apellido"])): ?>
                            <div class="alert alert-danger" role="alert"><b><?php echo $_SESSION["errores"]["apellido"]; ?></b></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="fecha_nac"><b>Fecha de nacimiento:</b></label>
                    <div class="col-xs-8">
                        <input type="date" value="<?php echo $cliente["fecha_nac"]; ?>" id="fecha_nac" name="fecha_nac" class="form-control" required>
                        <?php if(!empty($_SESSION["errores"]["fecha_nac"])): ?>
                            <div class="alert alert-danger" role="alert"><b><?php echo $_SESSION["errores"]["fecha_nac"]; ?></b></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nacionalidad" class="col-xs-4 control-label">Nacionalidad:</label>
                    <div class="col-xs-8">
                        <select class="form-control" id="nacionalidad" name="nacionalidad" required>
                            <option value="<?php echo $cliente["nacionalidad"]; ?>"><?php echo "nada"; ?></option> 
                            <?php foreach ($nacionalidad as $pais): ?>
                                <option value="<?php echo $pais["id"]; ?>"><?php echo $pais["nacionalidad"]; ?></option> 
                            <?php endforeach; ?>
                        </select>
                        <?php if(!empty($_SESSION["errores"]["nacionalidad"])): ?>
                            <div class="alert alert-danger" role="alert"><b><?php echo $_SESSION["errores"]["nacionalidad"]; ?></b></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="activo"><b>Activo:</b></label>
                    <div class="col-xs-8">
                        <?php if($cliente["activo"] == 1): ?>
                            <input type="radio" id="activo" name="activo" value="1" checked=""> Si<br>
                            <input type="radio" id="activo" name="activo" value="0"> No
                        <?php else: ?>
                            <input type="radio" id="activo" name="activo" value="1"> Si<br>
                            <input type="radio" id="activo" name="activo" value="0" checked> No
                        <?php endif; ?>
                        <?php if(!empty($_SESSION["errores"]["activo"])): ?>
                            <div class="alert alert-danger" role="alert"><b><?php echo $_SESSION["errores"]["activo"]; ?></b></div>
                        <?php endif; ?>
                    </div>
                </div>
                <input type="hidden" value="<?php echo $cliente["id"]; ?>" id="id" name="id"></input>
                <div class="form-group">
                    <div class="col-xs-offset-4 col-xs-8">
                        <a class="btn btn-default" href="homecontroller.php">
                            <span class="glyphicon glyphicon-chevron-left"></span> Volver al listado
                        </a>
                        <button type="submit" class="btn btn-primary pull-right">Editar <span class="glyphicon glyphicon-pencil"></span></button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
