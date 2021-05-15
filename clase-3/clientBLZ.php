<?php

define ("WS", "http://www.thomas-bayer.com/axis2/services/BLZService");

$options = array(
		'soap_version' => SOAP_1_1,
		'trace' => true
		);

try {
	$client = new SoapClient(WS."?wsdl", $options);

	/**
	Opcion 1
	$input['blz'] = "54030011";
	$resultado = $client->getBank($input);
	*/

	/** 
	 * Opcion 2
	 */
	//$resultado = $client->getBank(array('blz' => '54030011'));

	/** Opcion 3 **/
	$resultado = $client->__soapCall("getBank", array('getBank' => array('blz' => "54030011")));
	//$resultado = $client->__soapCall("getBank", array('getBank' => array('blz' => "54030011")));
	//var_dump($resultado);

	echo "<h1>".$resultado->details->bezeichnung."</h1>";
	echo "<p>".$resultado->details->bic."</p>";
	echo "<p>".$resultado->details->ort."</p>";
	echo "<p>".$resultado->details->plz."</p>";

	
	echo "-----------------------<br/>";
	echo $client->__getLastRequestHeaders()."<br/>";
	echo $client->__getLastRequest()."<br/>";
	echo $client->__getLastResponseHeaders()."<br/>";
	echo $client->__getLastResponse()."<br/>";
	

} catch (Exception $e) {

	print "Error: ".$e->getMessage();
}

