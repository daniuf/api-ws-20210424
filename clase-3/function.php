<?php

function hacer_pegada_curl($url, $metodo, $input = '', $header = '') {

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $metodo);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  if ($input != '') {
    curl_setopt($ch, CURLOPT_POSTFIELDS, $input);
  }

  if ($header != '') {
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
  }

  $resultado = curl_exec($ch);
  $http_status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

  return array($resultado, $http_status_code);
}

function loguear($modo, $nombre_archivo, $mensaje) {

  $date = new DateTime();
  $format_date = $date->format("Y-m-d H:i:s");

  $fp = fopen($nombre_archivo, $modo);
  fwrite($fp, "[".$format_date."]".$mensaje.PHP_EOL);
  fclose($fp);
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

