<?php

	session_start();
	
	require "sesioncontroller.php";

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		// si vengo por post, logueo
		$usuario['nombre_usuario'] = $_POST['nombre_usuario'];
		$usuario['password']       = $_POST['password'];

		// paso los datos la función que loguea y comprueba la contraseña
		login($usuario['nombre_usuario'], $usuario['password']);

	} elseif($_SERVER['REQUEST_METHOD'] == 'GET'){
		// si vengo por get, deslogueo
		logout();

	}