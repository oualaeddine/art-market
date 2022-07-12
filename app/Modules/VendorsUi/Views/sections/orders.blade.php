@include('VendorsUi::modals.orders.delete')
@include('VendorsUi::modals.orders.edit')

<div class="card">
    <div class="card-header text-end">

        <a href="{{route('admin.vendors.orders.create',['vendor'=>$vendor->id])}}" class="btn btn-success waves-effect mb-2"> Ajouter une commande</a>
    </div>
    <div class="card-block table-border-style table-responsive">

        <table class="table table-inverse" id="vendor_orders">
            <thead>
            <tr>
                <th></th>
                <th> identifiant</th>
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

</div>



