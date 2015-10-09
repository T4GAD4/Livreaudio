<?php



class WS_etat extends WS_WebService {
    

    function __construct() {
        parent::__construct();
    }

    function doPost() {
        $utilisateur = $_SESSION['utilisateur'];
        if(isset($_REQUEST['fonction']) && $_REQUEST['fonction'] == "verify"){
            $query = "SELECT * FROM etat WHERE idUser = ".$utilisateur->idUser." AND idLivre = ".$_REQUEST['id'];
            
            if ($result = $this->mysqli->query($query, MYSQLI_USE_RESULT)) {
                while ($obj = $result->fetch_object()) {
                    $etat = new Stdclass();
                    $etat->time = $obj->time;
                    $etat->note = $obj->note;
                    $etat->etat = $obj->etat;
                } 
                echo json_encode($etat);
            }   
        }else if(isset($_REQUEST['fonction']) && $_REQUEST['fonction'] == "notation"){
            $query2 = "UPDATE `etat` SET `note`=".intval($_REQUEST['note'])." WHERE `idUser`= $utilisateur->idUser AND `idLivre`=".$_REQUEST['idLivre'];
            $this->mysqli->query($query2);
        }else{
            $query = "SELECT * FROM etat WHERE idUser = ".$utilisateur->idUser." AND idLivre = ".$_REQUEST['idLivre'];
            $result = $this->mysqli->query($query,MYSQLI_USE_RESULT);

            if(sizeof($result->fetch_object()) != 0){
                //On update
                $query2 = "UPDATE `etat` SET `time`=".intval($_REQUEST['time']).", etat=".intval($_REQUEST['etat'])." WHERE `idUser`= $utilisateur->idUser AND `idLivre`=".$_REQUEST['idLivre'];
            }else{
                //On créé
                $query2 = "INSERT INTO `etat`(`idUser`, `idLivre`, `etat`, `time`) VALUES ($utilisateur->idUser,".$_REQUEST['idLivre'].",".intval($_REQUEST['etat']).",".intval($_REQUEST['time']).")"; 
            }
            mysqli_free_result($result);
            $this->mysqli->query($query2);
        }
    }

    public function doGet() {
               
    }
    
    public function doDelete() {
        
    }

}

?>