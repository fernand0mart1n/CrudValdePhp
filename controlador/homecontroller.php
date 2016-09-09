<?php 

	session_start();

	require_once "../modelo/cliente.class.php";

	try
	{

		$cliente = new Cliente();
		$clientes = $cliente::listar();

		require "../vistas/home.php";

	} catch(Exception $e) {
		header("Location: ../vistas/home.php?msg".$e->getMessage());
	}

	die(); 