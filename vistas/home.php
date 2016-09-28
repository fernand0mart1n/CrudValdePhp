<?php require "layout.php"; ?>
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-danger">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-exclamation-triangle"></i> Eliminar cliente</h4>
                </div>
                <div class="modal-body">
                    ¿Está seguro que desea eliminar este cliente?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button id="btnDel" type="button" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <div class="col-xs-offset-1 col-xs-10 ">
            <h3 class="page-header">Clientes</h3>
            <table class="table table-responsive table-bordered table-striped table-hover table-condensed">
                <thead>
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
                </thead>
                <tbody>
                    <?php foreach ($clientes as &$cliente): ?>
                        <tr>
                            <td class="nombre">
                                <?php echo $cliente["nombre"]; ?>
                            </td>
                            <td class="apellido">
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
                                    <button type="button" class="btn btn-danger" id="<?php echo $cliente["id"] ?>" onclick="eliminar(<?php echo $cliente['id']; ?>)"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
                                </div>                                    
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php if(!empty($_SESSION["mensaje"])): ?>
                <div class="alert alert-info" role="alert">
                    <strong><?php echo $_SESSION["mensaje"]; ?></strong>
                </div>
            <?php endif; ?>
            <hr class="table-footer">
            <a class="btn btn-success pull-right" href="nuevocontroller.php"><span class="glyphicon glyphicon-plus"></span> Nuevo cliente</a>
        </div>
    </body>
</html>
