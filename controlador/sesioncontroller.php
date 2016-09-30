<?php

	require "../modelo/usuario.class.php";

	// funcion que devuelve verdadero o falso en función de si el usuario ingresó o no
	function estaLogueado()
	{
		if(isset($_SESSION['usuario']) && $_SESSION['usuario']){
			return true;
		} else {
			return false;
		}
	}

	// función que hashea la contraseña antes de compararla con la de la BD
	function hashearPassword($input) {
    $pass = strtoupper(
        sha1(
                sha1($input, true)
        )
    );
    $pass = '*' . $pass;
    return $pass;
}

	// función encargada de loguear
	function login($nombre_usuario, $password) 
	{
		// buscamos que el usuario ingresado exista
		$usuario2 = Usuario::buscarUsuario($nombre_usuario);
		
		// verificamos que encontró al usuario
		if(empty($usuario2)){
			
			// si hay errores, los mostramos
			$_SESSION['errores'] = "El usuario ingresado no existe.";

		} else {

			// si la contraseña ingresada coincide con el hash de la bd, logueo y seteo su nombre de usuario
			if(hashearPassword($password) == $usuario2['password']){
				$_SESSION['usuario']  = $usuario2['nombre_usuario'];
				//$_SESSION['permisos'] = $usuario2['permisos'];
			} else {
				// si hay errores, los mostramos
				$_SESSION['errores'] = "Contraseña incorrecta.";				
			}	
		}

		// redirigimos al controller que lo patea al listado
		header('Location: homecontroller.php');
		die();
	}

	// función que elimina los datos del usuario y mata la sesión
	function logout() 
	{
		session_unset();   // limpiamos la variable $_SESSION
		session_destroy(); // destruimos la sesión
		session_start();   // nueva sesión para asegurar de que la anterior no existe
		session_regenerate_id(true); // actualizamos el id de la sesión

		// redirigimos a la vista que sólo permite loguear
		header('Location: homecontroller.php');
		die();
	}

	// función que comprueba permisos
	function tienePermiso($accion)
	{
		if(isset($_SESSION['permisos']) && $_SESSION['permisos'][$accion]){
			return true;
		} else {
			return false;
		}
	}