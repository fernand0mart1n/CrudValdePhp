<?php

	function validarCliente($cliente)
	{
		if(is_numeric(cliente["nombre"])){
			$errores["nombre"] = "El nombre no puede ser únicamente números";
		} elseif (strlen($cliente["nombre"]) == 0) {
			$errores["nombre"] = "El nombre no puede estar vacío";
		}

		if(is_numeric(cliente["apellido"])){
			$errores["apellido"] = "El apellido no puede ser únicamente números";
		} elseif (strlen($cliente["apellido"]) == 0) {
			$errores["apellido"] = "El apellido no puede estar vacío";
		}

		if(empty($cliente["fecha_nac"])) {
			$errores["fecha_nac"] = "La fecha de nacimiento no puede estar vacía";
		}

		if(empty($cliente["nacionalidad"])) {
			$errores["nacionalidad"] = "La nacionalidad no puede estar vacía";
		}

		if(empty($cliente["activo"])) {
			$errores["activo"] = "El cliente debe estar activo o inactivo";	
		}

		return $errores;
	}