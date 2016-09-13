<?php require "layout.php"; ?>
    <body>
        <div class="col-xs-offset-1 col-xs-10 ">
            <table class="table table-responsive table-bordered table-striped table-hover table-condensed">
                <thead>
                    <h3>Clientes</h3>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            Nombre
                        </th>
                        <th>
                            Apellido
                        </th>
                        <th>
                            Edad
                        </th>
                        <th>
                            Nacionalidad
                        </th>
                        <th>
                            Activo
                        </th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                    <?php foreach ($clientes as $cliente): ?>
                        <tr>
                            <td>
                                <?php echo $cliente["nombre"]; ?>
                            </td>
                            <td>
                                <?php echo $cliente["apellido"]; ?>
                            </td>
                            <td>
                                <?php echo $cliente["fecha_nac"]; ?>
                            </td>
                            <td>
                                <?php echo $cliente["nacionalidad"]; ?>
                            </td>
                            <td>
                                <?php if($cliente["activo"] == 1): ?>
                                    <span class="glyphicon glyphicon-ok-circle"></span>
                                <?php else: ?>
                                    <span class="glyphicon glyphicon-remove-circle"></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-default" href="vercontroller.php?id=<?php echo $cliente["id"]; ?>"><span class="glyphicon glyphicon-eye-open"></span> Ver</a>
                                    <a class="btn btn-primary" href="editarcontroller.php?id=<?php echo $cliente["id"]; ?>"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
                                    <?php if($cliente["activo"] == 1): ?>
                                        <a class="btn btn-info" href="activocontroller.php?id=<?php echo $cliente["id"]; ?>&activo=<?php echo $cliente["activo"]; ?>"><span class="glyphicon glyphicon-remove"></span> Desactivar</a>
                                    <?php else: ?>
                                        <a class="btn btn-info" href="activocontroller.php?id=<?php echo $cliente["id"]; ?>&activo=<?php echo $cliente["activo"]; ?>"><span class="glyphicon glyphicon-ok"></span> Activar</a>
                                    <?php endif; ?>
                                    <button class="btn btn-danger delete" id="<?php echo $cliente["id"] ?>"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
                                </div>                                    
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <hr>
            <a class="btn btn-success pull-right" href="nuevocontroller.php"><span class="glyphicon glyphicon-plus"></span> Nuevo cliente</a>
        </div>
    </body>
</html>
