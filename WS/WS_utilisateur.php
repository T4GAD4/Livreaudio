<?php
include('WS_WebService.php');
 
class WS_utilisateur extends WS_WebService
{
    
    function __construct()
    {
        parent::__construct();
    }
 
    public function doPut()
    {
        var_dump($mysqli);
    }
    
    
    
}

$utilisateur = new WS_utilisateur();

?>