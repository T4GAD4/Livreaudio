<?php
 
class WS_utilisateur extends WS_WebService
{
    
    public $idUtilisateur;
    public $nom;
    public $prenom;
    public $mail;
    public $mdp;
    
    function __construct()
    {
        parent::__construct();
    }
 
    public function doPut()
    {
        
    }

    public function doGet() {
        
        if(!isset($_REQUEST['option'])){
            $query = "SELECT * FROM user";
        }else{
            $query = "SELECT * FROM user WHERE idUtilisateur = ".intval($_REQUEST['option']);
        }
        $utilisateurs = Array();
        if ($result = $this->mysqli->query($query, MYSQLI_USE_RESULT)) {
            while ($obj = $result->fetch_object()) {
                $utilisateur->idUser = $obj->idUser;
                $utilisateur->nom = $obj->nom;
                $utilisateur->prenom = $obj->prenom;
                $utilisateur->mail = $obj->mail;
                $utilisateur->mdp = $obj->mdp;
                array_push($utilisateurs, $this);
            }
        }
        echo $this->json($utilisateurs);
    }
    
    public function doDelete() {
        $query = "DELETE * FROM user WHERE idUtilisateur = ".intval($_REQUEST['option']);
        $this->mysqli->query($query);
    }
     
}
?>