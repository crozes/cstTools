<?php
    if($_SESSION['Auth'][0]->valueRole<3){
        header('Location:?page=accueil');
    }
?>
<div class="jumbotron jumbotron-fluid bg-danger text-white">
    <div class="container">
        <h1 class="display-3">Génération de contrat</h1>
        <p class="lead">Outils permettant de générer automatique un contrat de travail via un formulaire</p>
    </div>
</div>
<div class="container mb-4" style="padding: 40px;background-color: white;box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.1);border-radius: 15px;">
    <h4 class='mb-4'>Sélectionner une personne pour completer automatiquement le formulaire</h4>
    <select name="infoPersonne" id="infoPersonne" class="form-control col-4"><?php echo getOptionPersonnes();?></select>
</div>
<div class="container" style="padding: 40px;background-color: white;box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.1);border-radius: 15px;">
    <div class="btn-group btn-group-toggle mb-4" data-toggle="buttons">
        <label class="btn btn-secondary active" id="entraineurDisp">
            <input type="radio" name="typeContrat" id="entraineur" checked>Entraineur sportif
        </label>
        <label class="btn btn-secondary" id="formateurDisp">
            <input type="radio" name="typeContrat" id="formateur">Formateur
        </label>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form id="newContrat" name="newContrat" action="Control/contrats/genContrat.php" method="post" target="_blank" accept-charset="UTF-8">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sexe">Sexe</label>
                            <select id="sexe" name="sexe" class="form-control">
                                <option value="Monsieur">Monsieur</option>
                                <option value="Madame">Madame</option>
                            </select>
                        </div>
                    </div>
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
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="nationalite">Nationalité</label>
                            <select name="nationalite" id="nationalite" class="form-control"><option value="Afghane">Afghane</option><option value="Albanaise">Albanaise</option><option value="Algérienne">Algérienne</option><option value="Allemande">Allemande</option><option value="Américaine">Américaine</option><option value="Andorrane">Andorrane</option><option value="Angolaise">Angolaise</option><option value="Argentine">Argentine</option><option value="Arménienne">Arménienne</option><option value="Australienne">Australienne</option><option value="Autrichienne">Autrichienne</option><option value="Azerbaïdjanaise">Azerbaïdjanaise</option><option value="Bahamienne">Bahamienne</option><option value="Bahreïnienne">Bahreïnienne</option><option value="Bangladaise">Bangladaise</option><option value="Barbadienne">Barbadienne</option><option value="Bélarussienne">Bélarussienne</option><option value="Belge">Belge</option><option value="Bélizienne">Bélizienne</option><option value="Béninoise">Béninoise</option><option value="Bhoutanaise">Bhoutanaise</option><option value="Bolivienne">Bolivienne</option><option value="Botswanaise">Botswanaise</option><option value="Brésilienne">Brésilienne</option><option value="Britannique">Britannique</option><option value="Bulgare">Bulgare</option><option value="Burkinabè">Burkinabè</option><option value="Burundaise">Burundaise</option><option value="Cambodgienne">Cambodgienne</option><option value="Camerounaise">Camerounaise</option><option value="Canadienne">Canadienne</option><option value="Cap-verdienne">Cap-verdienne</option><option value="Centrafricaine">Centrafricaine</option><option value="Chilienne">Chilienne</option><option value="Chinoise">Chinoise</option><option value="Chypriote">Chypriote</option><option value="Colombienne">Colombienne</option><option value="Comorienne">Comorienne</option><option value="Congolaise">Congolaise</option><option value="Coréenne">Coréenne</option><option value="Costaricienne">Costaricienne</option><option value="Croate">Croate</option><option value="Cubaine">Cubaine</option><option value="Danoise">Danoise</option><option value="De Bosnie-et-Herzégovine">De Bosnie-et-Herzégovine</option><option value="De Guinée-Bissau">De Guinée-Bissau</option><option value="De São Tomé E Príncipe">De São Tomé E Príncipe</option><option value="De Sierra Leone">De Sierra Leone</option><option value="Des Émirats Arabes Unis">Des Émirats Arabes Unis</option><option value="Des Îles Cook">Des Îles Cook</option><option value="Des Îles Fidji">Des Îles Fidji</option><option value="Djiboutienne">Djiboutienne</option><option value="Dominicaine">Dominicaine</option><option value="Dominiquaise">Dominiquaise</option><option value="Du Brunei">Du Brunei</option><option value="Du Lesotho">Du Lesotho</option><option value="D’Antigua-et-Barbuda">D’Antigua-et-Barbuda</option><option value="Égyptienne">Égyptienne</option><option value="Équato-guinéenne">Équato-guinéenne</option><option value="Équatorienne">Équatorienne</option><option value="Érythréenne">Érythréenne</option><option value="Espagnole">Espagnole</option><option value="Est-timorais">Est-timorais</option><option value="Estonienne">Estonienne</option><option value="Éthiopienne">Éthiopienne</option><option value="Finlandaise">Finlandaise</option><option value="Française" selected="selected">Française</option><option value="Gabonaise">Gabonaise</option><option value="Gambienne">Gambienne</option><option value="Géorgienne">Géorgienne</option><option value="Ghanéenne">Ghanéenne</option><option value="Grecque">Grecque</option><option value="Grenadine">Grenadine</option><option value="Guatémaltèque">Guatémaltèque</option><option value="Guinéenne">Guinéenne</option><option value="Guyanienne">Guyanienne</option><option value="Haïtienne">Haïtienne</option><option value="Hondurienne">Hondurienne</option><option value="Hongroise">Hongroise</option><option value="Indienne">Indienne</option><option value="Indonésienne">Indonésienne</option><option value="Iranienne">Iranienne</option><option value="Iraquienne">Iraquienne</option><option value="Irlandaise">Irlandaise</option><option value="Islandaise">Islandaise</option><option value="Israélienne">Israélienne</option><option value="Italienne">Italienne</option><option value="Ivoirienne">Ivoirienne</option><option value="Jamaïquaine">Jamaïquaine</option><option value="Japonaise">Japonaise</option><option value="Jordanienne">Jordanienne</option><option value="Kazakhe">Kazakhe</option><option value="Kényane">Kényane</option><option value="Kirghize">Kirghize</option><option value="Kiribatienne">Kiribatienne</option><option value="Koweïtienne">Koweïtienne</option><option value="Laotienne">Laotienne</option><option value="Lettone">Lettone</option><option value="Libanaise">Libanaise</option><option value="Libérienne">Libérienne</option><option value="Libyenne">Libyenne</option><option value="Liechtensteinoise">Liechtensteinoise</option><option value="Lituanienne">Lituanienne</option><option value="Luxembourgeoise">Luxembourgeoise</option><option value="Malaisienne">Malaisienne</option><option value="Malawienne">Malawienne</option><option value="Maldivienne">Maldivienne</option><option value="Malgache">Malgache</option><option value="Malienne">Malienne</option><option value="Maltaise">Maltaise</option><option value="Marocaine">Marocaine</option><option value="Marshallaise">Marshallaise</option><option value="Mauricienne">Mauricienne</option><option value="Mauritanienne">Mauritanienne</option><option value="Mexicaine">Mexicaine</option><option value="Micronésienne">Micronésienne</option><option value="Moldove">Moldove</option><option value="Monégasque">Monégasque</option><option value="Mongole">Mongole</option><option value="Monténégrine">Monténégrine</option><option value="3Mozambicaine33">Mozambicaine</option><option value="Namibienne">Namibienne</option><option value="Nauruane">Nauruane</option><option value="Néerlandaise">Néerlandaise</option><option value="Néo-zélandaise">Néo-zélandaise</option><option value="Népalaise">Népalaise</option><option value="Nicaraguayenne">Nicaraguayenne</option><option value="Nigériane">Nigériane</option><option value="Nigérienne">Nigérienne</option><option value="Niuéane">Niuéane</option><option value="Nord-coréenne">Nord-coréenne</option><option value="Norvégienne">Norvégienne</option><option value="Omanaise">Omanaise</option><option value="Ougandaise">Ougandaise</option><option value="Ouzbèke">Ouzbèke</option><option value="Pakistanaise">Pakistanaise</option><option value="Palauane">Palauane</option><option value="Panaméenne">Panaméenne</option><option value="Paraguayenne">Paraguayenne</option><option value="Péruvienne">Péruvienne</option><option value="Philippine">Philippine</option><option value="Polonaise">Polonaise</option><option value="Portugaise">Portugaise</option><option value="Qatarienne">Qatarienne</option><option value="Roumaine">Roumaine</option><option value="Russe">Russe</option><option value="Rwandaise">Rwandaise</option><option value="Saint-lucienne">Saint-lucienne</option><option value="Saint-marinaise">Saint-marinaise</option><option value="Salomonaise">Salomonaise</option><option value="Salvadorienne">Salvadorienne</option><option value="Samoane">Samoane</option><option value="Saoudienne">Saoudienne</option><option value="Sénégalaise">Sénégalaise</option><option value="Serbe">Serbe</option><option value="Seychelloise">Seychelloise</option><option value="Singapourienne">Singapourienne</option><option value="Slovaque">Slovaque</option><option value="Slovène">Slovène</option><option value="Somalienne">Somalienne</option><option value="Soudanaise">Soudanaise</option><option value="Sri-lankaise">Sri-lankaise</option><option value="Sud-africaine">Sud-africaine</option><option value="Sud-coréenne">Sud-coréenne</option><option value="Suédoise">Suédoise</option><option value="Suisse">Suisse</option><option value="Surinamaise">Surinamaise</option><option value="Swazie">Swazie</option><option value="Syrienne">Syrienne</option><option value="Tadjike">Tadjike</option><option value="Taïwanaise">Taïwanaise</option><option value="Tanzanienne">Tanzanienne</option><option value="Tchadienne">Tchadienne</option><option value="Tchèque">Tchèque</option><option value="Thaïlandaise">Thaïlandaise</option><option value="Togolaise">Togolaise</option><option value="Tongane">Tongane</option><option value="Trinidadienne">Trinidadienne</option><option value="Tunisienne">Tunisienne</option><option value="Turkmène">Turkmène</option><option value="Turque">Turque</option><option value="Tuvaluane">Tuvaluane</option><option value="Ukrainienne">Ukrainienne</option><option value="Uruguayenne">Uruguayenne</option><option value="Vanuatuane">Vanuatuane</option><option value="Vénézuélienne">Vénézuélienne</option><option value="Vietnamienne">Vietnamienne</option><option value="Yéménite">Yéménite</option><option value="Zambienne">Zambienne</option><option value="Zimbabwéenne">Zimbabwéenne</option></select>
                        </div>	
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="naissance">Date de naissance</label>
                            <input type="date"
                                class="form-control" name="naissance" id="naissance" aria-describedby="helpId" placeholder="01/01/2020" require>
                            <small id="helpId" class="form-text text-muted">jj/mm/aaaa</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="lieuNaissance">Lieu de Naissance</label>
                            <input type="text" class="form-control" id="lieuNaissance" aria-describedby="lieuNaissance" placeholder="Lieu de Naissance" value="" name="lieuNaissance">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="departement">Département de Naissance</label>
                            <!--<select name="departement" id="departement" class="form-control"><option value="NULL">&nbsp;</option><option value="404">01 - Ain</option><option value="405">02 - Aisne</option><option value="406">03 - Allier</option><option value="407">04 - Alpes-de-Haute-Provence</option><option value="408">05 - Hautes-Alpes</option><option value="409">06 - Alpes-Maritimes</option><option value="410">07 - Ardèche</option><option value="411">08 - Ardennes</option><option value="412">09 - Ariège</option><option value="413">10 - Aube</option><option value="414">11 - Aude</option><option value="415">12 - Aveyron</option><option value="416">13 - Bouches-du-Rhône</option><option value="417">14 - Calvados</option><option value="418">15 - Cantal</option><option value="419">16 - Charente</option><option value="420">17 - Charente-Maritime</option><option value="421">18 - Cher</option><option value="422">19 - Corrèze</option><option value="423">21 - Côte-d'Or</option><option value="424">22 - Côtes-d'Armor</option><option value="425">23 - Creuse</option><option value="426">24 - Dordogne</option><option value="427">25 - Doubs</option><option value="428">26 - Drôme</option><option value="429">27 - Eure</option><option value="430">28 - Eure-et-Loir</option><option value="431">29 - Finistère</option><option value="432">2A - Corse-du-Sud</option><option value="433">2B - Haute-Corse</option><option value="434">30 - Gard</option><option value="435" selected="selected">31 - Haute-Garonne</option><option value="436">32 - Gers</option><option value="437">33 - Gironde</option><option value="438">34 - Hérault</option><option value="439">35 - Ille-et-Vilaine</option><option value="440">36 - Indre</option><option value="441">37 - Indre-et-Loire</option><option value="442">38 - Isère</option><option value="443">39 - Jura</option><option value="444">40 - Landes</option><option value="445">41 - Loir-et-Cher</option><option value="446">42 - Loire</option><option value="447">43 - Haute-Loire</option><option value="448">44 - Loire-Atlantique</option><option value="449">45 - Loiret</option><option value="450">46 - Lot</option><option value="451">47 - Lot-et-Garonne</option><option value="452">48 - Lozère</option><option value="453">49 - Maine-et-Loire</option><option value="454">50 - Manche</option><option value="455">51 - Marne</option><option value="456">52 - Haute-Marne</option><option value="457">53 - Mayenne</option><option value="458">54 - Meurthe-et-Moselle</option><option value="459">55 - Meuse</option><option value="460">56 - Morbihan</option><option value="461">57 - Moselle</option><option value="462">58 - Nièvre</option><option value="463">59 - Nord</option><option value="464">60 - Oise</option><option value="465">61 - Orne</option><option value="466">62 - Pas-de-Calais</option><option value="467">63 - Puy-de-Dôme</option><option value="468">64 - Pyrénées-Atlantiques</option><option value="469">65 - Hautes-Pyrénées</option><option value="470">66 - Pyrénées-Orientales</option><option value="471">67 - Bas-Rhin</option><option value="472">68 - Haut-Rhin</option><option value="473">69 - Rhône</option><option value="474">70 - Haute-Saône</option><option value="475">71 - Saône-et-Loire</option><option value="476">72 - Sarthe</option><option value="477">73 - Savoie</option><option value="478">74 - Haute-Savoie</option><option value="479">75 - Paris</option><option value="480">76 - Seine-Maritime</option><option value="481">77 - Seine-et-Marne</option><option value="482">78 - Yvelines</option><option value="483">79 - Deux-Sèvres</option><option value="484">80 - Somme</option><option value="485">81 - Tarn</option><option value="486">82 - Tarn-et-Garonne</option><option value="487">83 - Var</option><option value="488">84 - Vaucluse</option><option value="489">85 - Vendée</option><option value="490">86 - Vienne</option><option value="491">87 - Haute-Vienne</option><option value="492">88 - Vosges</option><option value="493">89 - Yonne</option><option value="494">90 - Territoire de Belfort</option><option value="495">91 - Essonne</option><option value="496">92 - Hauts-de-Seine</option><option value="497">93 - Seine-Saint-Denis</option><option value="498">94 - Val-de-Marne</option><option value="499">95 - Val-d'Oise</option><option value="757">98 - Monaco</option><option value="501">972 - Martinique</option><option value="500">971 - Guadeloupe</option><option value="502">973 - Guyane</option><option value="503">974 - La Réunion</option><option value="504">975 - Saint-Pierre-et-Miquelon</option><option value="505">976 - Mayotte</option><option value="506">984 - Terres Australes et Antarctiques</option><option value="507">986 -Wallis et Futuna</option><option value="508">987 - Polynésie Française</option><option value="509">988 - Nouvelle-Calédonie</option><option value="510">999 - Étranger</option></select>-->
                            <select name="departement" id="departement" class="form-control"><?php echo getOptionDepartement();?></select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input class="form-control" id="adresse" aria-describedby="adresse" placeholder="Adresse" type="text" name="adresse"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="adresse_suite">Adresse Suite</label>
                            <input class="form-control" id="adresse_suite" type="text" aria-describedby="adresse_suite" placeholder="Adresse Suite" name="adresse_suite"/>
                        </div>
                    </div>
                    <div class="col-md-4">
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
                            <label for="nni">Numéro national d’identification</label>
                            <input class="form-control" id="nni" type="text" aria-describedby="nni" placeholder="Numéro national d’identification" name="NNI"/>
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
                    <div class="col-md-4" id="nbrHeureDisplay">
                        <div class="form-group">
                            <label for="nbHeure">Nombre d'heures par mois</label>
                            <input type="time"
                                class="form-control" name="nbHeure" id="nbHeure" aria-describedby="helpId" placeholder="12:00">
                            <small id="helpId" class="form-text text-muted">hh:mm</small>
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
            <a id="envoyerPDFButton" class="btn btn-danger" href="#" role="button" onclick="genPdf()">Générer le Contrat</a>
        </div>
    </div>
</div>

<script>
    $( "#entraineurDisp" ).change(function() {
        majForm();
    });
    $( "#formateurDisp" ).change(function() {
        majForm();
    }); 

    function majForm(){
        var entraineurButton = $('#entraineur');
        var formateurButton = $('#formateur');
        var nbrHeureDisplay = $('#nbrHeureDisplay');
        if(entraineurButton.is(':checked')) {
            nbrHeureDisplay.show();
        }
        else {
            nbrHeureDisplay.hide();
        }
    }

    function genPdf(){
        var nom = $("#nom").val();
        var prenom = $("#prenom").val();
        var sexe = $("#sexe").val();
        var nationalite = $("#nationalite").val();
        var naissance = $("#naissance").val();
        var lieuNaissance = $("#lieuNaissance").val();
        var departement = $("#departement option:selected").text();
        var adresse = $("#adresse").val();
        var adresse_suite = $("#adresse_suite").val();
        var code_postal = $("#code_postal").val();
        var ville = $("#ville").val();
        var nni = $("#nni").val();
        var debutContrat = $("#debutContrat").val();
        var finContrat = $("#finContrat").val();
        var nbHeure = $("#nbHeure").val();
        var type = $('input[name="typeContrat"]:checked').attr('id');
        var path = "Control/contrats/genContrat.php?nom="+nom+"&prenom="+prenom+"&sexe="+sexe+"&nationalite="+nationalite+"&naissance="+naissance+"&lieuNaissance="+lieuNaissance+"&departement="+departement+"&adresse="+adresse+"&adresse_suite="+adresse_suite+"&code_postal="+code_postal+"&ville="+ville+"&nni="+nni+"&debutContrat="+debutContrat+"&finContrat="+finContrat+"&nbHeure="+nbHeure+"&type="+type;
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
            url: "Control/contrats/getUtilisateurInfo.php",
            dataType: 'json',
            data: data,
        })
        .done(function(dataReturned) {
            console.log(JSON.stringify(dataReturned));
            $("#nom").val(dataReturned['nomPersonne']);
            $("#prenom").val(dataReturned['prenomPersonne']);
            $("#naissance").val(dataReturned['dateNaissancePersonne']);
            $("#lieuNaissance").val(dataReturned['villeNaissancePersonne']);
            $("#adresse").val(dataReturned['adressePersonne']);
            $("#adresse_suite").val(dataReturned['adresseSuitePersonne']);
            $("#code_postal").val(dataReturned['codePostalPersonne']);
            $("#ville").val(dataReturned['villePersonne']);
            $("#nni").val(dataReturned['nniPersonne']);
            $("#departement").val((dataReturned['idDepartement']==""?"NULL":dataReturned['idDepartement']));
        })
        .fail(function() {
            console.log("Error");
        });
    });
</script>