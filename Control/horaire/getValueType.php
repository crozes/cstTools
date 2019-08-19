<?php
    function getValueType(){
        include 'Control/all/log_db.php';

        try{
            $PDO = new PDO('mysql:host='.$DB_serveur.';dbname='.$DB_base.';charset=utf8',$DB_utilisateur,$DB_motdepasse);
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
            //$PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
            $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }catch(Exception $e){
            die('Erreur  : ' . $e->getMessage());
        }

        $sql="  SELECT ti.idTypeInter, ti.nomTypeInter
        FROM TypeInter ti
        ORDER BY ti.nomTypeInter;";

        $req = $PDO->prepare($sql); 
        $req->execute();
        $data = $req->fetchAll();

        $dataHtml = '';

        foreach ($data as $option){
            $dataHtml = $dataHtml.'<option value="'.$option['idTypeInter'].'">'.$option['nomTypeInter'].'</option>'; 
        }        

        return $dataHtml;
    }
?>