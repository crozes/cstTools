<?php 
	include "Control/horaire/getValueLieu.php";
	include "Control/horaire/getValueType.php";  
?>

<div class="jumbotron jumbotron-fluid bg-danger text-white">
	<div class="container">
		<h1 class="display-3">Déclaration des heures</h1>
		<p class="lead">Outil de déclaration des heures faites</p>
	</div>
</div>
<div class="container">
	<div class="row">
	<div class="col-sm-12">
		<div class="alert alert-danger alert-dismissible" role="alert">
			<h4 class="alert-heading">Attention !</h4>
			<p>Les horraires doivent etre envoyées à l'adresse <a href="mailto:tresorie.cst@gmail.com">tresorie.cst@gmail.com</a> avant le 15 du mois suivant</p>
			<hr>
			<p class="mb-0">Tout dépassement de cette date entrainera un retard de paiement</p>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	</div>
	<div class="col-sm-3">
			<div id="mois" class="dropdown mb-4">
				<label for="inputStateMonth">Mois :</label>
				<select id="inputStateMonth" class="selectpicker" onchange="reloadTable()">
					<option value="01">Janvier</option>
					<option value="02">Février</option>
					<option value="03">Mars</option>
					<option value="04">Avril</option>
					<option value="05">Mai</option>
					<option value="06">Juin</option>
					<option value="07">Juillet</option>
					<option value="08">Août</option>
					<option value="09">Septembre</option>
					<option value="10">Octobre</option>
					<option value="11">Novembre</option>
					<option value="12">Décembre</option>
				</select>
			</div>
		</div>
		<div class="col-sm-3">
			<div id="years" class="dropdown mb-4">
				<label for="inputStateYear">Année :</label>
				<select id="inputStateYear" class="selectpicker" onchange="reloadTable()">
					<option value="2018">2018</option>
					<option value="2019">2019</option>
					<option value="2020">2020</option>
					<option value="2021">2021</option>
					<option value="2022">2022</option>
				</select>
			</div>
		</div>
		<div class="col-sm-12 align-self-center mb-4">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nouvelDecla">
				Nouvelle déclaration
			</button>
		</div>
		<canvas id="pizza" class="loader"></canvas>
		<div class="col-sm-12">
			<table class="table table-striped table-responsive table-bordered align-middle">
				<thead>
					<tr>
					<th class="align-middle" scope="col">#</th> 
					<th class="align-middle" scope="col">Date</th>
					<th class="align-middle" scope="col">Lieu d'intervention</th>
					<th class="align-middle" scope="col">Horaires</th>
					<th class="align-middle" scope="col">Type d'intervention</th>
					<th class="align-middle" scope="col" style="width:100%">Commentaires</th>
					<!--<th scope="col">Total heures</th>-->
					<!--<th scope="col">Mod.</th>-->
					<th class="align-middle" scope="col">Sup.</th>
					</tr>
				</thead>
				<tbody id="bodyHoraire">
				</tbody>
			</table>
		</div>
		<!--------  STATS -------->
		<div class="col-lg-3 col-md-6 col-sm-6">
			<div class="card card-stats">
				<div class="card-body ">
					<div class="row">
						<div class="col-5 col-md-3">
							<div class="icon-big text-center">
								<i class="far fa-clock text-danger"></i>
							</div>
						</div>
							<div class="col-7 col-md-9">
								<div class="numbers">
									<p class="card-category">Total d'heure travaillée :</p>
									<p class="card-title" id="totalHeures"></p>
								</div>
							</div>
						</div>
					</div>
				<!--<div class="card-footer ">
				<hr>
				<div class="stats">
					<i class="fa fa-refresh"></i> Update Now
				</div>-->
				</div>
			</div>
		</div>
		<!--------  ENVOYER -------->
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-3 mt-4 mb-4">
				<a id="envoyerPDFButton" class="btn btn-danger" href="#" role="button" onclick="genPdf()" target="_blank">Générer le PDF</a>
			</div>
		</div>
	</div>
</div>

<!-- Modal NEW -->
<div class="modal fade" id="nouvelDecla" tabindex="-1" role="dialog" aria-labelledby="nouvelDeclaration" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouvelle déclaration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
		  <label for="date">Date<sup>*</sup></label>
		  <input type="date"
			class="form-control" name="date_declaration" id="date_declaration" aria-describedby="helpId" placeholder="1999/12/25" require>
		  <small id="helpId" class="form-text text-muted">aaaa/mm/dd</small>
		</div>
		<div class="form-group">
		  <label for="horaire_declaration">Nombres d'heures travaillées<sup>*</sup></label>
		  <input type="time"
			class="form-control" name="horaire_declaration" id="horaire_declaration" aria-describedby="helpId" placeholder="12:00">
		  <small id="helpId" class="form-text text-muted">hh:mm</small>
		</div>
		<div class="form-group">
		  <label for="lieu_declaration">Lieux<sup>*</sup></label>
		  <select class="selectpicker" name="lieu_declaration" id="lieu_declaration" title="Choisir un lieu" data-width="100%">
		  	<?php echo getValueLieu();?>
		  </select>
		  <small id="helpId" class="form-text text-muted">Si "Autres" précisez en commentaire</small>
		</div>
		<div class="form-group">
		  <label for="type_declaration">Type d'action<sup>*</sup></label>
		  <select class="selectpicker" name="type_declaration" id="type_declaration" title="Choisir une action" data-width="100%">
		  	<?php echo getValueType();?>	
		  </select>
		</div>
		<div class="form-group">
		  <label for="commentaire_declaration">Commentaire</label>
		  <input type="text" class="form-control" name="commentaire_declaration" id="commentaire_declaration" aria-describedby="helpId" placeholder="Commentaires">
		</div>
		<small id="helpId" class="form-text text-muted">* champs obligatoires</small>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onClick="newDecla()">Valider</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteDecla" tabindex="-1" role="dialog" aria-labelledby="deleteDeclaa" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteDeclaa">Supprimer la déclaration ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Voulez-vous vraiment supprimer la déclaration ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button id="validDeleteButton" type="button" class="btn btn-danger" data-dismiss="modal">Supprimer</button>
      </div>
    </div>
  </div>
</div>

<?php include 'Control/all/loader.php' ?>
<script src="Control/horaire/DateFormat.js"></script>
<script>

function genPdf(){
	window.location.href = "Control/horaire/genPDF.php?month=" + $("#inputStateMonth").val() + "&year=" + $("#inputStateYear").val();
}

function getTotalHourMonth(){
	var url = 'Control/horaire/getTotalHourMonth.php';
	$.ajax({
		url : url, // La ressource ciblée
		type : 'GET', // Le type de la requête HTTP.
		data : 'month=' + $("#inputStateMonth").val() + '&year=' + $("#inputStateYear").val(),
		success : function(json, statut){
			jQuery.each(json, function() {
				var timeHour = this.timeSum;
				if (timeHour == null){
					$("#totalHeures").text("0h");
				}
				else{
					var formatTime = (timeHour.substring(0, 5).replace(":","h "))+"min";
					$("#totalHeures").text(formatTime);	
				}
			});
		},
		error : function(resultat, statut, erreur){
			alert(JSON.stringify(resultat));
		},
		complete : function(resultat, statut){

		}
	});
}

/* function edit(){
	var obj = {"idToGet":idToGet};
	var jsonValue = JSON.stringify(obj);
	
	var url = 'Control/horaire/getAllValue.php';
	$.ajax({
		url : url, // La ressource ciblée
		type : 'POST', // Le type de la requête HTTP.
		data: jsonValue,
		dataType : 'text',
		success : function(json, statut){
			//alert(json);
		},
		error : function(resultat, statut, erreur){
			alert(JSON.stringify(resultat));
		},
		complete : function(resultat, statut){
			jQuery.each(json, function() {
				$('#date_declaration').value(this.date);
			});
		}
	});
} */

function deleteHoraire(idTodelete){
	var obj = {"idToDelete":idTodelete};
	var jsonValue = JSON.stringify(obj);
	
	var url = 'Control/horaire/deleteValue.php';
	$.ajax({
		url : url, // La ressource ciblée
		type : 'POST', // Le type de la requête HTTP.
		data: jsonValue,
		dataType : 'text',
		success : function(json, statut){
			//alert(json);
		},
		error : function(resultat, statut, erreur){
			alert(JSON.stringify(resultat));
		},
		complete : function(resultat, statut){
			reloadTable();
		}
	});
}

$('#deleteDecla').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var recipient = button.data('idecla') 
  var modal = $(this)
  modal.find('#validDeleteButton').attr("onClick","deleteHoraire("+recipient+")")
});

function reloadTable(){
	$('#bodyHoraire').empty();
	var url = 'Control/horaire/selectHoraireValue.php';
	$.ajax({
       url : url,
       type : 'GET',
       data : 'month=' + $("#inputStateMonth").val() + '&year=' + $("#inputStateYear").val(),
	   //dataType : 'json',
	   success : function(json, statut){
			if (json === undefined || json.length == 0) {
				$("#bodyHoraire").append('<tr><td colspan="8">Aucun horraire de définit !</td></tr>');
			}
			var i = 1;
			jQuery.each(json, function() {
				var index = "horraire"+i;
				var date = $.format.date(this.dateHoraire+" 00:00:00", "E dd MMM yy");
				$("#bodyHoraire").append('<tr id="'+index+'" ></tr>');
				$("#"+index).append('<td class="align-middle text-center">'+i+'</td>');
				$("#"+index).append('<td class="autoSizing align-middle">'+date+'</td>');
				$("#"+index).append('<td class="autoSizing align-middle">'+this.nomLieuInter+'</td>');
				$("#"+index).append('<td class="autoSizing text-center align-middle">'+(this.timeHoraire).slice(0,-3)+'</td>');
				$("#"+index).append('<td class="autoSizing align-middle">'+this.nomTypeInter+'</td>');
				$("#"+index).append('<td class="align-middle">'+this.comHoraire+'</td>');
				//$("#"+index).append('<td class="align-middle"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editDecal" data-idecla="'+this.idHoraire+'"><i class="fas fa-edit text-white" onClick="edit('+this.idHoraire+')"></i></td>');
				$("#"+index).append('<td class="align-middle"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteDecla" data-idecla="'+this.idHoraire+'"><i class="fas fa-trash text-white" ></i></button></td>');
				
				i = i + 1;
			});
			getTotalHourMonth();
		},
		error : function(resultat, statut, erreur){
			alert(JSON.stringify(resultat));
		},
		complete : function(resultat, statut){
	
		}
    });
}

function newDecla(){
	var dateDecla = $("#date_declaration").val();
	var horaireDecla = $("#horaire_declaration").val()+":00";
	var lieuDecla = $("#lieu_declaration").val();
	var typeDecla = $("#type_declaration").val();
	var comDecla = $("#commentaire_declaration").val();
	var dateDeclaFormated = dateDecla.replace(/\//g, '-');

	var obj = {"dateDecla":dateDeclaFormated,"horaireDecla":horaireDecla,"lieuDecla":lieuDecla,"typeDecla":typeDecla,"comDecla":comDecla};
	var jsonValue = JSON.stringify(obj);
	
	var url = 'Control/horaire/insertValue.php';
	$.ajax({
		url : url, 
		type : 'POST',
		data: jsonValue,
		dataType : 'text',
		success : function(json, statut){
			//alert(json);
		},
		error : function(resultat, statut, erreur){
			alert(JSON.stringify(resultat));
		},
		complete : function(resultat, statut){
			reloadTable();
		}
	});
}

$( document ).ready(function() {
	var time = new Date();
	var month = ("0" + (time.getMonth() + 1)).slice(-2);
	var year = time.getFullYear();
	$('#inputStateMonth').selectpicker('val',month);
	$('#inputStateYear').selectpicker('val',year);
	reloadTable();
});
</script>