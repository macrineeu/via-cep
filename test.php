<?php

require_once 'vendor/autoload.php';


$consulta = new \Macrineeu\ViaCepService\ConsultaCep();
$cep = '00000000'; // CEP de exemplo

$resultado = $consulta->consultarCEP($cep);

print_r($resultado);
die;
