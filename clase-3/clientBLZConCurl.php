<?php

require_once('function.php');

define ("WS", "http://www.thomas-bayer.com/axis2/services/BLZService");

$blz = "54030011";

$xml = '<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://thomas-bayer.com/blz/"><SOAP-ENV:Body><ns1:getBank><ns1:blz>'.$blz.'</ns1:blz></ns1:getBank></SOAP-ENV:Body></SOAP-ENV:Envelope>';

$headers = array('Content-Type: text/xml; charset=utf-8', 'SOAPAction: ""');

$respuesta = hacer_pegada_curl(WS, "POST", $xml, $headers);

//var_dump($respuesta);

$xml_respuesta = str_replace(array('soapenv:', 'SOAP-ENV:', 'ns1:'), '', $respuesta[0]);

//var_dump($xml_respuesta);

$xml_final = simplexml_load_string($xml_respuesta);
//var_dump($xml_final);

echo $xml_final->Body->getBankResponse->details->bezeichnung;

