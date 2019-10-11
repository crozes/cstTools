<div class="col-sm-12 mb-4">
    <div class="table-box mb-4">
        <h2 class="display-4 mb-4">Déclarations :</h2>
        <hr>
        <table class="table table-striped table-bordered table-responsive align-middle text-center" id="usersTable">
            <thead>
                <tr> 
                <th scope="col">Nom Prénom</th>
                <th scope="col" width="70px">Date</th>
                <th scope="col">Nbr Heure</th>
                <th scope="col">Type</th>
                <th scope="col">Lieux</th>
                <th scope="col">Com.</th>
                <th scope="col" width="70px">Date decla.</th>
                <th scope="col">Sup.</th>
                </tr>
            </thead>
            <body id="bodyUsers">
            </body>
        </table>
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
<script src="Control/horaire/DateFormat.js"></script>
<script>
    function deleteDecla(idTodelete){
        var obj = {"idToDelete":idTodelete};
        var jsonValue = JSON.stringify(obj);
        
        var url = 'Control/admin/deleteDecla.php';
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

    $('#deleteDecla').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var recipient = button.data('idecla') 
        var modal = $(this)
        modal.find('#validDeleteButton').attr("onClick","deleteDecla("+recipient+")")
    });

    function reloadTable(){
        //$('#bodyUsers').empty();
        var url = 'Control/admin/selectDecla.php';
        $.ajax({
        url : url,
        type : 'GET',
        //dataType : 'json',
        success : function(json, statut){
                $('#usersTable').dataTable().fnClearTable();
                jQuery.each(json, function() {
                    var date = $.format.date(this.dateHoraire+" 00:00:00", "dd MMM yyyy");
                    var dateDecla = $.format.date(this.declaHoraire+" 00:00:00", "dd MMM yyyy");
                    $('#usersTable').dataTable().fnAddData( [
                        this.nomPersonne+" "+this.prenomPersonne,
                        date,
                        this.timeHoraire,
                        this.nomTypeInter,
                        this.nomLieuInter,
                        this.comHoraire,
                        dateDecla,
                        '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteDecla" data-idecla="'+this.idHoraire+'"><i class="fas fa-trash text-white" ></i></button>'] );
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
                { className: "align-middle" },
                { className: "align-middle" },
                { className: "align-middle" },
                { className: "align-middle" },
                { className: "align-middle" },
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