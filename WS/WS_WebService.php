<?php
 
class WS_WebService
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "livreaudio";
    private $mysqli;
    
    function __construct() {
        
        $this->mysqli = new mysqli($this->host, $this->user, $this->password, $this->database);
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion (' . $this->mysqli->connect_errno . ') '. $this->mysqli->connect_error);
        }

    }
     
    private function doGet(){
        if($this->get_request_method() != "GET"){ $this->response('',406); }
        return false;
    }
     
    private function doPost(){
        if($this->get_request_method() != "POST"){ $this->response('',406); }
        return false;
    }
     
    private function doPut(){
        if($this->get_request_method() != "PUT"){ $this->response('',406); }
        return false;
    }
     
    private function doDelete(){
        if($this->get_request_method() != "DELETE"){ $this->response('',406); }
        return false;
    }
    
    private function json($data){
        if(is_array($data)){
          return json_encode($data);
        }
     }
    
}
?>