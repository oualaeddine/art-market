
       <div class="modal fade" id="modals-edit-category" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
            <form class="add-new-record modal-content pt-0" id="form-edit-category" action=""
             method="POST" enctype="multipart/form-data">
             @csrf
             @method('put')

               <div class="modal-header">
                   <h4 class="modal-title">Modifier une catégorie</h4>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">

                <div class="form-group">
                    <label class="form-label" for="name_edit">Nom <b class="text-danger">*</b></label>
                    <input 
                            type="text"
                            class="form-control"
                            id="name_category_edit"
                            name="name"
                            placeholder="nom de catégorie"
                            aria-label="nom de catégorie"
                            required
                    />
                </div>

               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-default waves-effect" data-bs-dismiss="modal">Fermer</button>
                   <button type="submit" class="btn btn-primary waves-effect waves-light ">Sauvegarder les modifications</button>
               </div>
            </form>
           </div>
       </div>
   </div>
