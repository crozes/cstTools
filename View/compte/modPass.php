<?php
    if(isset($_POST['ancien_mdp'])){
        $mdp = strtoupper(hash('sha256', $_POST['ancien_mdp']));
        $newMdp= strtoupper(hash('sha256', $_POST['nouveau_mdp']));

        if($mdp == $_SESSION['Auth'][0]->mdpPersonne){
            if(majMotDePasse($newMdp)){
                $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <h4 class="alert-heading">Modification bien pris en compte :</h4>
                            <p>Données enregistrés !</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
                $_SESSION['Auth'][0]->mdpPersonne = $newMdp;
            }
            else {
                $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h4 class="alert-heading">Echec de la modification</h4>
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
    <p class="lead">Changement du mot de passe</p>
</div>
</div>
<main class="login-form">
    <div class="cotainer mb-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php echo $alert;?>
                <div class="card bg-light">
                    <div class="card-body">
                        <form action="?page=modPass" method="POST" id="updateInfo">
                            <div class="form-group row">
                                <label for="ancien_mdp" class="col-md-4 col-form-label text-md-right">Ancien mot de passe*</label>
                                <div class="col-md-6">
                                    <input type="password" id="ancien_mdp" class="form-control" name="ancien_mdp" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nouveau_mdp" class="col-md-4 col-form-label text-md-right">Nouveau mot de passe*</label>
                                <div class="col-md-6">
                                    <input type="password" id="nouveau_mdp" class="form-control" name="nouveau_mdp" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nouveau_mdp2" class="col-md-4 col-form-label text-md-right">Répéter le nouveau mot de passe*</label>
                                <div class="col-md-6">
                                    <input type="password" id="nouveau_mdp2" class="form-control" name="nouveau_mdp2" required>
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

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="http://ajax.microsoft.com/ajax/jquery.validate/1.11.1/additional-methods.js"></script>
<script>
$("#updateInfo").validate({
    rules: {
        ancien_mdp: {
            required: true
        },
        nouveau_mdp: {
            required: true,
            minlength: 8
        },
        nouveau_mdp2: {
            required: true,
            equalTo: "#nouveau_mdp",
        }
    },
    messages: {
        ancien_mdp: {
            required: "Veuillez rentrer l'ancien mot de passe"
        },
        nouveau_mdp: {
            required: "Veuillez rentrer un mot de passe",
            minlength: ""
        },
        nouveau_mdp2: {
            required: "Veuillez répéter le nouveau mot de passe",
            equalTo: "Mot de passe différent"

        }
    },
    //wrapper: 'div',
    errorPlacement: function(label, element) {
        //element.addClass('is-invalid');
        label.addClass('invalid-feedback');
        label.insertAfter(element);
    },
    /* success: function(label) {
        label.removeClass("invalid-feedback").addClass("valid-feedback").text("Ok!");
    } */
});
</script>