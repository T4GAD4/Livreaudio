<?php
 
class WS_WebService
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "livreaudio";
    protected $mysqli;
    
    function __construct() {
        
        $this->mysqli = new mysqli($this->host, $this->user, $this->password, $this->database);
        
        if ($this->mysqli->connect_error) {
            die('Erreur de connexion (' . $this->mysqli->connect_errno . ') '. $this->mysqli->connect_error);
        }

    }
     
    private function doGet($id){
        if($this->get_request_method() != "GET"){ $this->response('',406); }
    }
     
    private function doPost(){
        if($this->get_request_method() != "POST"){ $this->response('',406); }
    }
     
    private function doPut(){
        if($this->get_request_method() != "PUT"){ $this->response('',406); }
    }
     
    private function doDelete(){
        if($this->get_request_method() != "DELETE"){ $this->response('',406); }
    }
    
    private function json($data){
        if(is_array($data)){
          return json_encode($data);
        }
     }
    
}
?>