<?php
include "cLicencie.php";
include '../licence/functionLicencie.php';

date_default_timezone_set('UTC');
require('XLSXReader.php');
$xlsx = new XLSXReader('export-licencies-20201220135547-.xlsx');
$sheetNames = $xlsx->getSheetNames();
$licencieArray = array();
$sheet = $xlsx->getSheet($sheetNames[1]);
$elements = $sheet->getData();
$cpt = 0;
foreach ($elements as $value) 
{
    if($cpt != 0)
        array_push($licencieArray,new Licencie($value));
    $cpt++;
}

foreach ($licencieArray as $value) 
{
    if (existInDb($value))
    {
        echo 'Already Exist<br>';
    }
    else
    {
        echo 'Not Exist -> ';
        if(addLicencie($value))
        {
            echo " - ADDED<br>";
        }
        else
        {
            echo " - FAILED<br>";
        }
    }   
}

