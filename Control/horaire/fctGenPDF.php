<?php
    function getFullHours(){
        global $month;
        global $year;
        include '../all/log_db.php';
        try{
            $PDO = new PDO('mysql:host='.$DB_serveur.';dbname='.$DB_base.';charset=utf8',$DB_utilisateur,$DB_motdepasse);
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
            //$PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
            $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }catch(Exception $e){
            die('Erreur  : ' . $e->getMessage());
        }

        $sql="  SELECT h.idHoraire, h.dateHoraire, h.timeHoraire, h.comHoraire, li.nomLieuInter, ti.nomTypeInter 
                FROM Horaire h 
                INNER JOIN LieuInter li ON h.idLieuInter = li.idLieuInter 
                INNER JOIN TypeInter ti ON h.idTypeInter = ti.idTypeInter 
                WHERE `dateHoraire` >= '".$year."-".$month."-00 00:00:00' 
                AND `dateHoraire` <='".$year."-".$month."-31 23:59:59' 
                AND `idPersonne` = ".$_SESSION['Auth'][0]->idPersonne." ORDER BY dateHoraire;";
        $req = $PDO->prepare($sql);
        $req->execute();
        $data = $req->fetchAll();

        return $data;
    }

    function getTotalHour(){
        global $month;
        global $year;
        include '../all/log_db.php';
        try{
            $PDO = new PDO('mysql:host='.$DB_serveur.';dbname='.$DB_base.';charset=utf8',$DB_utilisateur,$DB_motdepasse);
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
            //$PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
            $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }catch(Exception $e){
            die('Erreur  : ' . $e->getMessage());
        }

        $sql = "    SELECT  SEC_TO_TIME( SUM( TIME_TO_SEC( `timeHoraire` ) ) ) AS timeSum  
                    FROM Horaire 
                    WHERE idPersonne = ".$_SESSION['Auth'][0]->idPersonne." 
                    AND `dateHoraire` >= '".$year."-".$month."-00 00:00:00'  
                    AND `dateHoraire` <='".$year."-".$month."-31 23:59:59'";
        $req = $PDO->prepare($sql);
        $req->execute();
        $data = $req->fetch();
        
        return $data;
    }

    function getTotalHourFormation(){
        global $month;
        global $year;
        include '../all/log_db.php';
        try{
            $PDO = new PDO('mysql:host='.$DB_serveur.';dbname='.$DB_base.';charset=utf8',$DB_utilisateur,$DB_motdepasse);
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
            //$PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
            $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }catch(Exception $e){
            die('Erreur  : ' . $e->getMessage());
        }

        $sql = "    SELECT SEC_TO_TIME( SUM( TIME_TO_SEC( h.timeHoraire ) ) ) AS timeSum  
                    FROM Horaire h INNER JOIN TypeInter t ON h.idTypeInter = t.idTypeInter 
                    WHERE idPersonne = ".$_SESSION['Auth'][0]->idPersonne." 
                    AND h.dateHoraire >= '".$year."-".$month."-00 00:00:00'  
                    AND h.dateHoraire <='".$year."-".$month."-31 23:59:59'
                    AND t.nomTypeInter REGEXP 'Formation.*'";
        $req = $PDO->prepare($sql);
        $req->execute();
        $data = $req->fetch();

        return $data;
    }

    function getTotalHourSportif(){
        global $month;
        global $year;
        include '../all/log_db.php';
        try{
            $PDO = new PDO('mysql:host='.$DB_serveur.';dbname='.$DB_base.';charset=utf8',$DB_utilisateur,$DB_motdepasse);
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
            //$PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
            $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }catch(Exception $e){
            die('Erreur  : ' . $e->getMessage());
        }

        $sql = "    SELECT SEC_TO_TIME( SUM( TIME_TO_SEC( h.timeHoraire ) ) ) AS timeSum  
                    FROM Horaire h INNER JOIN TypeInter t ON h.idTypeInter = t.idTypeInter 
                    WHERE idPersonne = ".$_SESSION['Auth'][0]->idPersonne." 
                    AND h.dateHoraire >= '".$year."-".$month."-00 00:00:00'  
                    AND h.dateHoraire <='".$year."-".$month."-31 23:59:59'
                    AND t.nomTypeInter REGEXP 'Sportif.*'";
        $req = $PDO->prepare($sql);
        $req->execute();
        $data = $req->fetch();

        return $data;
    }

    function getTotalHourAutre(){
        global $month;
        global $year;
        include '../all/log_db.php';
        try{
            $PDO = new PDO('mysql:host='.$DB_serveur.';dbname='.$DB_base.';charset=utf8',$DB_utilisateur,$DB_motdepasse);
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
            //$PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
            $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }catch(Exception $e){
            die('Erreur  : ' . $e->getMessage());
        }

        $sql = "    SELECT SEC_TO_TIME( SUM( TIME_TO_SEC( h.timeHoraire ) ) ) AS timeSum  
                    FROM Horaire h INNER JOIN TypeInter t ON h.idTypeInter = t.idTypeInter 
                    WHERE idPersonne = ".$_SESSION['Auth'][0]->idPersonne." 
                    AND h.dateHoraire >= '".$year."-".$month."-00 00:00:00'  
                    AND h.dateHoraire <='".$year."-".$month."-31 23:59:59'
                    AND NOT t.nomTypeInter REGEXP 'Sportif.*'
                    AND NOT t.nomTypeInter REGEXP 'Formation.*'";
        $req = $PDO->prepare($sql);
        $req->execute();
        $data = $req->fetch();

        return $data;
    }


    class PDF extends tFPDF
    {
        // En-tête
        function Header()
        {
            // Logo
            $this->Image('../../img/logotrans.png',10,6,30);
            // Police Arial gras 15
            $this->SetFont('RobotoTitre','',25);
            // Décalage à droite
            $this->Cell(30);
            // Titre
            $this->Cell(0,20,'Club de Sauvetage Toulousain',0,1,'C');
            // Saut de ligne
            $this->Ln(10);
        }

        // Pied de page
        function Footer()
        {
            // Positionnement à 1,5 cm du bas
            $this->SetY(-25);
            // Police Arial italique 8
            // Numéro de page
            $this->SetFont('RobotoReg','',10);
            $this->Cell(18,5,'Généré le : ',0,0);
            $this->SetFont('Roboto-Black','',12);
            $this->Cell(20,5,date('d-m-Y'),0,1);
            $this->SetFont('RobotoItal','',12);
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }

        //Table
        function FancyTable($header, $data)
        {
            // Couleurs, épaisseur du trait et police grasse
            $this->SetFillColor(210,26,40);
            $this->SetTextColor(255);
            $this->SetDrawColor(128,0,0);
            $this->SetLineWidth(.3);
            // En-tête
            $w = array(20, 40, 22, 40, 68);
            for($i=0;$i<count($header);$i++)
                $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
            $this->Ln();
            // Restauration des couleurs et de la police
            $this->SetFillColor(224,235,255);
            $this->SetTextColor(0);
            $this->SetFont('');
            // Données
            $fill = false;
            foreach($data as $row)
            {
                $this->SetFont('RobotoReg','',8);
                $this->Cell($w[0],6,date("d/m/Y", strtotime($row['dateHoraire'])),'LR',0,'C',$fill);
                $this->SetFont('RobotoReg','',8);
                $this->Cell($w[1],6,$row['nomLieuInter'],'LR',0,'C',$fill);
                $this->SetFont('RobotoReg','',8);
                $this->Cell($w[2],6,substr($row['timeHoraire'],0,5),'LR',0,'C',$fill);
                $this->SetFont('RobotoReg','',7);
                $this->Cell($w[3],6,$row['nomTypeInter'],'LR',0,'C',$fill);
                $this->SetFont('RobotoReg','',7);
                $this->Cell($w[4],6,$row['comHoraire'],'LR',0,'L',$fill);
                $this->Ln();
                $fill = !$fill;
            }
            // Trait de terminaison
            $this->Cell(array_sum($w),0,'','T');
        }
    }

    function getFraMonth($monthToTranslate){
        $newMonth = "";
        if($monthToTranslate == "January"){
            $newMonth = "Janvier";
        }
        else if($monthToTranslate == "February"){
            $newMonth = "Fevrier";
        }
        else if($monthToTranslate == "March"){
            $newMonth = "Mars";
        }
        else if($monthToTranslate == "April"){
            $newMonth = "Avril";
        }
        else if($monthToTranslate == "May"){
            $newMonth = "Mai";
        }
        else if($monthToTranslate == "June"){
            $newMonth = "Juin";
        }
        else if($monthToTranslate == "July"){
            $newMonth = "Juillet";
        }
        else if($monthToTranslate == "August"){
            $newMonth = "Août";
        }
        else if($monthToTranslate == "September"){
            $newMonth = "Septembre";
        }
        else if($monthToTranslate == "October"){
            $newMonth = "Octobre";
        }
        else if($monthToTranslate == "November"){
            $newMonth = "Novembre";
        }
        else if($monthToTranslate == "December"){
            $newMonth = "Decembre";
        }
        else{
            $newMonth = "POUET";
        }
        return $newMonth;
    }

    function formatHoraire($time){
        $result = '';
        if($time == null){
            $result = "---";
        }
        else{
            $result = substr($time,0,5);
        }
        return $result;
    }

    function formatHoraireTotal($time){
        $result = '';
        if($time == null){
            $result = "---";
        }
        else{
            $result = substr($time,0,5);
            $result = str_replace(":","h ",$result);
            $result = $result."min";
        }
        return $result;
    }


    ?>