<?php

class Servidor {

	public function __construct() {}

	public function holaMundo() {
	  return "Hola mundo";
	}

	public function holaMundoSaludar($mensaje) {
	  return "Hola mundo ".$mensaje;
	}

	public function crearUsuario($info) {
	  //Conectarse a DB
	  //Crear usuario
	  return "algo";
	}
}

$options = array('uri' => 'http://api.daniuf.com.ar/clase-3/servidor.php');

$soapserver = new SoapServer(null, $options);
$soapserver->setClass('Servidor');
$soapserver->handle();
