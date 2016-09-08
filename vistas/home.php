<?php require "layout.php"; ?>
    <body>
        <div class="row">
            <div class="col-xs-offset-3 col-xs-6 ">
                <table class="table table-responsive table-striped table-hover table-condensed">
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
                                Acciones
                            </th>
                        </tr>
                        <tr>
                            <?php foreach ($clientes as $cliente): ?>
                                <td>
                                    ${cliente.nombre}
                                </td>
                                <td>
                                    ${cliente.apellido}
                                </td>
                                <td>
                                    ${cliente.fecha_nac}
                                </td>
                            <?php endforeach; ?>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-info" href="ver.php"><span class="glyphicon glyphicon-eye-open"></span> Ver</a>
                                    <a class="btn btn-primary" href="editar.php"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
                                    <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
                                </div>                                    
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <a class="btn btn-success pull-right" href="nuevo.php"><span class="glyphicon glyphicon-plus"></span> Nuevo cliente</a>
            </div>
        </div>
    </body>
</html>
