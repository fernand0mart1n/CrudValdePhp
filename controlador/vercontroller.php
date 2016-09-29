<?php 

	session_start();

	require_once "../modelo/cliente.class.php";

	$title = "Ver cliente";

	if(isset($_GET['id'])){
		try
		{
			
			$id      = $_GET['id'];
			$cliente = new Cliente();
			$cliente = $cliente::consulta($id);

			$title .= " " . $cliente['nombre'] . " " . $cliente['apellido'];

			require "../vistas/ver.php";
			
		} catch(Exception $e) {
			header("Location: ../vistas/home.php?msg".$e->getMessage());
		}
		die();
	}