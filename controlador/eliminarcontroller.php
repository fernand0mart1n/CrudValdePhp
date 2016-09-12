<?php 

	session_start();

	require_once "../modelo/cliente.class.php";

	try
	{

		$cli = new Cliente();
		$id = $_POST['id'];

		$clientes = $cli::baja($id);

	} catch(Exception $e) {
		header("Location: ../vistas/home.php?msg".$e->getMessage());
	}

	die(); 