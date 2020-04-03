<?php
    include_once 'Control/all/log_db.php';

    function createAccount($nom,$prenom,$mail,$password,$dateNaissance=null,$villeNaissance=null,$departementNaissance=null,$paysNaissance=null,$adresse=null,$adresseSuite=null,$codePostal=null,$ville=null,$nni=null){
        global $DB_serveur;
        global $DB_base;
        global $DB_utilisateur;
        global $DB_motdepasse;

        try{
            $PDO = new PDO('mysql:host='.$DB_serveur.';dbname='.$DB_base.';charset=utf8',$DB_utilisateur,$DB_motdepasse);
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
            //$PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
            $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }catch(Exception $e){
            die('Erreur  : ' . $e->getMessage());
        }

        $sql_select = ' SELECT * 
                        FROM Personne p
                        WHERE p.nomPersonne = "'.$nom.'"
                        AND p.mailPersonne = "'.$mail.'"';
        
        $req = $PDO->prepare($sql_select);
        $req->execute();
        $data = $req->fetchAll();

        $dateActu = date('Y\/m\/d');

        if(count($data)==0){
            $sql_insert = '    INSERT INTO `Personne`
                    VALUES  (NULL, \''.$nom.'\', \''.$prenom.'\', \''.$mail.'\', \''.$password.'\', \'1\', \''.$dateActu.'\', \''.($dateNaissance==''?null:$dateNaissance).'\', \''.ucwords($villeNaissance).'\', \''.ucwords($adresse).'\', \''.ucwords($adresseSuite).'\', \''.$codePostal.'\', \''.ucwords($ville).'\', \''.$nni.'\', \''.$departementNaissance.'\', \''.$paysNaissance.'\');';
                        
            error_log ($sql_insert);
            $req = $PDO->prepare($sql_insert);
            $result = $req->execute();
            $data = $req->fetch();

            if($result){
                return 'OK';
            }
            else{
                return 'Error';
            }
        }
        else{
            return 'Exist';
        }
    }
?>