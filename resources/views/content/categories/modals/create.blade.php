
       <div class="modal fade" id="modals-add-categorie" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                <form class="add-new-record modal-content pt-0" action="{{route('admin.categories.store')}}"
                 method="POST" id="product-form">
                 @csrf
                   <div class="modal-header">
                       <h4 class="modal-title">Ajouter une catégorie</h4>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">

                    <div class="form-group">
                        <label class="form-label" for="name">Nom <b class="text-danger">*</b></label>
                        <input 
                                type="text"
                                class="form-control "
                                id="name"
                                name="name"
                                placeholder="nom de catégorie"
                                aria-label="nom de catégorie"
                                required
                        />
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
