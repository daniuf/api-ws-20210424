<?php

$xml = new simpleXMLElement("<libros></libros>");

$libro = $xml->addChild('libro');
$libro->addChild('titulo', "Harry Potter");
$libro->addAttribute('isbn', "1234567890");
$libro->addAttribute('disponible_arg', "Si");
$libro->addChild('autor', "Rowling");
$libro->addChild('anio_publicacion', "2009");
$libro->addChild('imagen_portada', "harry1.jpg");

$libro = $xml->addChild('libro');
$libro->addChild('titulo', "Harry Potter 2");
$libro->addAttribute('isbn', "");
$libro->addAttribute('disponible_arg', "No");
$libro->addChild('autor', "Rowling");
$libro->addChild('anio_publicacion', "2012");
$libro->addChild('imagen_portada', "harry2.jpg");

header("Content-Type: text/xml");
echo $xml->asXML();
