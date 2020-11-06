<?php
    include 'Control/account/resetPass.php';
    if( isset( $_POST['mail'] ) ){
        if( !checkIfMailExist( $_POST['mail'] ) ) {
            if( envoyerMail( $_POST['mail'] ) ) {
                $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <h4 class="alert-heading">Mail envoyé !</h4>
                            <p>Un mail vous a été envoyé afin de changer votre mot de passe, vérifier vos spams</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
            }
            else{
                $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h4 class="alert-heading">Erreur lors de l\'envois du Mail</h4>
                            <p>Erreur - contacter l\'administrateur</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
            }
        }
        else {
            $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h4 class="alert-heading">Mail introuvable dans la base de donnée</h4>
                            <p>Le mail que vous avez renseigné : '.$_POST['mail'].' n\'existe pas </p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
        }
    }
?>
<div class="jumbotron jumbotron-fluid bg-danger text-white">
<div class="container">
    <h1 class="display-3">Mot de passe oublié</h1>
    <!--<p class="lead">---</p>-->
</div>
</div>
<main class="login-form">
    <div class="cotainer mb-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php echo $alert;?>
                <div class="card bg-light">
                    <div class="card-body">
                        <form action="?page=resetPass" method="POST" id="updateInfo">
                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">E-mail</label>
                                <div class="col-md-6">
                                    <input type="text" id="mail" class="form-control" name="mail" required>
                                </div>
                            </div>
                            <div class="col-md-6 text-center" style="margin:auto;">
                                <button type="submit" class="btn btn-danger">
                                    Valider
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>