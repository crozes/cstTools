<?php
    header('Content-type: application/json');

    if(isset($_POST)){
        $data = json_decode(file_get_contents('php://input'), true);
        
        include '../all/log_db.php';
        try{
            $PDO = new PDO('mysql:host='.$DB_serveur.';dbname='.$DB_base.';charset=utf8',$DB_utilisateur,$DB_motdepasse);
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
            //$PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
            $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }catch(Exception $e){
            die('Erreur  : ' . $e->getMessage());
        }


        $sql="  DELETE FROM `LieuInter` WHERE `LieuInter`.`idLieuInter` = ".$data['idToDelete'].";";

        $req = $PDO->prepare($sql);
        $req->execute();
        $data = $req->fetch();

        if($data == false){
            $data = '{"status" : "OK" , "msg" : "lieux supprimé"}';
        }
        else{
            $data = '{"status" : "KO" , "msg" : "Erreur contacter admin"}';
        }

        $json  = json_encode($data);

        echo $json;
    }
?>