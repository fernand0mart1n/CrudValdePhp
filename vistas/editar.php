<?php require "layout.php"; ?>
    <body>
        <div class="col-xs-offset-3 col-xs-6">
            <legend>Editar cliente</legend>
            <form class="form form-horizontal" method="POST" action="../controlador/editarcontroller.php">
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="nombre"><b>Nombre:</b></label>
                    <div class="col-xs-8">
                        <input type="text" value="<?php echo $cliente["nombre"]; ?>" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required autofocus="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="apellido"><b>Apellido:</b></label>
                    <div class="col-xs-8">
                        <input type="text" value="<?php echo $cliente["apellido"]; ?>" id="apellido" name="apellido" class="form-control" placeholder="Apellido" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="fecha_nac"><b>Fecha de nacimiento:</b></label>
                    <div class="col-xs-8">
                        <input type="date" value="<?php echo $cliente["fecha_nac"]; ?>" id="fecha_nac" name="fecha_nac" class="form-control" required>
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
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="activo"><b>Activo:</b></label>
                    <div class="col-xs-8">
                        <input type="radio" id="activo" name="activo" value="si" checked> Si<br>
                        <input type="radio" id="activo" name="activo" value="no"> No<br>
                    </div>
                </div>
                <input type="hidden" value="<?php echo $cliente["id"]; ?>" id="id" name="id"></input>
                <div class="form-group">
                    <div class="col-xs-offset-4 col-xs-8">
                        <a class="btn btn-primary" href="homecontroller.php">
                            <span class="glyphicon glyphicon-chevron-left"></span> Volver al listado
                        </a>
                        <button type="submit" class="btn btn-primary pull-right">Editar <span class="glyphicon glyphicon-pencil"></span></button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
