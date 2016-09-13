<?php 

	session_start();

	require_once "../modelo/cliente.class.php";

	$title = "Listado de clientes";

	try
	{

		$cliente  = new Cliente();
		$clientes = $cliente::listar();

		/*foreach ($clientes as &$cliente) {
			//Acá va el parseo de edad
		}*/

		require "../vistas/home.php";

	} catch(Exception $e) {
		header("Location: ../vistas/home.php?msg".$e->getMessage());
	}

	die(); 