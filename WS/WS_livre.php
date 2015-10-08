<?php



class WS_livre extends WS_WebService {
    
    
    public $idLivre;
    public $auteur;
    public $titre;
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

    function doPost() {
        $query = "SELECT * FROM livre WHERE idLivre = ".intval($_REQUEST['id']);
        $livres = Array();
        if ($result = $this->mysqli->query($query, MYSQLI_USE_RESULT)) {
            while ($obj = $result->fetch_object()) {
                $livre = new StdClass();
                $livre->idLivre = $obj->idLivre;
                $livre->auteur = $obj->auteur;
                $livre->titre = $obj->titre;
                $livre->couverture = $obj->couverture;
                $livre->description = $obj->description;
                $livre->editeur = $obj->editeur;
                $livre->date = $obj->date;
                $livre->description = $obj->description;
                $livre->emplacement = $obj->emplacement;
                array_push($livres, $livre);
            }
        }
        echo $this->json($livres);
    }

    public function doGet() {
        
        $query = "SELECT * FROM livre";
        $livres = Array();
        if ($result = $this->mysqli->query($query, MYSQLI_USE_RESULT)) {
            while ($obj = $result->fetch_object()) {
                $livre = new StdClass();
                $livre->idLivre = $obj->idLivre;
                $livre->auteur = $obj->auteur;
                $livre->titre = $obj->titre;
                $livre->couverture = $obj->couverture;
                $livre->description = $obj->description;
                $livre->editeur = $obj->editeur;
                $livre->date = $obj->date;
                $livre->description = $obj->description;
                array_push($livres, $livre);
            }
        }
        echo $this->json($livres);
    }
    
    public function doDelete() {
        $query = "DELETE * FROM livre WHERE idLivre = ".intval($_REQUEST['option']);
        $this->mysqli->query($query);
    }

}

?>