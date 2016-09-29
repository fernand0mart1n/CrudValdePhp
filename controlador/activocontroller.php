<?php 

	session_start();

	require_once "sesioncontroller.php";	

	// si está logueado, lo dejamos acceder al listado y a las operaciones
	if(estaLogueado()){

		require_once "../modelo/cliente.class.php";

		if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
			
			try
			{
				
				// Los botones activar/desactivar derivan a este lugar
				$id      = $_GET['id'];
				$activo  = $_GET['activo'];
				$cliente = new Cliente();
				$cli     = new Cliente();

				$cli = $cli::consulta($id);

				// Evaluamos si debemos activar o desactivar el cliente
				if ($activo == 1) {

					$cliente = $cliente::activo($id, INACTIVO);

					if($cliente){

						$_SESSION["mensaje"] = "El cliente " . $cli["nombre"] . " " . $cli["apellido"] . " ha sido desactivado";	

					} else {

						$_SESSION["mensaje"] = "ERROR";	
						
					}

				} else {
					$cliente = $cliente::activo($id, ACTIVO);

					if($cliente){

						$_SESSION["mensaje"] = "El cliente " . $cli["nombre"] . " " . $cli["apellido"] . " ha sido activado";	
						
					} else {

						$_SESSION["mensaje"] = "ERROR";	

					}
				}

				header("Location: homecontroller.php");

			} catch(Exception $e) {
				header("Location: ../vistas/home.php?msg".$e->getMessage());
			}
			die();

		}
	} else {
		// si no está logueado, lo mandamos a la vista anónimo donde no podrá ver nada hasta loguearse
		require "../anonimo.php";
	}