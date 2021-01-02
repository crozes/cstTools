<?php
header('Content-type: application/json');

include "/var/www/html/cstTools/Control/licence/functionLicencie.php";
// Takes raw data from the request
$json = file_get_contents('php://input');
//print_r($json);
$data = json_decode($json,true);
echo json_encode(getLincencieById($data['Personne']));
