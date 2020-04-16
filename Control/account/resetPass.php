<?php
    function envoyerMail($to){
        ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );
    
        $from = "communication.cst31@gmail.com";
        $subject = "Vérification PHP mail";
        $message = "PHP mail marche";
        $headers = "From:" . $from;
    
        return mail($to,$subject,$message, $headers);
    }