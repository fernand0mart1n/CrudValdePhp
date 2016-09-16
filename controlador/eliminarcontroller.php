<?php 

	session_start();

	require_once "../modelo/cliente.class.php";

	try
	{

		$cli = new Cliente();
		$id  = $_POST['id'];

		$clientes = $cli::baja($id);

		/*if($clientes){

			$_SESSION["mensaje"] = "El cliente " . $cli["nombre"] . " " . $cli["apellido"] . " ha sido dado de baja";	

		} else {

			$_SESSION["mensaje"] = "ERROR";	
			
		}*/

	} catch(Exception $e) {
		header("Location: ../vistas/home.php?msg".$e->getMessage());
	}

	die(); 