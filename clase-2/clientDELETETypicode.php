<?php

ini_set('date.timezone', 'America/Argentina/Buenos_Aires');
require_once('function.php');

define("URL", "https://jsonplaceholder.typicode.com");
define("LOGS", "logs/");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, URL."/posts/1");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

$json = curl_exec($ch);
$http_info = curl_getinfo($ch, CURLINFO_HTTP_CODE);

loguear("a+", LOGS."access.log", __FILE__." ".__LINE__." Realizando peticion a ".URL."/posts/1");

if ($http_info == 200) {

  loguear("a+", LOGS."access.log", __FILE__." ".__LINE__." Resultado peticion ".$http_info);

  echo "Recurso borrado exitosamente";

} else {
  loguear("a+", LOGS."error.log", __FILE__." ".__LINE__." Ocurrio un error. Status Code: ".$http_info."|Mensaje: ".status_code($http_info));
  echo "Error";
}

