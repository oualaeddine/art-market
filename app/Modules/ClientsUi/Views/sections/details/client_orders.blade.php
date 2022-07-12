<div class="card">

    <div class="card-header text-end">
        <a href="javascript:void(0)" onclick="$('.buttons-excel').click()" class="btn  btn-secondary waves-effect mb-2"> Exporter .xls</a>
        <div class="row">
            <div class="col-md-4">
                <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date" />
            </div>
            <div class="col-md-4">
                <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date" />
            </div>
            <div class="col-md-2">
                <button type="button" name="filter" id="filter" class="btn btn-primary w-100">Filtrer</button>
            </div>
            <div class="col-md-2">
                <button type="button" name="refresh" id="refresh" class="btn btn-info w-100">Réinitialiser</button>
            </div>
        </div>
    </div>

    <div class="card-block table-border-style table-responsive">

        <table class="table table-inverse" id="orders_table">
            <thead>
            <tr>
                <th></th>
                <th> identifiant</th>
                <th> Vendeur</th>
                <th> Nom</th>
                <th> Téléphone</th>
                <th> Statut</th>
                <th >Opérateur</th>
                <th >Total</th>
                <th >Wilaya</th>
                <th >Commune</th>
                <th >Address</th>
                <th >Suivie</th>
                <th> Date de création</th>
                <th> Date de mise à jour</th>
                <th> Détails</th>
                <th> Actions</th>
            </tr>
            </thead>
            <tbody>

            </tbody>

        </table>

    </div>
    <div class="card-header text-start">
        <a href="{{route('admin.orders.archived',['client_id'=>$client->id])}}" class="btn btn-danger waves-effect mb-2">Commandes archivées</a>
    </div>
</div>
