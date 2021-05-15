<?php

define ("SOAP_SERVER", "http://api.daniuf.com.ar/clase-3/servidor.php");

$options = array(
		'uri' => SOAP_SERVER,
		'location' => SOAP_SERVER,
		'trace' => true
		);

try {
	$client = new SoapClient(null, $options);
	//$respuesta = $client->holaMundo();
	$respuesta = $client->holaMundoSaludar("Saludando a todos!");

	echo "El servidor nos dijo: ".$respuesta."<br/>";

	echo "-----------------------<br/>";
	echo $client->__getLastRequestHeaders()."<br/>";
	echo $client->__getLastRequest()."<br/>";
	echo $client->__getLastResponseHeaders()."<br/>";
	echo $client->__getLastResponse()."<br/>";

} catch (Exception $e) {

	print "Error: ".$e->getMessage();
}

