<?php

$nota = simplexml_load_file('nota.xml');

if (is_object($nota)) {

  echo "<h1>Notas</h1>";
  echo "<h2>Titulo: ".$nota->titulo."</h2>";
  echo "<h2>Mensaje: ".$nota->mensaje."</h2>";
  echo "<h2>Nombre de usuario: ".$nota->nombre_usuario."</h2>";
  echo "<h2>Fecha: ".$nota->fecha."</h2>";

} else {
  echo "Error al leer el XML";
}
