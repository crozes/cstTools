<div class="col-sm-12 mb-4">
    <h2>Utilisateurs :</h2>
    <table class="table table-striped table-bordered align-middle text-center" id="usersTable">
        <thead>
            <tr> 
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Rôle</th>
            <th scope="col">Mail</th>
            <th scope="col">Sup.</th>
            </tr>
        </thead>
        <body id="bodyUsers">
        </body>
    </table>

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
                reloadTable();
            }
        });
    }

    function reloadTable(){
        //$('#bodyUsers').empty();
        var url = 'Control/admin/selectUsers.php';
        $.ajax({
        url : url,
        type : 'GET',
        //dataType : 'json',
        success : function(json, statut){
                var i = 1;
                jQuery.each(json, function() {
                    $('#usersTable').dataTable().fnAddData( [
                        this.nomPersonne,
                        this.prenomPersonne,
                        this.nomRole,
                        this.mailPersonne,
                        '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteUser" data-idecla="'+this.idPersonne+'"><i class="fas fa-trash text-white" ></i></button>'] );
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
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            },
            "initComplete": function(settings, json) {
                reloadTable();
            }
        });
    });

</script>