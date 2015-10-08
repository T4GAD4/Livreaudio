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
        
    }
    
    public function doGet($id)
    {
        $query = "SELECT * FROM utilisateur WHERE id = ".$id;
        
        if($result = $this->mysqli->query($query,MYSQLI_USE_RESULT)){
            while($obj = $result->fetch_object()){ 
                var_dump($obj);
            }
        }
    }
    
    
    
}

//$utilisateur = new WS_utilisateur();
//$utilisateur->doGet();



?>