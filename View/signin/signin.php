<?php
    //print_r($_POST);
    $alert='';
    if(isset($_POST["password"]) && isset($_POST["password2"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["email"]) && isset($_POST["email2"])){
        $_POST['password'] = strtoupper(hash('sha256', $_POST['password']));
        $_POST['password2'] = strtoupper(hash('sha256', $_POST['password2']));
        $_POST["nom"] = mb_strtoupper($_POST["nom"]);
        $_POST["prenom"] = ucwords(strtolower($_POST["prenom"]));
        if($_POST['password'] != $_POST['password2']){
            $alert = '  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h4 class="alert-heading">Veuillez corriger les erreurs suivantes avant de continuer :</h4>
                            <p>Les mots de passe rentrés ne sont pas identiques</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
        }
        else if($_POST['email'] != $_POST['email2']){
            $alert = '  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h4 class="alert-heading">Veuillez corriger les erreurs suivantes avant de continuer :</h4>
                            <p>Les adresses mails rentrés ne sont pas identiques</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
        }
        else{
            include_once "Control/account/addAccount.php";
            $_POST["password"] = strtoupper($_POST["password"]);
            //createAccount($nom,$prenom,$mail,$password,$dateNaissance,$villeNaissance,$departementNaissance,$paysNaissance,$adresse,$adresseSuite,$codePostal,$ville,$nni)
            $ret = createAccount($_POST["sexe"],$_POST["nom"],$_POST["prenom"],$_POST["email"],$_POST["password"],$_POST["dateNaissance"],$_POST["villeNaissance"],$_POST["departement"],$_POST["pays"],$_POST["adresse"],$_POST["adresse2"],$_POST["codePostal"],$_POST["ville"],$_POST["nni"]);
            //$ret = $Auth->create($_POST);
            if($ret == 'OK'){
                //header('Location:index.php?page=accueil');
                $alert = '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <h4 class="alert-heading">Vous êtes enregistré !!!</h4>
                            <p>Vous pouvez des à présent vous connecter à votre compte <a href="?page=login">ICI</a></p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
                $_POST = "";        
            }
            else if($ret == 'Exist'){ 
                $alert = '  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <h4 class="alert-heading">Déjà existant !</h4>
                            <p>L\'adresse mail associée à ce nom existe déjà</p>
                            <p>Si vous avez perdu votre mot de passe merci de contacter l\'administrateur</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
                $_POST = "";     
            }
            else{
                $alert = '  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h4 class="alert-heading">Erreur lors de l\'enregistrement</h4>
                            <p>Contactez l\'administrateur</p>
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
        <h1 class="display-3">S'enregistrer</h1>
        <p class="lead">Permet de creer son compte pour les prochaines connexion et acceder aux outils</p>
    </div>
</div>
<main class="signin-form">
    <div class="container mb-4">
        <?php echo $alert; ?>
        <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 1500px;">
            <h4 class="card-title mt-3 mb-3 text-center">Création de compte</h4>
            <!-- ?page=signin -->
            <form id="creationCompte" action="?page=enregistrer" method="POST">
                <div class="form-group input-group">
                    <select id="sexe" name="sexe" class="form-control">
                        <option value="Monsieur">Monsieur</option>
                        <option value="Madame">Madame</option>
                    </select>
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="nom" id="nom" class="form-control" placeholder="Nom*" type="text" required>
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="prenom" id="prenom" class="form-control" placeholder="Prénom*" type="text" required>
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input id="email" name="email" class="form-control" placeholder="Adresse mail*" type="email" required>
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="email2" id="email2" class="form-control" placeholder="Répéter l'adresse mail*" type="email" required>
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-baby-carriage"></i> </span>
                    </div>
                    <input id="dateNaissance" name="dateNaissance" class="form-control" placeholder="Date de naissance" type="date">
                    <small id="helpId" class="form-text text-muted ml-2">aaaa/mm/jj</small>    
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-baby-carriage"></i> </span>
                    </div>
                    <input id="villeNaissance" name="villeNaissance" class="form-control" placeholder="Ville de naissance" type="text">
                </div> <!-- form-group// --> 
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-baby-carriage"></i> </span>
                    </div>
                    <select name="departement" id="departement" class="form-control"><?php echo getOptionDepartement();?></select>
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-baby-carriage"></i> </span>
                    </div>
                    <select name="pays" id="pays" class="form-control"><?php echo getOptionPays();?></select>
                </div> <!-- form-group// --> 
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-house-user"></i> </span>
                    </div>
                    <input id="adresse" name="adresse" class="form-control" placeholder="Adresse" type="text">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-house-user"></i> </span>
                    </div>
                    <input id="adresse2" name="adresse2" class="form-control" placeholder="Adresse Suite" type="text">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-house-user"></i> </span>
                    </div>
                    <input id="codePostal" name="codePostal" class="form-control" placeholder="Code Postal" type="text">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-house-user"></i> </span>
                    </div>
                    <input id="ville" name="ville" class="form-control" placeholder="Ville" type="text">
                </div> <!-- form-group// -->
                <hr>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input id="password" name="password" class="form-control" placeholder="Mot de passe*" type="password" required>
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input id="password2" name="password2" class="form-control" placeholder="Répéter le mot de passe*" type="password" required>
                </div> <!-- form-group// -->
                <hr>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input id="nni" name="nni" class="form-control" placeholder="Numéro National d'Identification" type="text">
                </div> <!-- form-group// -->

                <!--<div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" value="ok" id="checkBox">
                    <label class="form-check-label" for="checkbox">
                        J'ai pris connaissance de ...
                    </label>
                </div>-->

                <div class="form-group">
                    <button type="submit" id="btn_submit" class="btn btn-danger btn-block"> Je créé mon compte </button>
                </div> <!-- form-group// -->
                <small id="helpId" class="form-text text-muted mb-4">* donnée obigatoire</small>    
                <p class="text-center">J'ai deja un compte ? <a href="?page=login">Je me connecte</a> </p>                                                                 
            </form>
        </article>
    </div> 
    </div>
</main>

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="http://ajax.microsoft.com/ajax/jquery.validate/1.11.1/additional-methods.js"></script>
<script>
    $("#creationCompte").validate({
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
            email2: {
                required: true,
                equalTo: "#email"
            },
            password: {
                required: true,
                minlength: 8
            },
            password2: {
                required: true,
                equalTo: "#password"
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
            email2: {
                required: "Veuillez reécrire votre adresse mail",
                equalTo: "L'adresse mail ne correspond pas à la précedente"
            },
            password: {
                required: "Veuillez rentrer votre mot de passe",
                minlength: "Le password doit faire minimum 8 caractères"
            },
            password2: {
                required: "Veuillez reécrire votre mot de passe",
                equalTo: "Le mot de passe ne correspond pas au précedent"
            }
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