<?php

	// Ésta función calcula la edad para mostrarla en el listado principal
	function calcularEdad($fecha)
	{
		// Convertimos el string del objeto cliente en tipo date
		$date = date_create($fecha);
		
		/* 
		Usamos la función diff que calcula la diferencia entre la 
		echa que vino como parámetro y la fecha actual, para después
		indicarle que de esa diferencia muestre sólo el año y lo devuelva
		*/

		$interval = $date->diff(new DateTime);
		return $interval->y;
	}

	// Ésta función compara fechas. Si la fecha pasada es mayor a la actual, devuelve true
	function compararFechas($fecha)
	{

		$now = time();

		if(strtotime($fecha) > $now){
			return true;
		}

		return false;

	}

	// Con ésta función validamos los forms de alta y modificación
	function validarCliente($cliente)
	{

		// Que el nombre no sea número ni venga vacío
		if(is_numeric($cliente["nombre"])){
			$errores["nombre"] = "El nombre no puede ser únicamente números";
		} elseif (strlen($cliente["nombre"]) == 0) {
			$errores["nombre"] = "El nombre no puede estar vacío";
		}

		// Que el apellido no sea número ni venga vacío
		if(is_numeric($cliente["apellido"])){
			$errores["apellido"] = "El apellido no puede ser únicamente números";
		} elseif (strlen($cliente["apellido"]) == 0) {
			$errores["apellido"] = "El apellido no puede estar vacío";
		}

		// Que la fecha de nacimiento no venga vacía ni sea futura
		if(empty($cliente["fecha_nac"])) {
			$errores["fecha_nac"] = "La fecha de nacimiento no puede estar vacía";
		} elseif (compararFechas($cliente["fecha_nac"])) {
			$errores["fecha_nac"] = "¡Usted no puede venir del futuro!";
		}

		// Que la nacionalidad no venga vacía
		if(empty($cliente["nacionalidad_id"])) {
			$errores["nacionalidad"] = "La nacionalidad no puede estar vacía";
		}

		// Que el estado de cliente no venga vacío
		if($cliente["activo"] == "") {
			$errores["activo"] = "El cliente debe estar activo o inactivo";	
		}

		// Retornamos los errores para mostrarlos en el form correspondiente
		return $errores;

	}