<?php

// Traemos los datos para ingresar a la BD de cada uno
require "usuario.php";

// Abstraemos la conexión a la BD
class Conexion extends PDO
{

	private $tipo_de_base   = 'mysql';
	private $host           = 'localhost';
	private $nombre_de_base = 'clientes';
	private $user           = USER;
	private $pass           = PASS;
	public function __construct(){
	  
	  	try{
		  	parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		  		/*
		  		Acá arriba, al final seteamos el formato UTF8 para las tildes
		  		Esto nos sirve, por ejemplo, para Perú en la tabla nacionalidades
		  		*/
		}catch(PDOException $e){
				echo 'No se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
				exit;
		}
	  
	//DEBUG HABILITADO
	$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  
   } 
}