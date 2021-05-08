<?php

/* Cliente que consume API https://estadisticasbcra.com/api/documentacion */

ini_set('date.timezone', 'America/Argentina/Buenos_Aires');
require_once('function.php');

define("URL", "https://api.estadisticasbcra.com");
define("TOKEN", "BEARER eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2NTIwMTczMjIsInR5cGUiOiJleHRlcm5hbCIsInVzZXIiOiJkYW5pdWZAZ21haWwuY29tIn0.-BR2VgcDWlsGbsjQz8gc-ha8m0I6KSbV7zDj8mKSdguMkRllGaihcWaR3ddMAV2dmsqJff9EyMcHKZAMxpVswg");
define("LOGS", "logs/");

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, URL."/usd_of");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: '.TOKEN));

$json = curl_exec($ch);
$http_info = curl_getinfo($ch, CURLINFO_HTTP_CODE);

loguear("a+", LOGS."access.log", __FILE__." ".__LINE__." Realizando peticion a ".URL."/usd_of");

if ($http_info == 200) {

  loguear("a+", LOGS."access.log", __FILE__." ".__LINE__." Resultado peticion ".$http_info);

  if ($json != false) {

    $info = json_decode($json);

    for ($i = 0; $i < count($info); $i++) {

      echo "La cotizacion del ".$info[$i]->d." fue es ".$info[$i]->v."<br/>";
    }
  } else {
    echo "Ha ocurrido un error";
  }
} else {
  loguear("a+", LOGS."error.log", __FILE__." ".__LINE__." Ocurrio un error. Status Code: ".$http_info."|Mensaje: ".status_code($http_info));
  echo "Error";
}

function status_code($code) {
  
  $mensaje = "";

  switch ($code) {
    case 403:
      $mensaje = "Forbidden";
      break;
  }

  return $mensaje;
}

