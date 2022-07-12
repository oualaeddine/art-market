<div id="product-prototype" class="mt-3 d-none">

    <div class="row product ">
        <div class="col-lg-7 col-md-6">
            <label class="mb-1">Produit</label>
            <select name="product[]" class="form-control produit-id" required>

            </select>
            <span class="text-danger show-error-mod" role="alert" style="display: none">
                <strong>Valeur multiple invalide</strong>
            </span>
        </div>
{{--        <div class="col-lg-3 col-md-6">--}}
{{--            <label class="form-control-label">Prix</label>--}}
{{--            <input type="number" class="form-control price-input" required readonly name="price[]" >--}}
{{--        </div>--}}

        <div class="col-lg-3 col-md-5">
            <label for="quantity">Quantité</label>
            <input type="number" step="1" min="1" name="quantity[]" required class="form-control" >
        </div>

        <div class="col-lg-1 col-md-1">
            <a class="btn btn-icon delete-product"><i class="fa fa-trash mt-4"></i></a>
        </div>
    </div>

</div>
