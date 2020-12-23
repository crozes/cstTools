<?php
class Licencie
{
    var $Saison;
    var $Departement;
    var $Club;
    var $NumeroDeLicence;
    var $Nom;
    var $Prenom;
    var $Nationalite;
    var $DateDeNaissance;
    var $LieuDeNaissance;
    var $DepartementDeNaissance;
    var $Sexe;
    var $Adresse;
    var $CodePostal;
    var $Ville;
    var $Pays;
    var $Telephone;
    var $Portable;
    var $Email;
    var $TypeDeLicence;
    var $Newsletter;
    var $Secouriste;
    var $Sauveteur;	
    var $Operationnel;
    var	$Statut;
    var	$Commande;
    var $CoffreFort;
    var	$CoffreFortActif;
    var $Commentaire;

    function __construct($array)
    {
        foreach ($array as $key => $value) 
        {
            switch($key){
                case 0:  $this->Saison = $value;
                    break;
                case 1:  $this->Departement = $value;
                    break;
                case 2:  $this->Club = $value;
                    break;
                case 3:  $this->NumeroDeLicence = $value;
                    break;
                case 4:  $this->Nom = strtoupper($value);
                    break;
                case 5:  $this->Prenom = ucwords(strtolower($value));
                    break;
                case 6:  $this->Nationalite = $value;
                    break;
                case 7:  $this->DateDeNaissance = $this->FormaterDateFrEnSQL($value);
                    break;
                case 8:  $this->LieuDeNaissance = ucwords(strtolower(str_replace('\'', '\\\'', $value)));
                    break;
                case 9:  $this->DepartementDeNaissance = str_replace('\'', '\\\'', $value);
                    break;
                case 10: $this->Sexe = $value;
                    break;
                case 11: $this->Adresse = $this->mysql_escape_mimic($value);
                    break;
                case 12: $this->CodePostal = str_replace(' ', '', $value);
                    break;
                case 13: $this->Ville = ucwords(strtolower(str_replace('\'', '\\\'', $value)));
                    break;
                case 14: $this->Pays = ucwords(strtolower($value));
                    break;
                case 15: $this->Telephone = $value;
                    break;
                case 16: $this->Portable = $value;
                    break;
                case 17: $this->Email = $value;
                    break;
                case 18: $this->TypeDeLicence = ($value=='VRAI')?1:0;
                    break;
                case 19: $this->Newsletter = ($value==0)?0:1;
                    break;
                case 20: $this->Secouriste = ($value=='VRAI')?1:0;
                    break;
                case 21: $this->Sauveteur = ($value=='VRAI')?1:0;
                    break;
                case 22: $this->Operationnel = ($value=='VRAI')?1:0;
                    break;
                case 23: $this->Statut = $value;
                    break;
                case 24: $this->Commande = $value;
                    break;
                case 25: $this->CoffreFort = ($value=='VRAI')?1:0;
                    break;
                case 26: $this->CoffreFortActif = ($value=='VRAI')?1:0;
                    break;
                case 27: $this->Commentaire = $value;
                    break;
            }
        }
    }

    function FormaterDateFrEnSQL($date)
    { 
        return date('Y-m-d 00:00:00', strtotime(str_replace ('/', '-', $date))); 
    }

    function mysql_escape_mimic($inp) { 
        if(is_array($inp)) 
            return array_map(__METHOD__, $inp); 
    
        if(!empty($inp) && is_string($inp)) { 
            return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp); 
        } 
        return $inp; 
    } 
}