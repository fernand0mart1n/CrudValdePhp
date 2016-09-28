<?php 

	session_start();

	require_once "../modelo/cliente.class.php";
	require_once "validatorcontroller.php";
	require_once "sesioncontroller.php";

	if(estaLogueado()){

		$title = "Listado de clientes";

		try
		{

			$cliente  = new Cliente();
			$clientes = $cliente::listar();

			// Calculamos la edad para cada clientes, sólo para mostrarla en el listado
			foreach ($clientes as &$cliente) {
				$cliente["fecha_nac"] = calcularEdad($cliente["fecha_nac"]);
			}

			require "../vistas/home.php";

			/*
			Acá borramos cualquier mensaje que estemos mostrando
			ahora, para la futura recarga de la página
			*/
			
			unset($_SESSION["mensaje"]);

		} catch(Exception $e) {
			header("Location: ../vistas/home.php?msg".$e->getMessage());
		}

		die(); 
	} else {
		require "../anonimo.php";
	}