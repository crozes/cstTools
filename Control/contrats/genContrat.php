<?php
    require('../tfpdf/tfpdf.php');
    require('./fctContrats.php');

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
    $nni = $_GET["nni"];
    $dateDebut = $_GET["debutContrat"];
    $dateFin = $_GET["finContrat"];
    $nbHeure = $_GET["nbHeure"];
    $type = $_GET["type"];

    // Instanciation de la classe dérivée
    $pdf = new PDF();
    $pdf->SetTitle('Coucou_Contrat');
    $pdf->AddFont('RobotoReg','','Roboto-Light.ttf',true);
    $pdf->AddFont('Roboto-Black','','Roboto-BoldItalic.ttf',true);
    $pdf->AddFont('RobotoTitre','','Roboto-Bold.ttf',true);
    $pdf->AddFont('RobotoItal','','Roboto-LightItalic.ttf',true);
    $pdf->AliasNbPages(); 
    $pdf->AddPage();
    $pdf->SetFont('RobotoReg','',18);
    setlocale(LC_TIME, "fr_FR");
    // Titres
    $pdf->Cell(0,0,'CONTRAT DE TRAVAIL',0,1,'C');
    $pdf->Ln(8);
    $pdf->SetFont('Roboto-Black','',20);
    if($type == 'entraineur')
        $pdf->Cell(0,0,'EDUCATEUR SPORTIF A DUREE DETERMINEE',0,1,'C');
    else
        $pdf->Cell(0,0,'FORMATEUR A DUREE DETERMINEE',0,1,'C');
    $pdf->Ln(10);
    // Club
    $pdf->SetFont('RobotoItal','',10);
    $pdf->Cell(0,10,'Entre',0,1);
    $pdf->SetFont('RobotoTitre','',11);
    $pdf->Cell(10,6,'',0,0);
    $pdf->Cell(0,6,'Le Club de Sauvetage Toulousain',0,1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(10,6,'',0,0);
    $pdf->Cell(0,6,'Association 1901 enregistrée à TOULOUSE',0,1);
    $pdf->Cell(10,6,'',0,0);
    $pdf->Cell(0,6,'N° SIRET : 403 113 293 00027',0,1);
    $pdf->Cell(10,6,'',0,0);
    $pdf->Cell(0,6,'Code NAF : 9312 Z',0,1);
    $pdf->Cell(10,6,'',0,0);
    $pdf->Cell(0,6,'Sise 3 Lotissements les hauts de Rebigue, 31320 Rebigue',0,1);
    $pdf->Cell(10,6,'',0,0);
    $pdf->Cell(25,6,'Représenté par',0,0);
    $pdf->SetFont('RobotoTitre','',10);
    $pdf->Cell(42,6,'Monsieur Claude CLARAC',0,0);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(35,6,'agissant en qualité de',0,0);
    $pdf->SetFont('RobotoTitre','',10);
    $pdf->Cell(0,6,'Président',0,1);
    // Salarié
    $pdf->SetFont('RobotoItal','',10);
    $pdf->Cell(0,10,'D’une part, et',0,1);
    $pdf->SetFont('RobotoTitre','',11);
    $pdf->Cell(10,6,'',0,0);
    $pdf->Cell(0,6,$sexe.' '.$prenom.' '.$nom,0,1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(10,6,'',0,0);
    $pdf->Cell(20,6,'Demeurant :',0,0);
    $pdf->SetFont('RobotoTitre','',11);
    $pdf->Cell(0,6,$adresse.(!empty($adresse2) ? " - ".$adresse2 : "").", ".$codePostal." ".$ville,0,1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(10,6,'',0,0);
    $pdf->Cell(13,6,'Né[e] le',0,0);
    $pdf->SetFont('RobotoTitre','',11);
    $date = new DateTime($naissance);
    $pdf->Cell(23,6,date_format($date,'d/m/Y'),0,0);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(4,6,'à',0,0);
    $pdf->SetFont('RobotoTitre','',11);
    $pdf->Cell(0,6,$villeNaissance." - ".$departementNaissance,0,1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(10,6,'',0,0);
    $pdf->Cell(10,6,'Nationalité :',0,0);
    $pdf->SetFont('RobotoTitre','',11);
    $pdf->Cell(10,6,'',0,0);
    $pdf->Cell(0,6,$nationalite,0,1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(10,6,'',0,0);
    $pdf->Cell(52,6,'Numéro national d’identification : ',0,0);
    $pdf->SetFont('RobotoTitre','',11);
    $pdf->Cell(0,6,$nni,0,1);
    $pdf->SetFont('RobotoItal','',10);
    $pdf->Cell(0,10,'D’autre part,',0,1);
    // Convenu que
    $pdf->SetFont('RobotoTitre','',11);
    $pdf->Cell(0,10,'Il a été expressément convenu et arrêté ce qui suit :',0,1);
    $pdf->Cell(0,10,$sexe.' '.$prenom.' '.$nom,0,1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(0,6,'La déclaration préalable à l’embauche du salarié a été effectuée auprès de l’URSSAF de la Haute Garonne ou l’association',0,1);
    $pdf->Cell(0,6,'club de sauvetage toulousain est immatriculée.',0,1);
    $pdf->Cell(0,10,'Le contrat de travail sera régi par la convention collective du sport.',0,1);
    $pdf->AddPage();
    // Article 1
    $pdf->SetFont('RobotoTitre','',12);
    $pdf->Cell(0,8,'ARTICLE 1 - Engagement et qualification','B',1);
    $pdf->Ln(1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(116,6,'1.  Le salarié, qui se déclare libre de tout engagement, est employé comme',0,0);
    $pdf->SetFont('RobotoTitre','',10);
    if($type == 'entraineur') {
        $pdf->Cell(0,6,'éducateur sportif.',0,1);
    }  
    else {
        $pdf->Cell(0,6,'formateur.',0,1);
    }
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(0,6,'2.  Le salarié déclare être éducateur sportif, indispensable à l’exercice des fonctions pour lesquelles il est engagé.',0,1);
    $pdf->Ln(5);
    // Article 2
    $pdf->SetFont('RobotoTitre','',12);
    $pdf->Cell(0,8,'ARTICLE 2 - Objet du contrat','B',1);
    $pdf->Ln(1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(148,6,'1.  Le salarié est engagé par l’association club de sauvetage toulousain pour occuper un emploi',0,0);
    $pdf->SetFont('RobotoTitre','',10);
    if($type == 'entraineur') {
        $pdf->Cell(0,6,'éducateur sportif',0,1);
    }
    else {
        $pdf->Cell(0,6,'formateur',0,1);
    }
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(0,6,'     à durée déterminée.',0,1);
    $pdf->Cell(0,6,'2.  Le salarié exercera ses fonctions sous l’autorité et dans le cadre des instructions données par le comité directeur',0,1);
    $pdf->Cell(0,6,'     du club ou toute autre personne désignée à cet effet.',0,1);
    $pdf->Ln(5);
    // Article 3
    $pdf->SetFont('RobotoTitre','',12);
    $pdf->Cell(0,8,'ARTICLE 3 - Durée du contrat','B',1);
    $pdf->Ln(1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(116,6,'1.  Le présent contrat est conclu pour une durée déterminée à compter du',0,0);
    $pdf->SetFont('RobotoTitre','',10);
    $pdf->Cell(22,6,$dateDebut,0,0);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(15,6,'jusqu’au',0,0);
    $pdf->SetFont('RobotoTitre','',10);
    $pdf->Cell(0,6,$dateFin,0,1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(0,6,'2.  Le présent contrat deviendra définitif après une période d’essai de 15 jours.',0,1);
    $pdf->Cell(0,6,'3.  Durant cette période, chacune des parties pourra mettre fin à la période d’essai sous réserve de respecter les délais',0,1);
    $pdf->Cell(0,6,'     de prévenance prévus aux articles L 1221-25 et L 1221-26 du code du travail.',0,1);
    $pdf->Cell(0,6,'4.  Le contrat peut être rompu de manière anticipée aux conditions prévues par l’article L.122-3-8 du Code du Travail',0,1);
    $pdf->Cell(0,6,'     (force majeure, commun accord ou faute grave de l’employeur ou du salarié).',0,1);
    $pdf->Cell(0,6,'5.  Le contrat peut être rompu en cas de désaccord des deux parties. Dans ce cas, la procédure de rupture obligatoire',0,1);
    $pdf->Cell(0,6,'     doit être établie afin d’être en conformité avec l’organisme de recouvrement du chèque emploi associatif.',0,1);
    $pdf->Ln(5);
    // Article 4
    $pdf->SetFont('RobotoTitre','',12);
    $pdf->Cell(0,8,'ARTICLE 4 - Fonctions du salarié','B',1);
    $pdf->Ln(1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(109,6,'1.  Le salarié assurera toutes les fonctions attachées à sa qualification',0,0);
    if($type == "entraineur") {
        $pdf->Cell(0,6,'d’éducateur sportif',0,1);
        $pdf->Cell(0,6,'        • Animation des séances de piscine',0,1);
        $pdf->Cell(0,6,'        • Participation aux réunions pédagogiques',0,1);
        $pdf->Cell(0,6,'        • Participation aux réunions d’inscriptions et d’informations pour les parents',0,1);
        $pdf->Cell(0,6,'        • Participation à l’encadrement des stages de natation et d’entrainement côtiers et sportifs',0,1);
        $pdf->Cell(0,6,'        • Participation à l’accompagnement des nageurs en compétition',0,1);
    }
    else {
        $pdf->Cell(0,6,'formateur',0,1);
        $pdf->Cell(0,6,'        • Animation des séances de formations auxquelles il est qualifié,',0,1);
        $pdf->Cell(0,6,'        • Participation aux réunions pédagogiques,',0,1);
        $pdf->Cell(0,6,'        • Réalisation des documents administratifs avant et après les actions de formation.',0,1);
    }
    $pdf->Cell(0,6,'2.  Il est cependant convenu que cette liste n’est pas exhaustive ou limitative, de sorte que le salarié pourra être amené',0,1);
    $pdf->Cell(0,6,'     à effectuer des tâches annexes ou accessoires.',0,1);
    $pdf->AddPage();
    // Article 5
    $pdf->SetFont('RobotoTitre','',12);
    $pdf->Cell(0,8,'ARTICLE 5 - Durée du travail','B',1);
    $pdf->Ln(1);
    $pdf->SetFont('RobotoReg','',10);
    $i = 1;
    if($type == 'entraineur') {
        $pdf->Cell(38,6,$i.'.  Le salarié effectuera',0,0);
        $i++;
        $pdf->SetFont('RobotoTitre','',10);
        $pdf->Cell(25,6,$nbHeure.' heures',0,0,'C');
        $pdf->SetFont('RobotoReg','',10);
        $pdf->Cell(0,6,'par mois temps d’habillage et déshabillage inclus.',0,1);
        $pdf->Cell(0,10,$i.'.  Il pourra intervenir sur les créneaux suivants :',0,1);
        $i++;
        $w = array(31, 31, 33, 33, 31, 31);
        $jour = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
        for($i=0; $i<count($jour); $i++) {
            $pdf->Cell($w[$i],8,$jour[$i],1,0,'C');
        }
        $pdf->Ln();
        $pdf->Cell($w[0],8,"",1,0,'C');
        $pdf->Cell($w[1],8,"",1,0,'C');
        $pdf->Cell($w[2],8,"6h45 – 8h30",1,0,'C');
        $pdf->Cell($w[3],8,"",1,0,'C');
        $pdf->Cell($w[4],8,"6h45 – 8h30",1,0,'C');
        $pdf->Cell($w[5],8,"",1,0,'C');
        $pdf->Ln();
        $pdf->Cell($w[0],8,"",1,0,'C');
        $pdf->Cell($w[1],8,"",1,0,'C');
        $pdf->Cell($w[2],8,"13h30 – 15h30",1,0,'C');
        $pdf->Cell($w[3],8,"",1,0,'C');
        $pdf->Cell($w[4],8,"",1,0,'C');
        $pdf->Cell($w[5],8,"",1,0,'C');
        $pdf->Ln();
        $pdf->Cell($w[0],8,"21h00 – 23h00",1,0,'C');
        $pdf->Cell($w[1],8,"20h30 – 22h45",1,0,'C');
        $pdf->Cell($w[2],8,"20h30 – 22h45",1,0,'C');
        $pdf->Cell($w[3],8,"",1,0,'C');
        $pdf->Cell($w[4],8,"",1,0,'C');
        $pdf->Cell($w[5],8,"18h00 – 21h00",1,0,'C');
        $pdf->Ln();
        $pdf->Ln();
    }
    else {
        $pdf->Cell(37,6,$i.'.  Le salarié effectuera',0,0);
        $i++;
        $pdf->SetFont('RobotoTitre','',10);
        $pdf->Cell(15,6,'7 heures',0,0);
        $pdf->SetFont('RobotoReg','',10);
        $pdf->Cell(0,6,'par journée de formation. La récurrence peut varier d’un mois à l’autre en fonction des',0,1);
        $pdf->Cell(67,6,'     besoins ou de la demande sans excéder',0,0);
        $pdf->SetFont('RobotoTitre','',10);
        $pdf->Cell(0,6,'35 h par semaine.',0,1);
        $pdf->SetFont('RobotoReg','',10);
    }
    $pdf->Cell(0,6,$i.'.  Il est expressément convenu que cette répartition pourra être modifiée en cas de surcroit temporaire d’activité ou',0,1);
    $pdf->Cell(0,6,'     d’absence d’un ou plusieurs salariés, de déplacement d’un cours ou de vacances scolaires.',0,1);
    $i++;
    $pdf->Cell(0,6,$i.'.  En fonction des nécessités de service (préparation à des compétitions, stages….) et conformément aux dispositions de',0,1);
    $pdf->Cell(0,6,'     l’article L3123-14 du code du travail, le salarié pourra être amené à effectuer des heures supplémentaires à la',0,1);
    $pdf->Cell(0,6,'     durée de travail citée en annexe dans la limite du tiers de la durée de travail de base.',0,1);
    $pdf->Ln(5);
    // Article 6
    $pdf->SetFont('RobotoTitre','',12);
    $pdf->Cell(0,8,'ARTICLE 6 - Lieu de travail','B',1);
    $pdf->Ln(1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(68,6,'1.  A titre informatif, le lieu de travail est fixé',0,0);
    if($type == 'entraineur') {
        $pdf->Cell(0,6,' aux piscines Pech David, Léo Lagrange de Toulouse ainsi que sur le plan d’eau',0,1); 
        $pdf->Cell(0,6,'     de La Ramée sur la commune de Tournefeuille.',0,1); 
    }
    else {
        $pdf->Cell(0,6,'à la salle de réunion, Allée des sports à Ramonville Saint-Agne.',0,1); 
    }
    
    $pdf->Cell(0,6,'2.  Il est convenu que le lieu peut être modifié ponctuellement en cas de surcroît ponctuel d’activité, d’absence d’un ou',0,1);
    $pdf->Cell(0,6,'     plusieurs salariés, de déplacement de cours, de problème technique sur la piscine, vacances scolaires.',0,1);
    $pdf->Cell(0,6,'     La liste n’est pas exhaustive..',0,1);
    $pdf->Cell(0,6,'3.  Ces modifications pourront conduire à un changement de lieu de travail pour n’importe quel autre lieu de pratique des',0,1);
    $pdf->Cell(0,6,'     activités de l’association.',0,1);
    $pdf->Cell(0,6,'4.  Aucune demande complémentaire de lieu de travail ne peut être réalisée si elle ne provient pas du président de',0,1);
    $pdf->Cell(0,6,'     l’association ou de son représentant.',0,1);
    $pdf->Ln(5);
    // Article 7
    $pdf->SetFont('RobotoTitre','',12);
    $pdf->Cell(0,8,'ARTICLE 7 - Rémunération','B',1);
    $pdf->Ln(1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(150,6,'1.  En contrepartie de son travail, le salarié percevra un salaire net calculé sur une base horaire de',0,0);
    if($type == 'entraineur') {
        $pdf->SetFont('RobotoTitre','',10);
        $pdf->Cell(0,6,'15 euros.',0,1);
        $pdf->SetFont('RobotoReg','',10);
    }
    else {
        $pdf->SetFont('RobotoTitre','',10);
        $pdf->Cell(17,6,'110 euros',0,0);
        $pdf->SetFont('RobotoReg','',10);
        $pdf->Cell(150,6,'par jour de',0,1);
        $pdf->Cell(0,6,'     formation. Une journée de bénévolat à titre de solidarité sera réalisée.',0,1);
    }
    $pdf->Ln(5);
    // Article 8
    $pdf->SetFont('RobotoTitre','',12);
    $pdf->Cell(0,8,'ARTICLE 8 - Frais professionnels','B',1);
    $pdf->Ln(1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(0,6,'1.  Les frais professionnels engagés, après autorisation de l’association, au cours de l’exécution du présent contrat seront',0,1);
    $pdf->Cell(0,6,'     remboursés sur justificatifs selon le barème en vigueur dans l’association.',0,1);
    $pdf->AddPage();
    // Article 9
    $pdf->SetFont('RobotoTitre','',12);
    $pdf->Cell(0,8,'ARTICLE 9 - Absence et indisponibilité','B',1);
    $pdf->Ln(1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(0,6,'1.  En cas d’absence prévisible, le salarié devra solliciter une autorisation préalable de comité directeur de l’association.',0,1);
    $pdf->Cell(0,6,'2.  En cas d’absence imprévisible, notamment pour maladie ou accident, le salarié devra prévenir ou faire prévenir le comité',0,1);
    $pdf->Cell(0,6,'     directeur de l’association dans les plus brefs délais et fournir un justificatif de son absence dans les 48 heures.',0,1);
    $pdf->Cell(0,6,'3.  Si l’absence résulte d’une maladie ou d’un accident, la justification prévue ci-dessus résultera de l’envoi d’un certificat',0,1);
    $pdf->Cell(0,6,'     médical indiquant la durée du repos. La même formalité devra être renouvelée en cas de prolongation du repos.',0,1);
    $pdf->Ln(5);
    // Article 10
    $pdf->SetFont('RobotoTitre','',12);
    $pdf->Cell(0,8,'ARTICLE 10 - Matériels et documents','B',1);
    $pdf->Ln(1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(0,6,'1.  Tous les matériels et documents confiés au salarié, quelle qu’en soit la nature, la forme ou la teneur dans le cadre de ses',0,1);
    $pdf->Cell(0,6,'     fonctions resteront la propriété de l’association et devront lui être restitués sur simple demande.',0,1);
    $pdf->Cell(0,6,'2.  Le salarié s’engage à restituer le matériel qui lui aura été confié sur simple demande le jour où il cessera ses fonctions',0,1);
    $pdf->Cell(0,6,'     pour quelque cause que ce soit, sans qu’il soit besoin d’une demande ou d’une mise en demeure préalable par',0,1);
    $pdf->Cell(0,6,'     l’association.',0,1);
    $pdf->Ln(5);
    // Article 11
    $pdf->SetFont('RobotoTitre','',12);
    $pdf->Cell(0,8,'ARTICLE 11 - Obligations professionnelles','B',1);
    $pdf->Ln(1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(0,6,'1.  Le salarié s’engage à respecter, tant pendant l’exécution qu’après la cessation du contrat une discrétion professionnelle',0,1);
    $pdf->Cell(0,6,'     absolue pour tout ce qui concerne les faits ou les informations qu’il aura eu à sa connaissance dans l’exercice ou à',0,1);
    $pdf->Cell(0,6,'     l’occasion de ses fonctions.',0,1);
    $pdf->Cell(0,6,'2.  Les engagements pris de part et d’autres assurant les intérêts de chacun, par sa signature précédé par la mention',0,1);
    $pdf->Cell(0,6,'     "lu et approuvé", le salarié confirme son accord sans réserve sur les termes de la présente et s’engage à respecter',0,1);
    $pdf->Cell(0,6,'     les droits et obligations qui en résultent.',0,1);
    $pdf->Ln(5);
    // Article 12
    $pdf->SetFont('RobotoTitre','',12);
    $pdf->Cell(0,8,'ARTICLE 12 - Retraite et Prévoyance','B',1);
    $pdf->Ln(1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(0,6,'1.  Le salarié bénéficiera de tous les avantages sociaux prévus par les dispositions légales, réglementaires et conventio-',0,1);
    $pdf->Cell(0,6,'     -nnelles en vigueur et sera affilié aux régimes obligatoires des caisses de retraites complémentaires (GROUPE KLESIA-5',0,1);
    $pdf->Cell(0,6,'     à 9 rue van gogh- 75591 PARIS CEDEX 12) et de prévoyance (CHORUM-9 rue matabiau à Toulouse) auxquelles',0,1);
    $pdf->Cell(0,6,'     adhère la Société pour la catégorie professionnelle correspondant à son emploi.',0,1);
    $pdf->AddPage();
    // Article 13
    $pdf->SetFont('RobotoTitre','',12);
    $pdf->Cell(0,8,'ARTICLE 13 - Validité du présent contrat','B',1);
    $pdf->Ln(3);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(0,6,'Vous vous engagez à communiquer toute modification intervenant dans votre situation personnelle [changement d’adresse,',0,1);
    $pdf->Cell(0,6,'situation familiale, invalidité ...].',0,1);
    $pdf->Ln(3);
    $pdf->Cell(0,6,'Vous voudrez bien nous présenter - lors de votre entrée effective dans notre association - originaux des diplômes dont',0,1);
    $pdf->Cell(0,6,'vous avez fait état à notre égard ; s\'il apparaissait que ces documents ne sont pas conformes à vos déclarations ou au',0,1);
    $pdf->Cell(0,6,'curriculum vitae présenté à l\'appui de vos prétentions, le présent contrat serait nul de plein droit.',0,1);
    $pdf->Ln(3);
    $pdf->Cell(0,6,'Enfin, il est convenu que si le présent contrat n\'était pas signé par les deux parties dans un délai maximum de 15 jours à',0,1);
    $pdf->Cell(0,6,'compter de la date à laquelle il a été établi, les dispositions qu\'il contient seraient nulles et non avenues.',0,1);
    $pdf->Ln(3);
    $pdf->Cell(0,6,'Si ces conditions reçoivent votre agrément, vous voudrez bien nous confirmer votre accord en nous retournant, dès réception,',0,1);
    $pdf->Cell(0,6,'deux des trois exemplaires du présent contrat, revêtus obligatoirement :',0,1);
    $pdf->Cell(10);
    $pdf->Cell(0,6,'• Au bas de chaque page, de votre paraphe,',0,1);
    $pdf->Cell(10);
    $pdf->Cell(0,6,'• In fine :',0,1);
    $pdf->Cell(20);
    $pdf->Cell(0,6,'1. de la mention manuscrite : "lu et approuvé, bon pour accord",',0,1);
    $pdf->Cell(20);
    $pdf->Cell(0,6,'2. de la date,',0,1);
    $pdf->Cell(20);
    $pdf->Cell(0,6,'3. de votre signature.',0,1);
    $pdf->Ln(3);
    $pdf->SetFont('RobotoTitre','',10);
    setlocale(LC_TIME, "fr_FR");
    $date = date('d F Y');
    $date = strftime("%d %B %G", strtotime($date));
    $pdf->Cell(0,6,'Document établi en double exemplaire à Toulouse, le '.$date.'.',0,1);
    $pdf->Ln(5);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(110,6,'Le représentant Légal :',0,0);
    $pdf->Cell(0,6,'Le collaborateur :',0,1);
    $pdf->SetFont('RobotoTitre','',10);
    $pdf->Cell(110,6,'Monsieur Claude CLARAC',0,0);
    $pdf->Cell(0,6,$sexe.' '.$prenom.' '.$nom,0,1);
    $pdf->Ln(1);
    $pdf->Cell(110,6,'Date signature :',0,0);
    $pdf->Cell(0,6,'Date signature :',0,1);
    $pdf->Ln(10);
    $pdf->Cell(110,6,'Signature :',0,0);
    $pdf->Cell(0,6,'Mention :',0,1);
    $pdf->Ln(10);
    $pdf->Cell(110,6,'',0,0);
    $pdf->Cell(0,6,'Signature :',0,1);
    /*$pdf->AddPage();
    // Attestation
    $pdf->SetFont('RobotoTitre','',12);
    $pdf->Cell(0,8,'Attestation','B',1);
    $pdf->Ln(3);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(27,6,'Je soussigné[e],',0,0);
    $pdf->SetFont('RobotoTitre','',10);
    $pdf->Cell(0,6,$sexe.' '.$prenom.' '.$nom,0,1);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Ln(3);
    $pdf->Cell(0,6,'Certifie :',0,1);
    $pdf->Cell(10,6,'',0,0);
    $pdf->Cell(0,6,'• Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit id aperiam cumque? Sequi illo sit ipsa aut porro?',0,1);
    $pdf->Cell(10,6,'',0,0);
    $pdf->Cell(0,6,'• Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit id aperiam cumque? Sequi illo sit ipsa aut porro?',0,1);
    $pdf->Cell(10,6,'',0,0);
    $pdf->Cell(0,6,'• Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit id aperiam cumque? Sequi illo sit ipsa aut porro?',0,1);
    $pdf->Cell(10,6,'',0,0);
    $pdf->Cell(0,6,'• Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit id aperiam cumque? Sequi illo sit ipsa aut porro?',0,1);
    $pdf->Cell(10,6,'',0,0);
    $pdf->Cell(0,6,'• Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit id aperiam cumque? Sequi illo sit ipsa aut porro?',0,1);
    $pdf->Cell(10,6,'',0,0);
    $pdf->Cell(0,6,'• Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit id aperiam cumque? Sequi illo sit ipsa aut porro?',0,1);
    $pdf->Cell(10,6,'',0,0);
    $pdf->Cell(0,6,'• Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit id aperiam cumque? Sequi illo sit ipsa aut porro?',0,1);
    $pdf->Cell(10,6,'',0,0);
    $pdf->Cell(0,6,'• Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit id aperiam cumque? Sequi illo sit ipsa aut porro?',0,1);
    $pdf->Cell(10,6,'',0,0);
    $pdf->Cell(0,6,'• Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit id aperiam cumque? Sequi illo sit ipsa aut porro?',0,1);
    $pdf->Ln(10);
    $pdf->Cell(110,6,'Le salarié :',0,0);
    $pdf->Cell(0,6,'L’employeur :',0,1);
    $pdf->Cell(10,6,'Fait à',0,0);
    $pdf->SetFont('RobotoTitre','',10);
    $pdf->Cell(15,6,'Toulouse',0,0);
    $pdf->SetFont('RobotoReg','',10);
    $pdf->Cell(0,6,', le (*)',0,1);
    $pdf->SetFont('RobotoItal','',8);
    $pdf->Cell(0,4,'* Mention manuscrite et signature',0,1);
    $pdf->Cell(0,3,'* "Bon pour accusé de réception".',0,1);
    $pdf->SetFont('RobotoReg','',10);*/
    // Génération PDF
    $pdf->Output($nom.'_Contrat.pdf','I');
    
