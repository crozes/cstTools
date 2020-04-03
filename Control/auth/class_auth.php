<?php 
class Auth{
    function create($d){
        global $PDO;
        $sql = "    INSERT INTO `Personne` (`idPersonne`, `nomPersonne`, `prenomPersonne`, `mailPersonne`, `mdpPersonne`, `idRole`) 
                    VALUES (NULL, :nom, :prenom, :email, :password, '1');";
        $req = $PDO->prepare($sql);
        $req->execute($d);
        //$data = $req->fetchAll();

        if(empty($PDO->errorInfo())){
            //$_SESSION['Auth'] = $data;
            return $PDO->errorInfo();
        }
        else{
            return $PDO->errorInfo();
        }
    }

    function login($d){
        global $PDO;
        $sql = "SELECT p.idPersonne, p.nomPersonne, p.prenomPersonne, p.mailPersonne, p.mdpPersonne, p.dateNaissancePersonne, p.villeNaissancePersonne, p.adressePersonne, p.adresseSuitePersonne, p.codePostalPersonne, p.villePersonne, p.nniPersonne, r.valueRole, r.nomRole, p.idDepartement, p.idPays, p.idRole
                FROM Personne p 
                INNER JOIN Role r ON p.idRole=r.idRole
                WHERE mailPersonne=:email 
                AND mdpPersonne=:password";
        $req = $PDO->prepare($sql);
        $req->execute($d);
        $data = $req->fetchAll();
        
        if(count($data)>0){
            $_SESSION['Auth'] = $data;
            return true;
        }
        else{
            return false;
        }
    }

}

$Auth = new Auth();
?>