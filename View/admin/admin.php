<?php
    include "Control/admin/getInfo.php";

    if($_SESSION['Auth'][0]->valueRole<3){
        header('Location:?page=accueil');
    }
?>
<div class="jumbotron jumbotron-fluid bg-danger text-white">
	<div class="container">
		<h1 class="display-3">Administration</h1>
		<p class="lead">Console d'administration</p>
	</div>
</div>
<div class="container">
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-primary">
                                <i class="fas fa-users text-primary"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Nombres d'utilisateurs</p>
                                <p class="card-title"><?php echo getNbrUtilisateur(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <a href="?page=admin&type=users" class="text-primary"><i class="fa fa-refresh mr-2"></i> Voir les utilisateurs...</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fas fa-clock text-success"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Nombres de declaration</p>
                                <p class="card-title"><?php echo getNbrDeclaration(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                    <a href="?page=admin&type=declarations" class="text-success"><i class="fa fa-refresh mr-2"></i> Voir les déclarations...</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fas fa-briefcase text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Nombres de type d'action</p>
                                <p class="card-title"><?php echo getNbrTypeAction(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <a href="?page=admin&type=types-action" class="text-warning"><i class="fa fa-refresh mr-2"></i> Voir les types d'action...</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fas fa-location-arrow text-danger"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Nombres de lieux d'action</p>
                                <p class="card-title"><?php echo getNbrLieuAction(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                    <a href="?page=admin&type=lieux-action" class="text-danger"><i class="fa fa-refresh mr-2"></i> Voir les lieux d'action...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="corpAdministration">
        <?php
            if($_GET["type"]=="users"){
                include "View/admin/Admin_users.php";
            }
            else if($_GET["type"]=="declarations"){
                include "View/admin/Admin_declas.php";
            }
            else if($_GET["type"]=="types-action"){
                include "View/admin/Admin_types.php";
            }
            else if($_GET["type"]=="lieux-action"){
                include "View/admin/Admin_lieux.php";
            }
            else{
                include "View/admin/Admin_accueil.php";
            }
        ?>
    </div>
</div>
