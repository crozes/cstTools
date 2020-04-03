<?php
function getOptionPays(){
    global $PDO;
    $sql_select = 'SELECT * FROM Pays';
    $req = $PDO->prepare($sql_select);
    $req->execute();
    $data = $req->fetchAll();
    $option = "";
    foreach( $data as $element){
        $option .= "<option value='".$element->idPays."'".($element->nomFrançaisPays == "France"?"selected":"").">".$element->nomFrançaisPays."</option>";
    }
    return $option;
}

function getOptionDepartement(){
    global $PDO;
    $sql_select = 'SELECT * FROM Departement';
    $req = $PDO->prepare($sql_select);
    $req->execute();
    $data = $req->fetchAll();
    $option = "";
    foreach( $data as $element){
        $option .= "<option value='".$element->idDepartement."'>".$element->codeDepartement." - ".$element->nomDepartement."</option>";
    }
    return $option;
}