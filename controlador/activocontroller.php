<?php 

	session_start();

	require_once "../modelo/cliente.class.php";
	require_once "../modelo/nacionalidad.class.php";

	if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
		
		try
		{
			$id = $_GET['id'];
			$activo = $_GET['activo'];
			$cliente = new Cliente();

			if ($activo == 1) {
				$cliente = $cliente::desactivo($id);
			} else {
				$cliente = $cliente::activo($id);
			}

		} catch(Exception $e) {
			header("Location: ../vistas/home.php?msg".$e->getMessage());
		}
		die();

	}