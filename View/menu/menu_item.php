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
                            <a id="navbarSupportedContent" class="nav-link" href="?page=contrats">Contrats</a>
                        </li>
                        <li class="nav-item">
                             <a id="navbarSupportedContent" class="nav-link" href="?page=admin">Administration</a>
                        </li>';
            }
        ?>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a id="navbarSupportedContent" class="nav-link" href="?page=moncompte"><?php echo $_SESSION['Auth'][0]->prenomPersonne." ".$_SESSION['Auth'][0]->nomPersonne; ?></a>
        </li>
        <li>
            <a id="navbarSupportedContent" class="nav-link" href="?page=logout">Déconnexion</a>
        </li>
    </ul>
</div>