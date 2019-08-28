<div class="col-sm-12 mb-4">
    <div class="table-box mb-4">
        <h2 class="display-4">Lieux :</h2>
        <hr>
        <div class="row m-4">
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                <input type="text" class="form-control" name="newType" id="newType" aria-describedby="helpId" placeholder="Ajouter un nouveau Type">
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <button type="button" name="valNewType" id="valNewType" class="btn btn-danger" onclick="addNewType()">Ajouter</button>
            </div>        
        </div>
    </div>
    <div class="table-box">    
        <table class="table table-striped table-bordered align-middle text-center" id="usersTable">
            <thead>
                <tr> 
                <th scope="col" width="90%">Nom</th>
                <th scope="col" width="10%">Sup.</th>
                </tr>
            </thead>
            <body id="bodyUsers">
            </body>
        </table>
    </div>    

    <div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="deleteDeclaa" aria-hidden="true">
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
<script src="Control/horaire/DateFormat.js"></script>
<script>
    function deleteHoraire(idTodelete){
        var obj = {"idToDelete":idTodelete};
        var jsonValue = JSON.stringify(obj);
        
        var url = 'Control/admin/deleteUser.php';
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
                if(resultat.status == "KO"){
                    alert("Erreur lors de la suppression contacter l'administrateur");
                }
                else{
                    reloadTable();
                }
            }
        });
    }

    function reloadTable(){
        //$('#bodyUsers').empty();
        var url = 'Control/admin/selectLieux.php';
        $.ajax({
        url : url,
        type : 'GET',
        //dataType : 'json',
        success : function(json, statut){
                var i = 1;
                jQuery.each(json, function() {
                    var date = $.format.date(this.dateDeclaPersonne+" 00:00:00", "dd MMM yyyy");
                    $('#usersTable').dataTable().fnAddData( [
                        this.nomLieuInter,
                        '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteUser" data-idecla="'+this.idLieuInter+'"><i class="fas fa-trash text-white" ></i></button>'] );
                    /*var index = "users"+i;
                    $("#bodyUsers").append('<tr id="'+index+'" ></tr>');
                    $("#"+index).append('<td class="autoSizing align-middle">'+this.nomPersonne+'</td>');
                    $("#"+index).append('<td class="autoSizing align-middle">'+this.prenomPersonne+'</td>');
                    $("#"+index).append('<td class="autoSizing align-middle">'+this.mailPersonne+'</td>');
                    $("#"+index).append('<td class="autoSizing align-middle">'+this.nomRole+'</td>');
                    $("#"+index).append('<td class="align-middle"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteUser" data-idecla="'+this.idPersonne+'"><i class="fas fa-trash text-white" ></i></button></td>');
                    i = i + 1;*/
                });
            },
            error : function(resultat, statut, erreur){
                alert(JSON.stringify(resultat));
            },
            complete : function(resultat, statut){
                
            }
        });
    }

    $(document).ready(function() {
        $('#usersTable').DataTable( {
            "columns": [
                { className: "align-middle" },
                { className: "align-middle" }
            ],
            responsive: true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            },
            "initComplete": function(settings, json) {
                reloadTable();
            }
        });
    });

</script>