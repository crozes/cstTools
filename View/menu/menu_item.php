<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="nav" id="navbarSupportedContent">
        <?php 
            if($_SESSION['Auth'][0]->valueRole>=2){
                echo '  <li class="nav-item">
                            <a id="navbarSupportedContent" class="nav-link" href="?page=licence">Licence Auto</a>
                        </li> ';
            }
        ?>
        <li class="nav-item">
            <a id="navbarSupportedContent" class="nav-link" href="?page=horaire">Déclaration Horaire</a>
        </li>
        <?php
            if($_SESSION['Auth'][0]->valueRole>=3){
                echo '  
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle text-danger bg-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Documents
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item text-danger bg-light" href="?page=contrats">Contrats</a>
                                <a class="dropdown-item text-danger bg-light" href="?page=attestation">Attestations Déplacement</a>
                                <a class="dropdown-item text-danger bg-light" class="nav-link" href="#">Attestation Compétition</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                            <a id="navbarSupportedContent" class="nav-link" href="?page=admin">Administration</a>
                    </li>';
            }
        ?>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <div class="dropdown">
                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['Auth'][0]->prenomPersonne." ".$_SESSION['Auth'][0]->nomPersonne; ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <h6 class="dropdown-header">Mon compte</h6>
                    <a class="dropdown-item" href="?page=moncompte">Mes informations</a>
                    <a class="dropdown-item" href="?page=modPass">Changer mon mot de passe</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger"  href="?page=logout">Déconnexion</a>
                </div>
            </div>
        </li>
    </ul>
</div>

