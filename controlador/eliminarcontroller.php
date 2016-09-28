<?php 

	session_start();

	require_once "../modelo/cliente.class.php";

	try
	{

		$cli  = new Cliente();
		$cli2 = new Cliente();

		$id   = $_POST['id'];

		$cli2 = Cliente::consulta($id);
		$clientes = $cli::baja($id);

		$_SESSION["mensaje"] = "El cliente " . $cli2["nombre"] . " " . $cli2["apellido"] . " ha sido dado de baja";	

	} catch(Exception $e) {
		header("Location: ../vistas/home.php?msg".$e->getMessage());
	}

	die(); 