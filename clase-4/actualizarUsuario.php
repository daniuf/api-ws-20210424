<?php
/**
 * Actualizar un recurso usando PUT
 */
define("TOKEN", 'srtfygvbnhmbjhmjkln32456tyhn');

if ($_SERVER['HTTP_TOKEN'] == TOKEN) { 

  $input = json_decode(file_get_contents('php://input'));
  $id = $_GET['id'];

  if ((empty($id) == false) && (empty($input->dni) == false)) {

	//Actualizar recurso en DB
	http_response_code(200);
	$json_response = array('status' => "Usuario actualizado", 
				'id' => $id, 
				'dni' => $input->dni);

  	header("Content-Type: application/json");
	echo json_encode($json_response);

  } else {

    http_response_code(400);//Bad Request
    header("Content-Type: application/json");
    $json_error = array('Error' => "Faltan ingresar datos obligatorios");
    echo json_encode($json_error);
  }

} else {

  http_response_code(403);
  header("Content-Type: application/json");
  $json_error = array('Error' => "Token invalido");
  echo json_encode($json_error);

}

