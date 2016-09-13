<?php 

	session_start();

	require_once "../modelo/cliente.class.php";
	require_once "../modelo/nacionalidad.class.php";

	$title = "Nuevo cliente";

	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		try
		{

			$nacionalidades = new Nacionalidad();
			$nacionalidad   = $nacionalidades::listar();

			require "../vistas/nuevo.php";

		} catch(Exception $e) {
			header("Location: ../vistas/home.php?msg".$e->getMessage());
		}

		die();

	}

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$cliente["nombre"]       = $_POST['nombre'];
		$cliente["apellido"]     = $_POST['apellido'];
		$cliente["fecha_nac"]    = $_POST['fecha_nac'];
		$cliente["nacionalidad"] = $_POST['nacionalidad'];
		$cliente["activo"]       = $_POST['activo'];

		$user = new Cliente();
		$clientes = $user::alta($cliente);

		header("Location: ../controlador/homecontroller.php");
		die();

	}