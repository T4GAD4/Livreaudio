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
        unset($_SESSION['utilisateur']);
        $result = new stdClass();
        $result->page = "login.php";
        
        echo json_encode($result);
    }
 
    public function doPost()
    {
        if($_REQUEST['mail']){
            $query = "SELECT * FROM user WHERE mail = '".$_REQUEST['mail'] ."' AND mdp ='".hash('sha256',$_REQUEST['mdp'])."'";
        }else{
            $query = "SELECT * FROM user WHERE idUser = ".$_REQUEST['id'];
        }
        $utilisateurs = Array();
        if ($result = $this->mysqli->query($query, MYSQLI_USE_RESULT)) {
            while ($obj = $result->fetch_object()) {
                $utilisateur = new stdClass();
                $utilisateur->idUser = $obj->idUser;
                $utilisateur->nom = $obj->nom;
                $utilisateur->prenom = $obj->prenom;
                $utilisateur->mail = $obj->mail;
                $utilisateur->mdp = $obj->mdp;
                array_push($utilisateurs, $utilisateur);
            }
        }
        if($_REQUEST['mail'] && sizeof($utilisateurs) != 0){
            $_SESSION['utilisateur'] = $utilisateur;
        }
        
    }

    public function doGet() {
        $result = new stdClass();
        $result->resultat = false;
        $result->page = "login.php";
        
        if(isset($_SESSION['utilisateur'])){
            $result->resultat = true;
            $result->page = "livre.php";
        }
        
        echo json_encode($result);   
    }
    
    public function doDelete() {
        $query = "DELETE * FROM user WHERE idUtilisateur = ".intval($_REQUEST['option']);
        $this->mysqli->query($query);
    }
     
}
?>