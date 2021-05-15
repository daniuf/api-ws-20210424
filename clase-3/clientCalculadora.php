<?php

define ("WS", "https://ecs.syr.edu/faculty/fawcett/Handouts/cse775/code/calcWebService/Calc.asmx");

$options = array(
		'soap_version' => SOAP_1_1,
		'trace' => true
		);

try {
	$client = new SoapClient(WS."?wsdl", $options);

	/**
	Opcion 1
	$input['a'] = 2;
	$input['b'] = 3;
	$resultado = $client->Add($input);
	**/

	/** 
	 * Opcion 2
	$a = 5;
	$b = 4;
	$resultado = $client->Add(array('a' => $a, 'b' => $b));
	 */

	/** Opcion 3 **/
	$a = "10";
	$b = "10";
	$resultado = $client->__soapCall("Add", array('Add' => array('a' => $a, 'b' => $b)));
	var_dump($resultado);

	echo "-----------------------<br/>";
	echo $client->__getLastRequestHeaders()."<br/>";
	echo $client->__getLastRequest()."<br/>";
	echo $client->__getLastResponseHeaders()."<br/>";
	echo $client->__getLastResponse()."<br/>";

} catch (Exception $e) {

	print "Error: ".$e->getMessage();
}

