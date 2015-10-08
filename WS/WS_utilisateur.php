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
    
<<<<<<< HEAD
    public function doGet($id)
    {
        $query = "SELECT * FROM utilisateur WHERE id = ".$id;
        
        if($result = $this->mysqli->query($query,MYSQLI_USE_RESULT)){
            while($obj = $result->fetch_object()){ 
                var_dump($obj);
            }
        }
=======
    public function doGet() {
        
        if(!isset($_REQUEST['option'])){
            $query = "SELECT * FROM utilisateur";
        }else{
            $query = "SELECT * FROM utilisateur WHERE idUtilisateur = ".intval($_REQUEST['option']);
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
>>>>>>> origin/master
    }
    
    
    
}

<<<<<<< HEAD
//$utilisateur = new WS_utilisateur();
//$utilisateur->doGet();
=======
>>>>>>> origin/master



?>