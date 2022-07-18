
       <div class="modal fade" id="modals-add-product_file" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                <form class="add-new-record modal-content pt-0" action="{{route('admin.products.store_file')}}"
                 method="POST"  enctype="multipart/form-data">
                 @csrf
                   <div class="modal-header">
                       <h4 class="modal-title">Importer un fichier</h4>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">

                            {{-- <div class="row">
                                <div class="form-group">
                                    <label for="category">Catégorie</label>

                                    <select style="width: 100%!important;" class="js-example-basic-single col-sm-12 select2-hidden-accessible" id="category_add" name="categories[]" multiple="multiple">

                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div> --}}

                       <div class="row">
                           <div class="form-group row">
                               <label class="col-sm-4 col-form-label">Veuillez choisir un fichier </label>
                               <input type="file" name="uploaded_file" required>
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
