<?php

	require "../modelo/usuario.class.php";

	function estaLogueado()
	{
		if(isset($_SESSION['usuario']) && $_SESSION['usuario']){
			return true;
		} else {
			return false;
		}
	}

	function login($nombre_usuario, $password) 
	{
		
		$usuario2 = Usuario::buscarUsuario($nombre_usuario);
		
		if(password_verify($password, $usuario2['password'])){
			$_SESSION['usuario']  = $usuario2['nombre_usuario'];
			//$_SESSION['permisos'] = $usuario2['permisos'];
		}

		header('Location: homecontroller.php');
		die();
	}

	function logout() 
	{
		session_unset();
		session_destroy();
		session_start();
		session_regenerate_id(true);

		header('Location: homecontroller.php');
		die();
	}

	function tienePermiso($accion)
	{
		if(isset($_SESSION['permisos']) && $_SESSION['permisos'][$accion]){
			return true;
		} else {
			return false;
		}
	}