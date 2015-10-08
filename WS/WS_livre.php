<?php

<<<<<<< HEAD
include('WS_WebService.php');

class WS_livre extends WS_WebService {
=======
class WS_livre extends WS_WebService {
    
    
    public $idLivre;
    public $auteur;
    public $couverture;
    public $description;
    public $editeur;
    public $date;
    public $format;
    public $emplacement;
    
>>>>>>> origin/master

    function __construct() {
        parent::__construct();
    }

    function doPut() {
        
    }

<<<<<<< HEAD
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
=======
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
>>>>>>> origin/master
    }

}

?>