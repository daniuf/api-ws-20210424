<?php
/**
 * Eliminar un recurso usando DELETE
 */
define("TOKEN", 'srtfygvbnhmbjhmjkln32456tyhn');

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
 if ($_SERVER['HTTP_TOKEN'] == TOKEN) { 

  $id = $_GET['id'];

  if (empty($id) == false) {

	//Eliminamos recurso en DB
	http_response_code(200);
	$json_response = array('status' => "Usuario borrado"); 

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
} else {
 
  http_response_code(400);//Bad Request
  header("Content-Type: application/json");
  $json_error = array('Error' => "El METODO debe ser DELETE");
  echo json_encode($json_error);

}

