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

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, URL."/posts");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_input);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("'Content-type': 'application/json; charset=UTF-8'"));

$json = curl_exec($ch);
$http_info = curl_getinfo($ch, CURLINFO_HTTP_CODE);

loguear("a+", LOGS."access.log", __FILE__." ".__LINE__." Realizando peticion a ".URL."/posts");

if ($http_info == 201) {

  loguear("a+", LOGS."access.log", __FILE__." ".__LINE__." Resultado peticion ".$http_info);

  if ($json != false) {

    $info = json_decode($json);
    var_dump($info);

  } else {
    echo "Ha ocurrido un error";
  }
} else {
  loguear("a+", LOGS."error.log", __FILE__." ".__LINE__." Ocurrio un error. Status Code: ".$http_info."|Mensaje: ".status_code($http_info));
  echo "Error";
}

