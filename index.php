<?php
    header('Content-Type: text/html; charset=utf-8');
    session_start();

    include 'Control/define.php';
    include 'Control/auth/class_auth.php';
    include 'Control/all/log_db.php';
    try{
        $PDO = new PDO('mysql:host='.$DB_serveur.';dbname='.$DB_base.';charset=utf8',$DB_utilisateur,$DB_motdepasse);
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
    }catch(Exception $e){
        die('Erreur  : ' . $e->getMessage());
    }
    include 'Control/utils.php';
    include 'View/header/header.php';
    include 'View/menu/menu.php';
    
    if(isset($_GET['page'])){
        if( isset($_SESSION['Auth']) ){
            if($_GET['page']=='licence'){
                include 'View/licence/Autolicenciement.php';
            }
            else if($_GET['page']=='horaire'){
                include 'View/horaires/horaire.php';
            }
            else if($_GET['page']=='accueil'){
                include 'View/accueil/accueil.php';
            }
            else if($_GET['page']=='login'){
                include 'View/login/login.php';
            }
            else if($_GET['page']=='logout'){
                include 'View/login/logout.php';
            }
            else if($_GET['page']=='moncompte'){
                include 'View/compte/moncompte.php';
            }
            else if($_GET['page']=='contrats'){
                include 'View/contrats/contrats.php';
            }
            else if($_GET['page']=='modPass'){
                include 'View/compte/modPass.php';
            }
            else if($_GET['page']=='admin'){
                include 'View/admin/admin.php';
            }
            else if($_GET['page']=='modPass'){
                include 'View/compte/modPass.php';
            }
            else{
                header('Location:index.php');
            }
        }
        else if( $_GET['page']=='login'){
            include 'View/login/login.php';
        }
        else if($_GET['page']=='resetById'){
            include 'View/compte/resetById.php';
        }
        else if($_GET['page']=='resetPass'){
            include 'View/compte/resetPass.php';
        }
        else if($_GET['page']=='enregistrer'){
            include 'View/signin/signin.php';
        }
        else{
            header('Location:index.php');
        }
    }
    else{
        include 'View/accueil/accueil.php';
    }
    include 'View/header/footer.php';
?>
