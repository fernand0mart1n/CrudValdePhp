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

			unset($_SESSION["errores"]);
			unset($_SESSION["cliente"]);

		} catch(Exception $e) {
			header("Location: ../vistas/home.php?msg".$e->getMessage());
		}

		die();

	}

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		require "validatorcontroller.php";

		$cliente["nombre"]       = $_POST['nombre'];
		$cliente["apellido"]     = $_POST['apellido'];
		$cliente["fecha_nac"]    = $_POST['fecha_nac'];
		$cliente["nacionalidad"] = $_POST['nacionalidad'];
		$cliente["activo"]       = $_POST['activo'];

		$_SESSION["errores"] = validarCliente($cliente);

		if(count($_SESSION["errores"])) {

			$_SESSION["cliente"] = $cliente;
			header("Location: nuevocontroller.php");

		} else {

			$cli      = new Cliente();
			$clientes = $cli::alta($cliente);

			$_SESSION["mensaje"] = "El cliente " . $cliente["nombre"] . " " . $cliente["apellido"] . " ha sido creado éxitosamente";

			header("Location: homecontroller.php");

		}

		die();

	}