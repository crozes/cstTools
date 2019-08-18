<?php
    $PDO = null;
    try{
        $PDO = new PDO('mysql:host='.$DB_serveur.';dbname='.$DB_base.';charset=utf8',$DB_utilisateur,$DB_motdepasse);
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
        //$PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
        $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }catch(Exception $e){
        die('Erreur  : ' . $e->getMessage());
    }

    function getNbrUtilisateur(){
        global $PDO;

        $sql=" SELECT COUNT(idPersonne) as nbrUtilisateur FROM Personne; ";

        $req = $PDO->prepare($sql);
        $req->execute();
        $data = $req->fetch();

        return $data["nbrUtilisateur"];
    }

    function getNbrDeclaration(){
        global $PDO;

        $sql=" SELECT COUNT(idHoraire) as nbrHoraire FROM Horaire; ";

        $req = $PDO->prepare($sql);
        $req->execute();
        $data = $req->fetch();

        return $data["nbrHoraire"];
    }

    function getNbrTypeAction(){
        global $PDO;

        $sql=" SELECT COUNT(idTypeInter) as nbrTypeInter FROM TypeInter; ";

        $req = $PDO->prepare($sql);
        $req->execute();
        $data = $req->fetch();

        return $data["nbrTypeInter"];
    }

    function getNbrLieuAction(){
        global $PDO;

        $sql=" SELECT COUNT(idLieuInter) as nbrLieuInter FROM LieuInter; ";

        $req = $PDO->prepare($sql);
        $req->execute();
        $data = $req->fetch();

        return $data["nbrLieuInter"];
    }
?>