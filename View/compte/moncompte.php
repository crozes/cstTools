<?php
include 'Control/account/updateAccount.php';

$alert = "";
if(!empty($_POST)){
    if( updateAccount($_POST) ) {
        $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">Modification bien pris en compte :</h4>
                <p>Données enregistrés !</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
    }
    else {
        $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">Erreur lor de la modification :</h4>
                <p>Erreur lor de la modification :</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>'; 
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
                    <div class="card-header">Mes informations</div>
                    <div class="card-body">
                        <form action="?page=moncompte" method="POST" id="updateInfo">
                            <div class="form-group row">
                                <label for="sexe" class="col-md-4 col-form-label text-md-right">Sexe</label>
                                <div class="col-md-6">
                                    <select id="sexe" name="sexe" class="form-control">
                                        <option value="NULL">---</option>
                                        <option value="Monsieur">Monsieur</option>
                                        <option value="Madame">Madame</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">Nom</label>
                                <div class="col-md-6">
                                    <input type="text" id="nom" class="form-control" name="nom" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">Prénom</label>
                                <div class="col-md-6">
                                    <input type="text" id="prenom" class="form-control" name="prenom" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input type="text" id="email" class="form-control" name="email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">Date de naissance</label>
                                <div class="col-md-6">
                                    <input id="dateNaissance" name="dateNaissance" class="form-control" placeholder="Date de naissance" type="date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">Ville de naissance</label>
                                <div class="col-md-6">
                                    <input id="villeNaissance" name="villeNaissance" class="form-control" placeholder="Ville de naissance" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">Departement de naissance</label>
                                <div class="col-md-6">
                                    <select name="departement" id="departement" class="form-control"><?php echo getOptionDepartement();?></select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">Pays de naissance</label>
                                <div class="col-md-6">
                                    <select name="pays" id="pays" class="form-control"><?php echo getOptionPays();?></select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">Adresse</label>
                                <div class="col-md-6">
                                    <input id="adresse" name="adresse" class="form-control" placeholder="Adresse" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">Adresse Suite</label>
                                <div class="col-md-6">
                                    <input id="adresse2" name="adresse2" class="form-control" placeholder="Adresse Suite" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">Code Postal</label>
                                <div class="col-md-6">
                                    <input id="codePostal" name="codePostal" class="form-control" placeholder="Code Postal" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">Ville</label>
                                <div class="col-md-6">
                                    <input id="ville" name="ville" class="form-control" placeholder="Ville" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">Numéro National d'Identification</label>
                                <div class="col-md-6">
                                    <input id="nni" name="nni" class="form-control" placeholder="Numéro National d'Identification" type="text">
                                </div>
                            </div>
                            <!--<hr/>
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
                            </div>-->

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
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="http://ajax.microsoft.com/ajax/jquery.validate/1.11.1/additional-methods.js"></script>
<script>
$( document ).ready(function() {
    majInfo();
});

function majInfo(){
    $('#nom').val("<?php echo $_SESSION['Auth'][0]->nomPersonne; ?>");
    $('#prenom').val("<?php echo $_SESSION['Auth'][0]->prenomPersonne; ?>");
    $('#email').val("<?php echo $_SESSION['Auth'][0]->mailPersonne; ?>");
    $('#dateNaissance').val("<?php echo $_SESSION['Auth'][0]->dateNaissancePersonne; ?>");
    $('#villeNaissance').val("<?php echo $_SESSION['Auth'][0]->villeNaissancePersonne; ?>");
    $('#departement option[value="<?php echo $_SESSION['Auth'][0]->idDepartement; ?>"]').prop('selected', true);
    $('#pays option[value="<?php echo $_SESSION['Auth'][0]->idPays; ?>"]').prop('selected', true);
    $('#adresse').val("<?php echo $_SESSION['Auth'][0]->adressePersonne; ?>");
    $('#adresse2').val("<?php echo $_SESSION['Auth'][0]->adresseSuitePersonne; ?>");
    $('#codePostal').val("<?php echo $_SESSION['Auth'][0]->codePostalPersonne; ?>");
    $('#ville').val("<?php echo $_SESSION['Auth'][0]->villePersonne; ?>");
    $('#nni').val("<?php echo $_SESSION['Auth'][0]->nniPersonne; ?>");
    $('#sexe').val("<?php echo ( $_SESSION['Auth'][0]->sexePersonne==null?"NULL":$_SESSION['Auth'][0]->sexePersonne); ?>");
}

$("#updateInfo").validate({
    rules: {
        nom: {
            required: true
        },
        prenom: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        nni: {
            minlength: 15,
            maxlength: 15
        }
    },
    messages: {
        nom: {
            required: "Veuillez rentrer votre nom"
        },
        prenom: {
            required: "Veuillez rentrer votre prénom"
        },
        email: {
            required: "Veuillez rentrer une adresse mail valide",
            email:"Veuillez rentrer une adresse mail valide"
        },
        nni: {
            minlength: "Veuilez rentrer les 15 chiffres de votre nni",
            maxlength: "Veuilez rentrer les 15 chiffres de votre nni"
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