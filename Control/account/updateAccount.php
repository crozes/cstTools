<?php
    function updateAccount($nom,$prenom,$mail){
        global $DB_serveur;
        global $DB_base;
        global $DB_utilisateur;
        global $DB_motdepasse;

        try{
            $PDO = new PDO('mysql:host='.$DB_serveur.';dbname='.$DB_base.';charset=utf8',$DB_utilisateur,$DB_motdepasse);
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);  
            $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }catch(Exception $e){
            die('Erreur  : ' . $e->getMessage());
        }

        $sql_select = ' UPDATE `Personne` 
                        SET `prenomPersonne` = '.$prenom.',
                            `nomPersonne` = '.$nom.',
                            `mailPersonne` = '.$mail.'
                        WHERE `Personne`.`idPersonne` = '.$_SESSION['Auth'][0]->idPersonne;
        
        $req = $PDO->prepare($sql_select);
        $req->execute();
        $data = $req->fetch();

        if($data <= 0){
            return true;
        }
        else{
            return false;
        }
    }
?>