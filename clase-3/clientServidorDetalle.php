<?php

$options = array(
		'uri' => SOAP_SERVER,
		'location' => SOAP_SERVER,
		'trace' => true
		);

try {
	$client = new SoapClient("http://www.thomas-bayer.com/axis2/services/BLZService?wsdl", $options);
	$respuesta = $client->__getFunctions();

	var_dump($respuesta);

} catch (Exception $e) {

	print "Error: ".$e->getMessage();
}

