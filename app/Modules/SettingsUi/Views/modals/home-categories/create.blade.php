<div class="modal fade" id="modals-add-prod" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="add-new-record modal-content pt-0" action="{{route('admin.home-categories.store')}}"
                  method="POST" id="product-form">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter une catégorie</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="x">{{__('Catégorie')}}</label>
                            <select style="width: 100%!important"  required name="category_id" id="category_id" class="form-control input-lg">
                                <option value="" selected disabled>Sélectionnez une catégorie</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name_fr}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light ">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
