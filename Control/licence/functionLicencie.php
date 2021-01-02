<?php
include '/var/www/html/cstTools/Control/all/log_db.php';
$PDO = null;
try{
    $PDO = new PDO('mysql:host='.$DB_serveur.';dbname='.$DB_base.';charset=utf8',$DB_utilisateur,$DB_motdepasse);
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
    //$PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
    $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}catch(Exception $e){
    die('Erreur  : ' . $e->getMessage());
}

function addLicencie($licencie){
    global $PDO;
    $sql = "INSERT INTO `Licencie` (`LicencieId`, `Saison`, `Departement`, `Club`, `NumeroDeLicence`, `Nom`, `Prenom`, `Nationalite`, `DateDeNaissance`, `LieuDeNaissance`, `DepartementDeNaissance`, `Sexe`, `Adresse`, `CodePostal`, `Ville`, `Pays`, `Telephone`, `Portable`, `Email`, `TypeDeLicence`, `Newsletter`, `Secouriste`, `Sauveteur`, `Operationnel`, `Statut`, `Commande`, `CoffreFort`, `CoffreFortActif`, `Commentaire`) 
    VALUES (NULL, '$licencie->Saison', '$licencie->Departement', '$licencie->Club', '$licencie->NumeroDeLicence', '$licencie->Nom', '$licencie->Prenom', '$licencie->Nationalite', '$licencie->DateDeNaissance', '$licencie->LieuDeNaissance', '$licencie->DepartementDeNaissance', '$licencie->Sexe', '$licencie->Adresse', '$licencie->CodePostal', '$licencie->Ville', '$licencie->Pays', '$licencie->Telephone', '$licencie->Portable', '$licencie->Email', '$licencie->TypeDeLicence', '$licencie->Newsletter', '$licencie->Secouriste', '$licencie->Sauveteur', '$licencie->Operationnel', '$licencie->Statut', '$licencie->Commande', '$licencie->CoffreFort', '$licencie->CoffreFortActif', '$licencie->Commentaire')";
    echo $sql;
    $req = $PDO->prepare($sql);
    return $req->execute();
}

function existInDb($licencie){
    global $PDO;
    $sql = "SELECT *
            FROM Licencie l 
            WHERE l.Nom LIKE '$licencie->Nom'
            AND l.Prenom LIKE '$licencie->Prenom'
            AND l.DateDeNaissance = '$licencie->DateDeNaissance'";
    
    echo "SQL : ".$sql.'<br>';

    $req = $PDO->prepare($sql);
    $req->execute();
    $data = $req->fetch();

    return $data;
}

function getLicencies(){
    global $PDO;
    $sql = "SELECT *
            FROM Licencie l
            ORDER BY l.Nom";
    $req = $PDO->prepare($sql);
    $req->execute();
    return $req->fetchAll();
}

function getLincencieById($id)
{
    global $PDO;
    $sql = "SELECT *
            FROM Licencie l
            WHERE l.LicencieId = $id";
    //echo "SQL : ".$sql;
    $req = $PDO->prepare($sql);
    $req->execute();
    return $req->fetch();
}

function getNbrLicencie()
{
    global $PDO;
    $sql = "SELECT COUNT(Nom) As NbrLicencie
            FROM Licencie l";
    //echo "SQL : ".$sql;
    $req = $PDO->prepare($sql);
    $req->execute();
    $data = $req->fetch(); 
    return $data["NbrLicencie"];
}