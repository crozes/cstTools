<div class="col-sm-12 mb-4">
    <div class="table-box mb-4">
        <h2 class="display-4">Licences :</h2>
        <hr>
    </div>
    <div class="table-box">    
        <table class="table table-striped table-bordered align-middle text-center" id="usersTable">
            <thead>
                <tr> 
                    <th scope="col">Nom Prenom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Numéro de licence</th>
                </tr>
            </thead>
            <body id="bodyUsers">
            </body>
        </table>
    </div>
<script src="Control/horaire/DateFormat.js"></script>
<script>
    function reloadTable(){
        var url = 'Control/licence/getLicenciesInfo.php';
        $.ajax({
        url : url,
        type : 'GET',
        success : function(json, statut){
                json = JSON.parse(json);
                $('#usersTable').dataTable().fnClearTable();
                jQuery.each(json, function() {
                    $('#usersTable').dataTable().fnAddData( [
                        this.Nom+" "+this.Prenom,
                        this.Email,
                        this.NumeroDeLicence
                    ] );
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