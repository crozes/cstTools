<?php
class PDF extends tFPDF
    {
        // En-tête
        function Header()
        {
            // Logo
            //$this->Image('../../img/logotrans.png',10,6,30);
            $this->Image('../../img/DocumentCSTVierge.jpg',0,0,210,0);
            // Police Arial gras 15
            $this->SetFont('RobotoTitre','',25);
            // Décalage à droite
            $this->Cell(0,30,'',0,1);
            // Saut de ligne
            $this->Ln(10);
        }

        // Pied de page
        function Footer()
        {
            // Positionnement à 1,5 cm du bas
            //$this->SetY(-25);
            /*// Police Arial italique 8
            // Numéro de page
            $this->SetFont('RobotoReg','',10);
            $this->Cell(18,5,'Généré le : ',0,0);
            $this->SetFont('Roboto-Black','',12);
            $this->Cell(20,5,date('d-m-Y'),0,1);*/
            //$this->SetFont('RobotoItal','',12);
            //$this->Cell(0,10,'Page '.$this->PageNo().' / {nb}',0,0,'C');
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