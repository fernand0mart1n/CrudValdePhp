<?php 

	session_start();

	require_once "../modelo/cliente.class.php";
	require_once "../modelo/nacionalidad.class.php";

	if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
		
		try
		{
			$id = $_GET['id'];
			$cliente = new Cliente();
			$cliente = $cliente::consulta($id);

			$nacionalidades = new Nacionalidad();
			$nacionalidad = $nacionalidades::listar();

			require "../vistas/editar.php";
		} catch(Exception $e) {
			header("Location: ../vistas/home.php?msg".$e->getMessage());
		}
		die();

	}

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$cliente["id"] = $_POST['id'];
		$cliente["nombre"] = $_POST['nombre'];
		$cliente["apellido"] = $_POST['apellido'];
		$cliente["fecha_nac"] = $_POST['fecha_nac'];
		$cliente["nacionalidad"] = $_POST['nacionalidad'];
		$cliente["activo"] = $_POST['activo'];

		$user = new Cliente();
		$clientes = $user::modificar($cliente);

		header("Location: ../controlador/homecontroller.php");
		die();
	}