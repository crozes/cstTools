<?php
    if($_SESSION['Auth'][0]->valueRole<3){
        header('Location:?page=accueil');
    }
    include "Control/licence/functionLicencie.php";
    $Licencies = getLicencies();
    $SelectContent = "<option value='---' selected>---</option>";
    foreach ($Licencies as $value) {
        $SelectContent .= "<option value='".$value['LicencieId']."'>".$value['Nom']." ".$value['Prenom']."</option>";
    }
?>
<div class="jumbotron jumbotron-fluid bg-danger text-white">
    <div class="container">
        <h1 class="display-3">Attestation de déplacement</h1>
        <p class="lead">Outils permettant de générer automatique une attestation de déplacement</p>
    </div>
</div>
<div class="container mb-4" style="padding: 40px;background-color: white;box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.1);border-radius: 15px;">
    <h4 class='mb-4'>Sélectionner une personne pour completer automatiquement le formulaire</h4>
    <select name="infoPersonne" id="infoPersonne" class="form-control col-4"><?php echo $SelectContent;?></select>
</div>
<div class="container" style="padding: 40px;background-color: white;box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.1);border-radius: 15px;">
    <div class="row">
        <div class="col-md-12">
            <form id="newContrat" name="newContrat" action="Control/contrats/genContrat.php" method="post" target="_blank" accept-charset="UTF-8">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" aria-describedby="nom" placeholder="Nom" value="" name="nom" require>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
							<input type="text" class="form-control" id="prenom" aria-describedby="prenom" placeholder="Prénom" value="" name="prenom">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="naissance">Date de naissance</label>
                            <input type="date"
                                class="form-control" name="naissance" id="naissance" aria-describedby="helpId" placeholder="01/01/2020" require>
                            <small id="helpId" class="form-text text-muted">jj/mm/aaaa</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="lieuNaissance">Lieu de Naissance</label>
                            <input type="text" class="form-control" id="lieuNaissance" aria-describedby="lieuNaissance" placeholder="Lieu de Naissance" value="" name="lieuNaissance">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input class="form-control" id="adresse" aria-describedby="adresse" placeholder="Adresse" type="text" name="adresse"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="code_postal">Code Postal</label>
                            <input class="form-control" id="code_postal" type="text" aria-describedby="code_postal" placeholder="Code Postal" name="code_postal"/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ville">Ville</label>
                            <input class="form-control" id="ville" type="text" aria-describedby="ville" placeholder="Ville" name="ville"/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="debutContrat">Date de début</label>
                            <input type="date"
                                class="form-control" name="debutContrat" id="debutContrat" aria-describedby="helpId" placeholder="01/01/2020" require>
                            <small id="helpId" class="form-text text-muted">jj/mm/aaaa</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="finContrat">Date de fin</label>
                            <input type="date"
                                class="form-control" name="finContrat" id="finContrat" aria-describedby="helpId" placeholder="01/01/2020" require>
                            <small id="helpId" class="form-text text-muted">jj/mm/aaaa</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="lieuExe">Lieu d'exercice de l'activité professionnelle</label>
                            <input type="text"
                                class="form-control" name="lieuExe" id="lieuExe" aria-describedby="lieuExe" placeholder="Exemple : Toulouse" require>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="natExe">Nature de l'activité professionnelle</label>
                            <input type="text"
                                class="form-control" name="natExe" id="natExe" aria-describedby="natExe" placeholder="Exemple : Formation secourisme" require>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="moyDep">Moyen de déplacement</label>
                            <input type="text"
                                class="form-control" name="moyDep" id="moyDep" aria-describedby="moyDep" placeholder="Exemple : A la convention du licencié" require>
                        </div>
                    </div>
                </div>        
            </form>            
        </div>                
    </div>                            
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-3 mt-4 mb-4">
            <a id="envoyerPDFButton" class="btn btn-danger" href="#" role="button" onclick="genPdf()">Générer l'attestation</a>
        </div>
    </div>
</div>

<script>

    function genPdf(){
        var nom = $("#nom").val();
        var prenom = $("#prenom").val();
        var sexe = $("#sexe").val();
        var naissance = $("#naissance").val();
        var lieuNaissance = $("#lieuNaissance").val();
        var adresse = $("#adresse").val();
        var code_postal = $("#code_postal").val();
        var ville = $("#ville").val();
        var debutContrat = $("#debutContrat").val();
        var finContrat = $("#finContrat").val();
        var lieuExe = $("#lieuExe").val();
        var natExe = $("#natExe").val(); 
        var moyDep = $("#moyDep").val();
        var path = "Control/documentsAdministratif/genAttestations.php?nom="+nom+"&prenom="+prenom+"&sexe="+sexe+"&naissance="+naissance+"&lieuNaissance="+lieuNaissance+"&adresse="+adresse+"&code_postal="+code_postal+"&ville="+ville+"&debutContrat="+debutContrat+"&finContrat="+finContrat+"&moyDep="+moyDep+"&natExe="+natExe+"&lieuExe="+lieuExe;
        window.open(path,'_blank'); 
    }

    $('#infoPersonne').change(function(){
        var idPersonne = $('#infoPersonne').val();
        var json = {
            Personne:idPersonne
            };
        console.log(json);
        var data = JSON.stringify(json);
        $.ajax({
            type: "POST",
            url: "Control/licence/getLicencieInfo.php",
            dataType: 'json',
            data: data,
        })
        .done(function(dataReturned) {
            //console.log(JSON.stringify(dataReturned));
            $("#nom").val(dataReturned['Nom']);
            $("#prenom").val(dataReturned['Prenom']);
            $("#naissance").val(dataReturned['DateDeNaissance']);
            $("#lieuNaissance").val(dataReturned['LieuDeNaissance']);
            $("#adresse").val(dataReturned['Adresse']);
            //$("#adresse_suite").val(dataReturned['adresseSuitePersonne']);
            $("#code_postal").val(dataReturned['CodePostal']);
            $("#ville").val(dataReturned['Ville']);
            //$("#departement").val(dataReturned['idDepartement']);
            $("#sexe").val(dataReturned['Sexe']);
        })
        .fail(function( jqXHR, textStatus ) {
          alert( "Request failed: " + textStatus );
        });
    });
</script>