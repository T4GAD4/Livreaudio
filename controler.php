<?php

include('./WS/WS_WebService.php');
include('./WS/WS_livre.php');
include('./WS/WS_utilisateur.php');



$WS = "WS_".$_GET['action'];

$object = new $WS();
$method = "do".ucfirst($_SERVER['REQUEST_METHOD']);

$object->$method();

?>