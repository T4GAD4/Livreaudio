<?php

var_dump($_SERVER['REQUEST_METHOD']);

//création des options du header
$opts = array(
           'http'=>array(
                   'method'=>$_SERVER['REQUEST_METHOD'],
                   'header'=>'Content-type: application/x-www-form-urlencoded',
                )
);

//Déclaration du header
$context = stream_context_create($opts);
 
//Appel au WebService
$result = file_get_contents('http://localhost/EPSI/livreaudio/WS/WS_'.$_GET['action'].'.php',false,$context);

echo $result;

?>