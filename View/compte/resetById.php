<?php
    include 'Control/account/resetById.php'; 
    $alert = "";
    if(isset($_GET['id'])){
        $uuid = $_GET['id'];
        $mail = getMailById($uuid);
        if($mail == null){
            header('Location:index.php');
        }
        setcookie("EmailToChange",$mail);
    }
    elseif(isset($_POST['password'])){
        $mail = $_COOKIE['EmailToChange'];
        $password = strtoupper(hash('sha256', $_POST['password']));
        if(majMotDePasseByMail($password,$mail)){
            $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <h4 class="alert-heading">Mot de passe changé !</h4>
                            <p>Vous pouvez maintenant vous <a href="?page=login">connecter</a></p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
        }
        else {
            $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h4 class="alert-heading">Erreur lors du changment de mot de passe</h4>
                            <p>Erreur lors du changement, contacter l\'administrateur</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
        }
    }
    else{
        header('Location:index.php');
    }
?>
<div class="jumbotron jumbotron-fluid bg-danger text-white">
<div class="container">
    <h1 class="display-3">Nouveau mot de passe</h1>
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
                                <label for="password" class="col-md-4 col-form-label text-md-right">Nouveau mot de passe</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password2" class="col-md-4 col-form-label text-md-right">Répéter le nouveau mot de passe</label>
                                <div class="col-md-6">
                                    <input type="password" id="password2" class="form-control" name="password2" required>
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
        password: {
            required: true,
            minlength: 8
        },
        password2: {
            required: true,
            equalTo: "#password",
        }
    },
    messages: {
        password: {
            required: "Veuillez rentrer un mot de passe",
            minlength: "Le mot de passe doit faire minimum 8 caractères"
        },
        password2: {
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