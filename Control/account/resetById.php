<?php

function getMailById($uuid){
    global $PDO;
    $sql_select = 'SELECT mailRezMdp FROM RezMdp WHERE uuidRezMdp = '.$uuid.';';
    error_log($sql_select);
    $req = $PDO->prepare($sql_select);
    $req->execute();
    $data = $req->fetchAll();
    if(empty($data)) {
        return null;
    }
    else {
        return $data[0]->mailRezMdp;
    }
}