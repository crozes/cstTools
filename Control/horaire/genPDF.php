<?php
    require('../tfpdf/tfpdf.php');
    session_start();
    $nom = $_SESSION['Auth'][0]->nomPersonne;
    $prenom = $_SESSION['Auth'][0]->prenomPersonne;

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
    $header = array('Date', 'Lieu d\'intervention', 'Horaires', 'Type d\'intervention','Commentaires');
    $pdf->FancyTable($header,getFullHours());
    $pdf->Ln(6);
    $pdf->SetFont('RobotoReg','',12);
    $pdf->Cell(55,8,'Totales d\'heures travaillées : ',0,0);
    $pdf->SetFont('RobotoTitre','',14);
    $getTotalHour = getTotalHour();
    $pdf->Cell(15,8,substr($getTotalHour['timeSum'],0,5),1,1,'C');
    $pdf->SetY(-30);
    $pdf->SetFont('RobotoItal','',8);
    $pdf->Cell(0,0,'En envoyant la présente déclaration horaire, je m’engage à :',0,0);
    $pdf->Output();
    //$pdf->Output("declaHoraire".$month.$year);
?>