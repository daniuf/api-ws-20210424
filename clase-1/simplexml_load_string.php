<?php

$xml = file_get_contents('http://api.daniuf.com.ar/clase-1/nota.xml');
$nota = simplexml_load_string($xml);

if (is_object($nota)) {

  echo "<pre>";
  var_dump($nota);
  echo "</pre>";

  echo "<h1>Notas</h1>";
  echo "<h3>Titulo: ".$nota->titulo."</h3>";
  echo "<h3>Mensaje: ".$nota->mensaje."</h3>";
  echo "<h3>Fecha: ".$nota->fecha."</h3>";

} else {
  echo "Error al leer el XML";
}
