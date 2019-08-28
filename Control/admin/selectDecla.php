<?php
    header('Content-type: application/json');

    include '../all/log_db.php';
    try{
        $PDO = new PDO('mysql:host='.$DB_serveur.';dbname='.$DB_base.';charset=utf8',$DB_utilisateur,$DB_motdepasse);
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
        //$PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
        $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }catch(Exception $e){
        die('Erreur  : ' . $e->getMessage());
    }

    $sql="  SELECT h.idHoraire, h.dateHoraire, h.timeHoraire, h.declaHoraire, p.nomPersonne, p.prenomPersonne, t.nomTypeInter, l.nomLieuInter, h.comHoraire
            FROM Horaire h 
            INNER JOIN Personne p ON h.idPersonne = p.idPersonne
            INNER JOIN LieuInter l ON h.idLieuInter = l.idLieuInter
            INNER JOIN TypeInter t ON h.idTypeInter = t.idTypeInter
            ORDER BY declaHoraire DESC;";

    $req = $PDO->prepare($sql);
    $req->execute();
    $data = $req->fetchAll();

    $json  = json_encode($data);

    echo $json;
?>