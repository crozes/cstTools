<?php
include "cLicencie.php";
include '../all/log_db.php';

$PDO = null;

try{
    $PDO = new PDO('mysql:host='.$DB_serveur.';dbname='.$DB_base.';charset=utf8',$DB_utilisateur,$DB_motdepasse);
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
    //$PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
    $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}catch(Exception $e){
    die('Erreur  : ' . $e->getMessage());
}

date_default_timezone_set('UTC');
require('XLSXReader.php');
$xlsx = new XLSXReader('export-licencies-20201220135547-.xlsx');
$sheetNames = $xlsx->getSheetNames();
$licencieArray = array();
$sheet = $xlsx->getSheet($sheetNames[1]);
$elements = $sheet->getData();
$cpt = 0;
foreach ($elements as $value) 
{
    if($cpt != 0)
        array_push($licencieArray,new Licencie($value));
    $cpt++;
}


foreach ($licencieArray as $value) {
    if (existInDb($value))
{
    echo 'Already Exist<br>';
}
else
{
    echo 'Not Exist -> ';
    if(addLicencie($value))
    {
        echo " - ADDED<br>";
    }
    else
    {
        echo " - FAILED<br>";
    }
}   
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