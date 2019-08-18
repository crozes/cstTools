<?php
    include "Control/admin/getInfo.php";
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
                        <a href="?page=admin&type=users"><i class="fa fa-refresh mr-2"></i> Voir les utilisateurs...</a>
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
                        <i class="fa fa-refresh mr-2"></i> Voir les déclarations ...
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
                        <i class="fa fa-refresh mr-2"></i> Voir les types d'action ...
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
                        <i class="fa fa-refresh mr-2"></i> Voir les lieux d'action ...
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
            else{
                include "View/admin/Admin_accueil.php";
            }
        ?>
    </div>
</div>
