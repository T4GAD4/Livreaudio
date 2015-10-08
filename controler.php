<?php

<<<<<<< HEAD
//création des options du header
$opts = array(
           'http'=>array(
                   'method'=>'GET',
                   'header'=>'Content-type: application/x-www-form-urlencoded'
                )
);
=======
include('./WS/WS_WebService.php');
include('./WS/WS_livre.php');
include('./WS/WS_utilisateur.php');
>>>>>>> origin/master

//Déclaration du header
$context = stream_context_create($opts);

//Appel au WebService
$result = file_get_contents('http://localhost/EPSI/livreaudio/WS/WS_'.$_GET['action'].'.php',false,$context);

<<<<<<< HEAD
echo $result;
=======
$WS = "WS_".$_GET['action'];

$object = new $WS();
$method = "do".ucfirst($_SERVER['REQUEST_METHOD']);

$object->$method();
>>>>>>> origin/master

?>