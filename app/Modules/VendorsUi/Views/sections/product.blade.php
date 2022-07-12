
    @include('VendorsUi::modals.products.delete')
    @include('VendorsUi::modals.products.images')
    @include('VendorsUi::modals.products.images.delete')
    @include('VendorsUi::modals.products.images.edit')
    @include('VendorsUi::modals.products.toggle')
    @include('ProductsUi::modals.import')


    <div class="card">
        <div class="card-header text-end">
            <a href="javascript:void(0)" onclick="$('.dt-button').click()" class="btn  btn-secondary waves-effect "> Exporter .xls</a>

            <a href="javascript:;" class="btn btn-primary waves-effect " data-bs-placement="top" title="import" data-bs-toggle="modal"
               data-bs-target="#modals-import-product" > Importer des produits</a>

            <a href="{{ route('admin.vendors.products.create',['vendor'=>$vendor->id]) }}" class="btn btn-success waves-effect">Ajouter un produit</a>


        </div>
        <div class="card-block table-border-style table-responsive">

            <table class="table table-inverse" id="vendor_products">
                <thead>
                <tr>
                    <th></th>
                    <th> identifiant </th>
                    <th> Nom en arabe </th>
                    <th> Nom en français </th>
                    <th> Slug </th>
                    <th> ref </th>
                    <th> Ancien prix </th>
                    <th> Prix </th>
                    <th> Transport </th>
                    <th> Description en arabe</th>
                    <th> Description en français </th>
                    {{-- <th> Images </th> --}}
                    <th> Réduction </th>
                    <th> Actif </th>
                    <th> Vendeur </th>
                    <th> Date de création</th>
                    <th> Actions </th>
                </tr>
                </thead>
                <tbody>

                </tbody>

            </table>

        </div>

    </div>

