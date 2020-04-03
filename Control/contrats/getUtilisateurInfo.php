<?php
header('Content-type: application/json');
// Takes raw data from the request
$json = file_get_contents('php://input');
// Converts it into a PHP object
$data = json_decode($json,true);

include '../all/log_db.php';
try{
    $PDO = new PDO('mysql:host='.$DB_serveur.';dbname='.$DB_base.';charset=utf8',$DB_utilisateur,$DB_motdepasse);
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
    //$PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
    $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}catch(Exception $e){
    die('Erreur  : ' . $e->getMessage());
}

$sql = 'SELECT * FROM Personne WHERE idPersonne=:personne';

$array = [
    ':personne' => $data['Personne']
]; 

$req = $PDO->prepare($sql);
$req->execute($array);
$data = $req->fetch();
$json  = json_encode($data);
echo $json;

