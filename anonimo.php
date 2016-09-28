<?php

	if(estaLogueado()){
		header('Location: controlador/homecontroller.php');
		die();
	}

	require "vistas/layout.php"; 
?>

		<div class="row">
			<div class="well col-xs-offset-1 col-xs-6">Usted no se encuentra logueado.</div>
		</div>
	</body>
</html>