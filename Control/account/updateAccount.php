<?php
    function updateAccount($array){
        global $DB_serveur;
        global $DB_base;
        global $DB_utilisateur;
        global $DB_motdepasse;
        global $Auth;

        try{
            $PDO = new PDO('mysql:host='.$DB_serveur.';dbname='.$DB_base.';charset=utf8',$DB_utilisateur,$DB_motdepasse);
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);  
            $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }catch(Exception $e){
            die('Erreur  : ' . $e->getMessage());
        }

        $sql_select = ' UPDATE `Personne` 
                        SET `prenomPersonne` = :prenom,
                            `nomPersonne` = :nom,
                            `mailPersonne` = :email,
                            `dateNaissancePersonne` = :dateNaissance,
                            `villeNaissancePersonne` = :villeNaissance,
                            `adressePersonne` = :adresse,
                            `adresseSuitePersonne` = :adresse2,
                            `codePostalPersonne` = :codePostal,
                            `villePersonne` = :ville,
                            `nniPersonne` = :nni,
                            `idDepartement` = :departement,
                            `idPays` = :pays,
                            `sexePersonne` = :sexe
                        WHERE `Personne`.`idPersonne` = :idPersonne';
        
        $arrayToExec = [
            ':nom' => $array['nom'],
            ':prenom' => $array['prenom'],
            ':email' => $array['email'],
            ':dateNaissance' => ($array['dateNaissance']==""?null:$array['dateNaissance']),
            ':villeNaissance' => ($array['villeNaissance']==""?null:$array['villeNaissance']),
            ':adresse' => ($array['adresse']==""?NULL:$array['adresse']),
            ':adresse2' => ($array['adresse2']==""?NULL:$array['adresse2']),
            ':codePostal' => ($array['codePostal']==""?NULL:$array['codePostal']),
            ':ville' => ($array['ville']==""?NULL:$array['ville']),
            ':nni' => ($array['nni']==""?NULL:$array['nni']),
            ':departement' => ($array['departement']=="NULL"?NULL:$array['departement']),
            ':pays' => ($array['pays']=="NULL"?NULL:$array['pays']),
            ':idPersonne' => $_SESSION['Auth'][0]->idPersonne,
            ':sexe' => ($array['sexe']==""?NULL:$array['sexe']),
        ];


        $req = $PDO->prepare($sql_select);
        $result = $req->execute($arrayToExec);

        if($result){
            $_SESSION['Auth'][0]->nomPersonne = $array['nom'];
            $_SESSION['Auth'][0]->prenomnomPersonne = $array['prenom'];
            $_SESSION['Auth'][0]->mailPersonne = $array['email'];
            $_SESSION['Auth'][0]->dateNaissancePersonne = $array['dateNaissance'];
            $_SESSION['Auth'][0]->villeNaissancePersonne = $array['villeNaissance'];
            $_SESSION['Auth'][0]->adressePersonne = $array['adresse'];
            $_SESSION['Auth'][0]->adresseSuitePersonne = $array['adresse2'];
            $_SESSION['Auth'][0]->codePostalPersonne = $array['codePostal'];
            $_SESSION['Auth'][0]->villePersonne = $array['ville'];
            $_SESSION['Auth'][0]->nniPersonne = $array['nni'];
            $_SESSION['Auth'][0]->idDepartement = $array['departement'];
            $_SESSION['Auth'][0]->idPays = $array['pays'];
            $_SESSION['Auth'][0]->sexePersonne = $array['sexe'];
            return true;
        }
        else{
            return false;
        }
    }
?>