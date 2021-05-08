<?php

ini_set('date.timezone', 'America/Argentina/Buenos_Aires');
require_once('function.php');

define("URL", "https://jsonplaceholder.typicode.com");
define("LOGS", "logs/");

$json = array('title' => "Probando desde el curso API WS",
	      'body' => "Prueba",
	      'userId' => 1000
		);

$json_input = json_encode($json);

$header = array("'Content-type': 'application/json; charset=UTF-8'");

$resultado = hacer_pegada_curl(URL."/posts", "POST", $json_input, $header);

loguear("a+", LOGS."access.log", __FILE__." ".__LINE__." Realizando peticion a ".URL."/posts");

if ($resultado[1] == 201) {

  loguear("a+", LOGS."access.log", __FILE__." ".__LINE__." Resultado peticion ".$resultado[1]);

  if ($resultado[0] != false) {

    $info = json_decode($resultado[0]);
    var_dump($info);

  } else {
    echo "Ha ocurrido un error";
  }
} else {
  loguear("a+", LOGS."error.log", __FILE__." ".__LINE__." Ocurrio un error. Status Code: ".$resultado[1]."|Mensaje: ".status_code($resultado[1]));
  echo "Error";
}

