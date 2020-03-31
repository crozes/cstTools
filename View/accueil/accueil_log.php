<?php 
    if($_SESSION['Auth'][0]->valueRole>=2){
        echo '<div class="view" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url(\'img/licence.jpg\'); background-repeat: no-repeat; background-size: cover; background-position: center center;margin-top:-2rem;">
                <!-- Mask & flexbox options-->
                <div class="mask rgba-gradient d-flex justify-content-center align-items-center">
                    <!-- Content -->
                    <div class="container">
                        <!--Grid row-->
                        <div class="row">
                        <!--Grid column-->
                            <div class="col-md-6 col-xl-5 mt-xl-5 animated fadeInRight" >
                                <img src="https://mdbootstrap.com/img/Mockups/Transparent/Small/admin-new.png" alt="" class="img-fluid">
                            </div>
                            <!--Grid column-->
                            <!--Grid column-->
                            <div class="col-md-6 text-light text-right text-md-left mt-xl-5 mb-5" >
                                <h1 class="h1-responsive font-weight-bold mt-sm-5 text-right">Licences Automatiques</h1>
                                <hr class="hr-light">
                                <h6 class="mb-4 text-light text-right">Outil qui permet d\'automatiser les licences grâce à un lien google sheet /!\ le tableau doit etre dans le bon format afin que l\'application web marche</h6>
                                <a name="" id="" class="btn btn-danger" href="?page=licence" role="button">GO !</a>
                            </div>
                            <!--Grid column-->
                        </div>
                    <!--Grid row-->
                    </div>
                <!-- Content -->
                </div>
            </div>';
    }
?>
<div class="view" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url('img/horaire.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;margin-top:-2rem;">
    <!-- Mask & flexbox options-->
    <div class="mask rgba-gradient d-flex justify-content-center align-items-center">
    <!-- Content -->
        <div class="container">
        <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-md-6 text-white text-center text-md-left mt-xl-5 mb-5 animated fadeInLeft" >
                        <h1 class="h1-responsive font-weight-bold mt-sm-5">Déclaration de vos horaires </h1>
                        <hr class="hr-light">
                        <h6 class="mb-4 text-white">Outil permetant de délcarer et de garder en mémoire les horaires faites pour le club.</h6>
                        <a name="" id="" class="btn btn-danger" href="?page=horaire" role="button">GO !</a>
                </div>
                <!--Grid column-->
                <!--Grid column-->
                <div class="col-md-6 col-xl-5 mt-xl-5 animated fadeInRight" >
                        <img src="https://mdbootstrap.com/img/Mockups/Transparent/Small/admin-new.png" alt="" class="img-fluid">
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Content -->
    </div>
</div>
<?php 
    if($_SESSION['Auth'][0]->valueRole==3){
        echo '<div class="view" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url(\'img/contrat.jpg\'); background-repeat: no-repeat; background-size: cover; background-position: center center;margin-top:-2rem;">
                <!-- Mask & flexbox options-->
                <div class="mask rgba-gradient d-flex justify-content-center align-items-center">
                    <!-- Content -->
                    <div class="container">
                        <!--Grid row-->
                        <div class="row">
                        <!--Grid column-->
                            <div class="col-md-6 col-xl-5 mt-xl-5 animated fadeInRight" >
                                <img src="https://mdbootstrap.com/img/Mockups/Transparent/Small/admin-new.png" alt="" class="img-fluid">
                            </div>
                            <!--Grid column-->
                            <!--Grid column-->
                            <div class="col-md-6 text-light text-right text-md-left mt-xl-5 mb-5" >
                                <h1 class="h1-responsive font-weight-bold mt-sm-5 text-right">Génération de Contrat</h1>
                                <hr class="hr-light">
                                <h6 class="mb-4 text-light text-right">Outil qui permet de générer des contrats de travail</h6>
                                <a class="btn btn-danger" href="?page=contrats" role="button">GO !</a>
                            </div>
                            <!--Grid column-->
                        </div>
                    <!--Grid row-->
                    </div>
                <!-- Content -->
                </div>
            </div>';
    }
?>
<?php 
    if($_SESSION['Auth'][0]->valueRole==3){
        echo '<div class="view" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url(\'img/gestion.jpg\'); background-repeat: no-repeat; background-size: cover; background-position: center center;margin-top:-2rem;">
            <!-- Mask & flexbox options-->
                <div class="mask rgba-gradient d-flex justify-content-center align-items-center">
                <!-- Content -->
                    <div class="container">
                    <!--Grid row-->
                        <div class="row">
                            <!--Grid column-->
                            <div class="col-md-6 text-white text-center text-md-left mt-xl-5 mb-5 animated fadeInLeft" >
                                    <h1 class="h1-responsive font-weight-bold mt-sm-5">Administration</h1>
                                    <hr class="hr-light">
                                    <h6 class="mb-4 text-white">Permet de générer l\'ensemble des données qui sont renseigné par les personnes, ainsi que les personnes ayant un compte sur CST Tools</h6>
                                    <a class="btn btn-danger" href="?page=admin" role="button">GO !</a>
                            </div>
                            <!--Grid column-->
                            <!--Grid column-->
                            <div class="col-md-6 col-xl-5 mt-xl-5 animated fadeInRight" >
                                    <img src="https://mdbootstrap.com/img/Mockups/Transparent/Small/admin-new.png" alt="" class="img-fluid">
                            </div>
                            <!--Grid column-->
                        </div>
                        <!--Grid row-->
                    </div>
                    <!-- Content -->
                </div>
            </div>';
    }
?>  