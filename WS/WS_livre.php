<?php

include('WS_WebService.php');

class WS_livre extends WS_WebService {

    function __construct() {
        parent::__construct();
    }

    function doPut() {
        
    }

    public function doGet($id = 0) {
        
        if($id == 0){        
            $query = "SELECT * FROM livre";
        }else{
            $query = "SELECT * FROM livre WHERE id = ".$id;
        }
        
        if ($result = $this->mysqli->query($query, MYSQLI_USE_RESULT)) {
            $livres = Array();
            while ($obj = $result->fetch_object()) {
                $livre = new StdClass();
                $livre->titre = $obj->titre;
                array_push($livres, $livre);
            }
        }
        $this->response($this->json($livres), 200);
    }

}

?>