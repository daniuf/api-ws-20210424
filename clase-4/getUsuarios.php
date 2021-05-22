<?php

/**
 * Obtener usuario con GET
 */
define("TOKEN", 'srtfygvbnhmbjhmjkln32456tyhn');

if ($_SERVER['HTTP_TOKEN'] == TOKEN) { 

  $usuarios = array(
		array('nombre' => "Patricio", "edad" => 30),
		array('nombre' => "Juan", "edad" => 25)
	     );

  $personas = json_encode($usuarios);

  http_response_code(200);
  header("Content-Type: application/json");
  echo $personas;

} else {

  http_response_code(403);
  header("Content-Type: application/json");
  $json_error = array('Error' => "Token invalido");
  echo json_encode($json_error);

}

