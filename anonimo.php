<?php

	// si por algún error está logueado, lo redigimos al homecontroller para que pueda ver el listado
	if(estaLogueado()){
		header('Location: controlador/homecontroller.php');
		die();
	}

	require "vistas/layout.php"; 
?>

		<div class="row">
			<div class="well col-xs-offset-1 col-xs-6">
				<span class="glyphicon glyphicon-alert"></span> 
				Debe ingresar para poder ver el listado y realizar operaciones.
			</div>
		</div>
	</body>
</html>