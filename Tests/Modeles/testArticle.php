<?php

require_once 'Modele/Auto.php';

$tstAuto = new Auto;
$autos = $tstAuto->getAutos();
echo '<h3>Test getAutos : </h3>';
var_dump($autos->rowCount());

echo '<h3>Test getAuto : </h3>';
$auto =  $tstAuto->getAuto(1);
var_dump($auto);