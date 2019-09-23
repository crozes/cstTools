<?php
include 'Control/account/updateAccount.php';

$alert = "";
if(!empty($_POST)){
    if($_POST["nom"]!=$_SESSION['Auth'][0]->nomPersonne || $_POST["prenom"]!=$_SESSION['Auth'][0]->prenomPersonne || $_POST["email"]!=$_SESSION['Auth'][0]->mailPersonne){
        if(updateAccount($_POST["nom"],$_POST["prenom"],$_POST["email"])){
            '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading">Modification bien pris en compte :</h4>
                    <p>Données enregistrés !</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';   
        }else{
            '  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading">Erreur lor de la modification :</h4>
                    <p>Erreur lor de la modification :</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'; 
        }
    }

    if(isset($_POST['password'])){
        $_POST['password'] = strtoupper(hash('sha256', $_POST['password']));

        if($Auth->login($_POST)){
            header('Location:index.php?page=accueil');
        }
        else{
            $alert = '  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h4 class="alert-heading">Veuillez corriger les erreurs suivantes avant de continuer :</h4>
                            <p>L\'adresse e-mail ou le mot de passe ne correspond à aucun compte.</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
        }
    }
}
?>

<div class="jumbotron jumbotron-fluid bg-danger text-white">
<div class="container">
    <h1 class="display-3">Mon compte</h1>
    <p class="lead">Mes informations</p>
</div>
</div>
<main class="login-form">
    <div class="cotainer mb-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php echo $alert;?>
                <div class="card bg-light">
                    <div class="card-header">Mon compte</div>
                    <div class="card-body">
                        <form action="?page=login" method="POST">
                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">Nom</label>
                                <div class="col-md-6">
                                    <input type="text" id="nom" class="form-control" name="nom" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">Prénom</label>
                                <div class="col-md-6">
                                    <input type="text" id="prenom" class="form-control" name="prenom" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input type="text" id="email" class="form-control" name="email" required autofocus>
                                </div>
                            </div>
                            <hr/>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Ancien Mot de passe</label>
                                <div class="col-md-6">
                                    <input type="password" id="oldpassword" class="form-control" name="oldpassword">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Nouveau Mot de passe</label>
                                <div class="col-md-6">
                                    <input type="password" id="newpassword" class="form-control" name="newpassword">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Répéter le nouveau Mot de passe</label>
                                <div class="col-md-6">
                                    <input type="password" id="renewpassword" class="form-control" name="renewpassword">
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    Modifier
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
$( document ).ready(function() {
    $('#nom').val("<?php echo $_SESSION['Auth'][0]->nomPersonne; ?>");
    $('#prenom').val("<?php echo $_SESSION['Auth'][0]->prenomPersonne; ?>");
    $('#email').val("<?php echo $_SESSION['Auth'][0]->mailPersonne; ?>");
});
</script>