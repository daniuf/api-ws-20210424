<?php

/**
 * Obtener usuario con GET
 */
define("TOKEN", 'srtfygvbnhmbjhmjkln32456tyhn');

if ($_SERVER['HTTP_TOKEN'] == TOKEN) { 

  $id = $_GET['id'];

  if ($id) {

   //Buscamos el ID de usuario en DB
   $usuario = array(
		'nombre' => "Marcelo",
		'edad' => 32,
		'dni' => "1234567890"
	     );

   $persona = json_encode($usuario);

   http_response_code(200);
   header("Content-Type: application/json");
   echo $persona;
  } else {

    http_response_code(404);//No encuentro ese recurso
    header("Content-Type: application/json");
    $json_error = array('Error' => "Recurso no encontrado");
    echo json_encode($json_error);
  }

} else {

  http_response_code(403);
  header("Content-Type: application/json");
  $json_error = array('Error' => "Token invalido");
  echo json_encode($json_error);

}

