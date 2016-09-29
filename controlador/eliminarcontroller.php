<?php 

	session_start();

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