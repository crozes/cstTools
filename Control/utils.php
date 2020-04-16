<?php
function getOptionPays($selected=null) {
    global $PDO;
    $sql_select = 'SELECT idPays, nomFrPays FROM Pays ORDER BY (nomFrPays)';
    $req = $PDO->prepare($sql_select);
    $req->execute();
    $data = $req->fetchAll();
    $option = "<option value='NULL'> Pays de naissance </option>";
    foreach( $data as $element){
        $option .= "<option value='".$element->idPays."'".($selected!=null?($element->idPays==$selected?"selected":""):"").">".$element->nomFrPays."</option>";
    }
    return $option;
}

function getOptionDepartement($selected=null) {
    global $PDO;
    $sql_select = 'SELECT idDepartement, codeDepartement, nomDepartement FROM Departement ORDER BY (codeDepartement)';
    $req = $PDO->prepare($sql_select);
    $req->execute();
    $data = $req->fetchAll();
    $option = "<option value='NULL'> Departement de naissance </option>";
    foreach( $data as $element){
        $option .= "<option value='".$element->idDepartement."'".($selected!=null?($selected==$element->idDepartement?"selected":""):"").">".$element->codeDepartement." - ".$element->nomDepartement."</option>";
    }
    return $option;
}

function getOptionPersonnes($selected=null) {
    global $PDO;
    $sql_select = 'SELECT idPersonne, nomPersonne, prenomPersonne FROM Personne ORDER BY (nomPersonne)';
    $req = $PDO->prepare($sql_select);
    $req->execute();
    $data = $req->fetchAll();
    $option = "<option value='NULL' selected>---</option>";
    foreach( $data as $element ){
        $option .= "<option value='".$element->idPersonne."'>".$element->nomPersonne." ".$element->prenomPersonne."</option>";
    }
    return $option;
}

function majMotDePasse($motdepasse){
    global $PDO;
    $sql_select = 'UPDATE Personne SET mdpPersonne = \''.$motdepasse.'\' WHERE idPersonne='.$_SESSION['Auth'][0]->idPersonne.';';
    error_log($sql_select);
    $req = $PDO->prepare($sql_select);
    return $req->execute();
}