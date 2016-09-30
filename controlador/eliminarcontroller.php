<?php 

	session_start();

	require_once "sesioncontroller.php";	

	// si está logueado, lo dejamos acceder al listado y a las operaciones
	if(estaLogueado() && tienePermiso("3")){

		require_once "../modelo/cliente.class.php";

		try
		{

			$cli  = new Cliente(); // cliente a borrar
			$cli2 = new Cliente(); // mismo cliente, pero guardamos los datos para informar su nombre antes

			$id   = $_POST['id']; // tomamos el id que viene por ajax

			$cli2 = Cliente::consulta($id); // almacenamos los datos para mostrar
			$clientes = $cli::baja($id); // damos de baja

			if($clientes){
				// informamos que salió bien...
				$_SESSION["mensaje"] = "El cliente " . $cli2["nombre"] . " " . $cli2["apellido"] . " ha sido dado de baja";	
			} else {
				// ... o mal
				$_SESSION["errores"] = "Error al eliminar al cliente " . $cli2["nombre"] . " " . $cli2["apellido"] . ".";	
			}

		} catch(Exception $e) {
			header("Location: ../vistas/home.php?msg".$e->getMessage());
		}
	} else {
		// si no está logueado, lo mandamos a la vista anónimo donde no podrá ver nada hasta loguearse
		$_SESSION["errores"] = "Usted no tiene permiso o no está logueado.";	

		unset($_SESSION["errores"]);

		require "homecontroller.php";
	}