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
        $utilisateur = $_SESSION['utilisateur'];
        $query = "SELECT * FROM `etat`,`livre` WHERE `livre`.idLivre = `etat`.idLivre AND `etat`.idUser =".$utilisateur->idUser;
        $livres = Array();
        if ($result = $this->mysqli->query($query, MYSQLI_USE_RESULT)) {
            while ($obj = $result->fetch_object()) {
                if($obj->time != 0 || $obj->note != null){
                    $livre = new stdClass();
                    $livre->idLivre = $obj->idLivre ;
                    $livre->titre = $obj->titre ;
                    $livre->auteur = $obj->auteur ;
                    $livre->couverture = $obj->couverture ;
                    $livre->description = $obj->description ;
                    $livre->editeur = $obj->editeur ;
                    $livre->date = $obj->date ;
                    $livre->note = $obj->note ;
                    $livre->etat = $obj->etat ;
                    $livre->time = $obj->time ;
                    array_push($livres,$livre);
                }
            }
            echo json_encode($livres);
        }
    }
    
    public function doLogOut()
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