<?php 

	session_start();

	require_once "../modelo/cliente.class.php";

	if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
		
		try
		{
			$id      = $_GET['id'];
			$activo  = $_GET['activo'];
			$cliente = new Cliente();
			$cli     = new Cliente();

			$cli = $cli::consulta($id);

			if ($activo == 1) {
				$cliente = $cliente::activo($id, INACTIVO);

				$_SESSION["mensaje"] = "El cliente " . $cli["nombre"] . " " . $cli["apellido"] . " ha sido desactivado";

			} else {
				$cliente = $cliente::activo($id, ACTIVO);

				$_SESSION["mensaje"] = "El cliente " . $cli["nombre"] . " " . $cli["apellido"] . " ha sido activado";
			}

			header("Location: homecontroller.php");

		} catch(Exception $e) {
			header("Location: ../vistas/home.php?msg".$e->getMessage());
		}
		die();

	}