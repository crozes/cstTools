<?php
    function association($uuidRezMdp,$mailRezMdp){
        global $PDO;
        $sql_select = 'INSERT INTO RezMdp (idRezMdp,uuidRezMdp,mailRezMdp,dateRezMdp) VALUES (NULL,'.$uuidRezMdp.','.$mailRezMdp.','.date('Y-m-d').');';
        $req = $PDO->prepare($sql_select);
        $req->execute();
    }

    function envoyerMail($to){
        ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );
        $uuid = uniqid();
        association($uuid,$to);
        $from = "communication.cst31@gmail.com";
        $subject = "Reinitialisation du mot de passe";
        $headers = "From: FFSS 31 - Club de Sauvetage Toulousain\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        $message = '<div style="background-color: #f6f6f6; width: 100%; padding-bottom: 20px;"> 
                        <p class="ql-align-center" style="width :100%;text-align: center;"> 
                            <img src="https://ucarecdn.com/af4c942c-22a0-4468-bedc-f3c3044ac380/" style="border-radius: 50%;padding-top: 15px;width: 25%;"/> 
                        </p> 
                        <div style="color:#333;background-color: #fff; border-radius: 15px; padding: 30px;padding-top: 1px;padding-bottom : 5px; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 14px; margin-right: 10%;margin-left: 10%; margin-top:20px; line-height: 1.42857143; box-shadow: 0px 0px 10px 10px rgba(0,0,0,0.1);"> 
                            <h2 style="padding: 10px;background-color: #f44336; color: white; text-align: center; border-radius: 10px; font-size: 2em;line-height: 1.4em;box-shadow: 0px 0px 20px 3px rgba(230, 66, 66, 0.39);">Réinitialisation du mot de passe</h2>
                            <h2 style="font-size: 1.825em; line-height: 1.4em;">Bonjour</h2> 
                            <div style="padding-right: 5%;padding-left: 5%;margin-top: -5%;color:#333;"> 
                                <p>Vous venez de demander de réinitialiser votre mot de passe</p>
                                <p>Si vous n\'avez pas demandé cette réinitialisation merci de contacter l\'administrateur</p>
                                <p>Le mot de passe restera inchangé tant que vous n\'aurez pas appuyer sur le bouton ci-dessous</p>
                                <br>
                                <div style="text-align:center;">
                                    <a href="http://'.SERVER_ADRESS.'/?page=resetById&id='.$uuid.'" style="text-decoration: none;color: white;background-color: #f44336;padding: 10px;border-radius: 3px;font-size: 1rem;">Réinitialiser le mot de passe</a>
                                </div>
                                <br>
                                <p style="margin-top: -12px;">Service communication du Club Sauvetage Toulousain </p> 
                            </div> 
                        </div> 
                    </div>';

        return mail($to,$subject,$message, $headers);
    }