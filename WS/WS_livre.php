<?php

class WS_livre extends WS_WebService {
    
    
    public $idLivre;
    public $auteur;
    public $couverture;
    public $description;
    public $editeur;
    public $date;
    public $format;
    public $emplacement;
    

    function __construct() {
        parent::__construct();
    }

    function doPut() {
        
    }

    public function doGet() {
        
        if(!isset($_REQUEST['option'])){
            $query = "SELECT * FROM livre";
        }else{
            $query = "SELECT * FROM livre WHERE idLivre = ".intval($_REQUEST['option']);
        }
        $livres = Array();
        if ($result = $this->mysqli->query($query, MYSQLI_USE_RESULT)) {
            while ($obj = $result->fetch_object()) {
                $livre = new StdClass();
                $livre->idLivre = $obj->idLivre;
                $livre->auteur = $obj->auteur;
                $livre->couverture = $obj->couverture;
                $livre->description = $obj->description;
                $livre->editeur = $obj->editeur;
                $livre->description = $obj->description;
                array_push($livres, $livre);
            }
        }
        echo $this->json($livres);
    }

}

?>