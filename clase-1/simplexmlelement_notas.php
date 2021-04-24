<?php

$xml = file_get_contents('http://api.daniuf.com.ar/clase-1/notas.xml');
$notas = new simpleXMLElement($xml);

if (is_object($notas)) {

  foreach ($notas->nota as $nota) {
    //echo "<pre>";
    //var_dump($nota);  
    //echo "</pre>";
    echo "<h1>Titulo: ".$nota->titulo."</h1>";
    echo "<p>".$nota->mensaje."</p>";
    echo "<hr/>";
  }
}
