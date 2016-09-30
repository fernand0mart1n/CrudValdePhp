<?php

	// si por algún error está logueado, lo redigimos al homecontroller para que pueda ver el listado
	if(estaLogueado()){
		header('Location: homecontroller.php');
		die();
	}

	require "vistas/layout.php"; 
?>

		<div class="row">
			<div class="well col-xs-offset-1 col-xs-6">
				Debe ingresar para poder ver el listado y realizar operaciones.
			</div>
		</div>
		<div class="row">
			<div class="col-xs-offset-1 col-xs-3">
				<?php if(!empty($_SESSION["errores"])): ?>
	                <div class="alert alert-danger alert-dismissable" role="alert">
	                <button type="button" class="close" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	                <strong><span class="glyphicon glyphicon-alert"></span> <?php echo $_SESSION["errores"]; ?></strong></div>
	            <?php endif; ?>
	        </div>
		</div>
	</body>
</html>