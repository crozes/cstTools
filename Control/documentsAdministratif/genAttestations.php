<?php
    require('../tfpdf/tfpdf.php');
    require('./fctAttestations.php');

    session_start();

    if($_SESSION['Auth'][0]->valueRole<3){
        header('Location:?page=accueil');
    }

    $prenom = ucwords( $_GET["prenom"] );
    $nom = strtoupper ( $_GET["nom"] );
    $sexe = $_GET["sexe"];
    $adresse = ucwords( $_GET["adresse"] );
    $adresse2 = ucwords( $_GET["adresse_suite"] );
    $codePostal = $_GET["code_postal"];
    $ville = ucwords( $_GET["ville"] );
    $naissance = $_GET["naissance"] ;
    $villeNaissance = ucwords( $_GET["lieuNaissance"] );
    $departementNaissance = $_GET["departement"];
    $nationalite = $_GET["nationalite"];
    $dateDebut = $_GET["debutContrat"];
    $dateFin = $_GET["finContrat"];
    $moyDep = $_GET["moyDep"];
    $natExe = $_GET["natExe"];
    $lieuExe = $_GET["lieuExe"];

    $president = "Monsieur Jean-Louis IMBERT";


    // Instanciation de la classe dérivée
    setlocale(LC_TIME, "fr_FR");
    $pdf = new PDF();
    $pdf->SetTitle($nom.'_Attestation');
    $pdf->AddFont('RobotoReg','','Roboto-Light.ttf',true);
    $pdf->AddFont('Roboto-Black','','Roboto-BoldItalic.ttf',true);
    $pdf->AddFont('RobotoTitre','','Roboto-Bold.ttf',true);
    $pdf->AddFont('RobotoItal','','Roboto-LightItalic.ttf',true);
    $pdf->AliasNbPages(); 
    $pdf->AddPage();
    $pdf->SetFont('RobotoReg','',18);
    
    // Titres
    $pdf->Cell(0,0,'JUSTIFICATIF DE DÉPLACEMENT PROFESSIONNEL',0,1,'C');
    $pdf->Ln(8);
    $pdf->SetFont('RobotoItal','',12);
    $pdf->Cell(0,6,'En application des mesures générales nécessaires pour faire face à l’épidémie de Covid-19',0,1,'C');
    $pdf->Cell(0,6,'dans le cadre de l’état d’urgence sanitaire.',0,1,'C');
    $pdf->Ln(1);

    // Corp
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(0,10,'Je soussigné,',0,1);
    $pdf->Cell(47,6,'Nom prénom de l’employeur : ',0,0);
    $pdf->SetFont('Roboto-Black','',10);
    $pdf->Cell(0,6,$president,0,1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(18,6,'Fonctions : ',0,0);
    $pdf->SetFont('Roboto-Black','',10);
    $pdf->Cell(16,6,'Président',0,0);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(25,6,'de l\'association ',0,0);
    $pdf->SetFont('Roboto-Black','',10);
    $pdf->Cell(0,6,'CLUB DE SAUVETAGE TOULOUSAIN,',0,1);
    $pdf->Ln(4);

    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(0,6,'certifie que les déplacements de la personne ci-après, entre son domicile et le ou les lieux d’exercice de son activité',0,1);
    $pdf->Cell(0,6,'professionnelle ou à l’occasion de l’exercice de ses fonctions, ne peuvent être différés ou sont indispensables à l’exercice',0,1);
    $pdf->Cell(0,6,'d’activités ne pouvant être organisées sous forme de télétravail :',0,1);
    $pdf->Ln(4);

    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(10,6,'Nom : ',0,0);
    $pdf->SetFont('Roboto-Black','',10);
    $pdf->Cell(0,6,$nom,0,1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(15,6,'Prenom : ',0,0);
    $pdf->SetFont('Roboto-Black','',10);
    $pdf->Cell(0,6,$prenom,0,1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(31,6,'Date de naissance : ',0,0);
    $pdf->SetFont('Roboto-Black','',10);
    $date = new DateTime($naissance);
    $pdf->Cell(0,6,date_format($date,'d/m/Y'),0,1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(30,6,'Lieu de naissance : ',0,0);
    $pdf->SetFont('Roboto-Black','',10);
    $pdf->Cell(0,6,$villeNaissance,0,1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(34,6,'Adresse du domicile : ',0,0);
    $pdf->SetFont('Roboto-Black','',10);
    $pdf->Cell(0,6,$adresse.", ".$codePostal." ".$ville,0,1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(56,6,'Nature de l’activité professionnelle : ',0,0);
    $pdf->SetFont('Roboto-Black','',10);
    $pdf->Cell(0,6,$natExe,0,1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(68,6,'Lieu d’exercice de l’activité professionnelle : ',0,0);
    $pdf->SetFont('Roboto-Black','',10);
    $pdf->Cell(0,6,$lieuExe,0,1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(39,6,'Moyen de déplacement : ',0,0);
    $pdf->SetFont('Roboto-Black','',10);
    $pdf->Cell(0,6,$moyDep,0,1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(28,6,'Durée de validité : ',0,0);
    $pdf->SetFont('Roboto-Black','',10);
    $date = new DateTime($dateDebut);
    $pdf->Cell(20,6,date_format($date,'d/m/Y'),0,0);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(6,6,' au ',0,0);
    $pdf->SetFont('Roboto-Black','',10);
    $date = new DateTime($dateFin);
    $pdf->Cell(0,6,date_format($date,'d/m/Y'),0,1);
    $pdf->Ln(4);

    $pdf->SetFont('RobotoReg','',9);
    $pdf->Cell(0,6,'Nom et signature du president :',0,1);
    $pdf->Ln(20);
    $pdf->Image('../../img/Signature_Jean_Louis.png',10,182,80,0);
    $pdf->SetFont('RobotoTitre','',11);
    $pdf->Cell(53,6,$president,'B',1);
    $pdf->Ln(2);

    $pdf->SetFont('Roboto-Black','',9);
    $pdf->Cell(0,6,'Fait à : TOULOUSE',0,1);
    $pdf->Cell(0,6,'Le : '.date("d/m/yy"),0,1);
    $pdf->Ln(1);
    
    $pdf->Cell(0,6,'____________________________________________________________',0,1);
    $pdf->Ln(1);

    $pdf->SetFont('RobotoReg','',6);
    $pdf->Cell(0,3,'1 - Ce document, établi par l’association, est suffisant pour justifier les déplacements professionnels d’un licencié, qu’il s’agisse :',0,1);
    $pdf->Cell(0,3,'- du trajet habituel entre le domicile et le lieu de travail/formation du licencié',0,1);
    $pdf->Cell(0,3,'- des déplacements de nature professionnelle qui ne peuvent pas être différés, à la demande de l\'association.',0,1);
    $pdf->Cell(0,3,'Il n\'est donc pas nécessaire que le licencié se munisse, en plus de ce justificatif, de l\'attestation de déplacement dérogatoire.',0,1);
    $pdf->Cell(0,3,'Les licenciés, pour lesquels ce justificatif ne peut être établi, doivent en revanche se munir de l\'attestation de déplacement dérogatoire en cochant le premier motif de déplacement.',0,1);
    $pdf->Cell(0,3,'2 - Indiquer tous les lieux d’exercice de l’activité du licencié, sauf si la nature même de cette activité, qui doit être scrupuleusement renseignée, ne permet pas de les connaître à l’avance',0,1);
    $pdf->Cell(0,3,'(par exemple: livraisons, interventions sur appel, etc.).',0,1);
    $pdf->Cell(0,3,'3 - La durée de validité de ce justificatif est déterminée par l\'association. Il n’est donc pas nécessaire de le renouveler chaque jour.',0,1);
    $pdf->Cell(0,3,'Cette durée doit tenir compte de l’organisation du travail mise en place par l’association.',0,1);

    // Génération PDF
    $pdf->Output($nom.'_Attestation.pdf','I');
    
