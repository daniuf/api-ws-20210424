<?php

$xml = file_get_contents('http://api.daniuf.com.ar/clase-1/nota.xml');
$notas = new simpleXMLElement($xml);

if (is_object($notas)) {

//echo "<pre>";
//var_dump($notas);
//echo "</pre>";

//Aqui decido que voy a hacer con los datos (informacion)
// 1. Mostrar en pantalla
// 2. Guardar en DB
// 3. Transformar en JSON
// 4. ...etc
  echo "<p>Titulo: ".$notas->titulo."</p>";
}
