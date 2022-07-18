
       <div class="modal fade" id="modals-edit-brand" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
            <form class="add-new-record modal-content pt-0" id="form-edit-brand" action=""
             method="POST" enctype="multipart/form-data">
             @csrf
             @method('put')

               <div class="modal-header">
                   <h4 class="modal-title">Modifier une marque</h4>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">

            
                <div class="row">

                    <div class="form-group col-md-6">
                        <label class="form-label" for="name_fr_edit">Nom en français<b class="text-danger">*</b></label>
                        <input 
                                type="text"
                                class="form-control "
                                id="name_fr_edit"
                                name="name_fr"
                              
                                required
                        />
                    </div>

                    <div class="form-group col-md-6" >
                        <label class="form-label" for="name_ar_edit">Nom en arabe<b class="text-danger">*</b></label>
                        <input 
                                dir="rtl"
                                type="text"
                                class="form-control "
                                id="name_ar_edit"
                                name="name_ar"
                               
                                required
                        />
                    </div>

                  


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
