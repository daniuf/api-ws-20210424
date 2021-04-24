<?php

$URL_WS = 'http://www.geoplugin.net/xml.gp?ip='.$_SERVER['REMOTE_ADDR'];

$xml = file_get_contents($URL_WS);
$geoip = simplexml_load_string($xml);

if (is_object($geoip)) {

  /*
  echo "<pre>";
  var_dump($geoip);
  echo "</pre>";
  */

  echo $geoip->geoplugin_request;
}
