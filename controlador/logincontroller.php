<?php

	session_start();
	
	require "sesioncontroller.php";

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$usuario['nombre_usuario'] = $_POST['nombre_usuario'];
		$usuario['password']       = $_POST['password'];

		login($usuario['nombre_usuario'], $usuario['password']);

	} elseif($_SERVER['REQUEST_METHOD'] == 'GET'){
			
		logout();

	}