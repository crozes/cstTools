<?php
    session_start();

    if( isset($_SESSION['Auth']) ){
        require('../tfpdf/tfpdf.php');
        $nom = $_SESSION['Auth'][0]->nomPersonne;
        $prenom = $_SESSION['Auth'][0]->prenomPersonne;
        
        $nbrEntrainement = 0;
        $nbrAutre = 0;

        $wHeuresTotal = 55;
        $hHeuresTotal = 8;

        $wHeures = 20;
        $hHeures = $hHeuresTotal;

        $sFontHeuresTotal = 10;

        if(isset($_GET)){
            $month = $_GET["month"];
            $year = $_GET["year"];
        }

        require('./fctGenPDF.php');

        // Instanciation de la classe dérivée
        $pdf = new PDF();
        $pdf->AddFont('RobotoReg','','Roboto-Light.ttf',true);
        $pdf->AddFont('Roboto-Black','','Roboto-BoldItalic.ttf',true);
        $pdf->AddFont('RobotoTitre','','Roboto-Bold.ttf',true);
        $pdf->AddFont('RobotoItal','','Roboto-LightItalic.ttf',true);
        $pdf->AliasNbPages(); 
        $pdf->AddPage();
        $pdf->SetFont('RobotoReg','',18);
        setlocale(LC_TIME, "fr_FR");
        $pdf->Cell(0,0,'Déclaration Horaire de ',0,1,'C');
        $pdf->Ln(8);
        $pdf->SetFont('Roboto-Black','',20);
        $pdf->Cell(0,0,getFraMonth(strftime("%B", strtotime($month."/".$month."/".$year))).' '.$year,0,1,'C');
        $pdf->Ln(10);
        $pdf->SetFont('RobotoReg','',12);
        $pdf->Cell(20,0,'Nom : ',0,0);
        $pdf->SetFont('RobotoTitre','',14);
        $pdf->Cell(100,0,$nom,0,1);
        $pdf->Ln(6);
        $pdf->SetFont('RobotoReg','',12);
        $pdf->Cell(20,0,'Prenom : ',0,0);
        $pdf->SetFont('RobotoTitre','',14);
        $pdf->Cell(20,0,$prenom,0,1);
        $pdf->SetFont('RobotoReg','',10);
        $pdf->Ln(10);
        $header = array('Date', 'Lieu d\'intervention', 'Nbre Heures', 'Type d\'intervention','Commentaires');
        $pdf->FancyTable($header,getFullHours());
        $pdf->Ln(6);
        $pdf->SetFont('RobotoReg','',$sFontHeuresTotal);
        $pdf->Cell($wHeuresTotal,$hHeuresTotal,'Total d\'heures de formation : ',0,0);
        $pdf->SetFont('RobotoTitre','',$sFontHeuresTotal);
        $getTotalHourFormation = getTotalHourFormation();
        $pdf->Cell($wHeures,$hHeures,formatHoraire($getTotalHourFormation['timeSum']),1,1,'C');
        $pdf->SetFont('RobotoReg','',$sFontHeuresTotal);
        $pdf->Cell($wHeuresTotal,$hHeuresTotal,'Total d\'heures d\'entrainement : ',0,0);
        $pdf->SetFont('RobotoTitre','',$sFontHeuresTotal);
        $getTotalHourSportif = getTotalHourSportif();
        $pdf->Cell($wHeures,$hHeures,formatHoraire($getTotalHourSportif['timeSum']),1,1,'C');
        $pdf->SetFont('RobotoReg','',$sFontHeuresTotal);
        $pdf->Cell($wHeuresTotal,$hHeuresTotal,'Total d\'heures autres : ',0,0);
        $pdf->SetFont('RobotoTitre','',$sFontHeuresTotal);
        $getTotalHourAutre = getTotalHourAutre();
        $pdf->Cell($wHeures,$hHeures,formatHoraire($getTotalHourAutre['timeSum']),1,1,'C');
        $pdf->SetFont('RobotoReg','',$sFontHeuresTotal);
        $pdf->Ln(5);
        $pdf->Cell($wHeuresTotal,$hHeuresTotal,'Total d\'heures travaillées : ',0,0);
        $pdf->SetFont('RobotoTitre','',$sFontHeuresTotal);
        $getTotalHour = getTotalHour();
        $pdf->Cell($wHeures,$hHeures,formatHoraire($getTotalHour['timeSum']),1,1,'C');
        $pdf->SetY(-40);
        $pdf->SetFont('RobotoItal','',8);
        $pdf->Cell(0,0,'En envoyant la présente déclaration horaire, je prend conscience que :',0,1);
        $pdf->Ln(4);
        $pdf->Cell(10,0,'',0,0);
        $pdf->Cell(0,0,'• Seules les dates presentes sur ce document seront prises en compte',0,1);
        $pdf->Ln(4);
        $pdf->Cell(10,0,'',0,0);
        $pdf->Cell(0,0,'• Tout retard de déclaration entrainera un retard de paiment',0,1);
        $pdf->SetX(0);
        $pdf->Output();
        //$pdf->Output("declaHoraire".$month.$year);
    }
    else{
        header("Location:/index.php?page=acceuil");
    }

    
?>