
       <div class="modal fade" id="modals-edit-product" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
            <form class="add-new-record modal-content pt-0" id="form-edit-product" action=""
             method="POST" enctype="multipart/form-data"> 
             @csrf
             @method('put')


               <div class="modal-header">
                   <h4 class="modal-title">Modifier un produit</h4>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">


                <div class="row">

                    <div class="form-group col-md-6">
                        <label class="form-label" for="name_ar-edit">Nom ar <b class="text-danger">*</b></label>
                        <input dir="rtl"
                                type="text"
                                class="form-control"
                                id="name_ar-edit"
                                name="name_ar"
                                placeholder="إسم المنتج"
                                aria-label="إسم المنتج"
                                required
                        />
                    </div>
    
                    <div class="form-group col-md-6" >
                        <label class="form-label" for="name_fr-edit">Nom fr <b class="text-danger">*</b></label>
                        <input
                                type="text"
                                class="form-control"
                                id="name_fr-edit"
                                name="name_fr"
                                placeholder="Nom de produit"
                                aria-label="Nom de produit"
                                required
                        />
                    </div>

                </div>

               

                <div class="row">

                    <div class="form-group col-md-6">
                        <label class="form-label" for="desc_ar-edit">Description ar </label>
                        <textarea dir="rtl"
                                type="text"
                                class="form-control "
                                id="desc_ar-edit"
                                name="desc_ar"
                                placeholder="وصف المنتج"
                                aria-label="وصف منتج"
                                cols="20" rows="3"
                               
                        ></textarea>
                    </div>
    
                    <div class="form-group col-md-6">
                        <label class="form-label" for="desc_fr-edit">Description fr </label>
                        <textarea dir="rtl"
                                type="text"
                                class="form-control "
                                id="desc_fr-edit"
                                name="desc_fr"
                                placeholder="Description de produit"
                                aria-label="Description de produit"
                                cols="20" rows="3"
                                
                        ></textarea>
                    </div>

                </div>

              

                <div class="row">
                    <div class="form-group col-md-4">
                        <label class="form-label" for="image-edit">Image</label>
                        <input type="file" name="image" id="image-edit" class="form-control">
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label" for="ref-edit">Ref <b class="text-danger">*</b></label>
                        <input
                                type="text"
                                class="form-control "
                                id="ref-edit"
                                name="ref"
                                placeholder="ref de produit"
                                aria-label="ref de produit"
                                required
                        />
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label" for="discount-edit">Remise <b class="text-danger">*</b></label>
                        <input
                                min="0"
                                max="100"
                                type="number"
                                class="form-control"
                                id="discount-edit"
                                name="discount"
                                placeholder="ex : 1"
                                aria-label="ex : 1"
                                required
                        />
                    </div>
                </div>

                <div class="row">

                    <div class="form-group col-md-4">
                        <label class="form-label" for="price_first-edit">Prix de 12 mois <b class="text-danger">*</b></label>
                        <input
                                min="0"
                                type="number"
                                class="form-control"
                                id="price_first-edit"
                                name="price_first"
                                placeholder=""
                                aria-label=""
                                required
                        />
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label" for="price_second-edit">Prix de 24 mois <b class="text-danger">*</b></label>
                        <input
                                min="0"
                                type="number"
                                class="form-control"
                                id="price_second-edit"
                                name="price_second"
                                placeholder=""
                                aria-label=""
                                required
                        />
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label" for="price_thired-edit">Prix de 36 mois <b class="text-danger">*</b></label>
                        <input
                                min="0"
                                type="number"
                                class="form-control"
                                id="price_thired-edit"
                                name="price_thired"
                                placeholder=""
                                aria-label=""
                                required
                        />
                    </div>

                </div>
               
                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="category-edit">Catégorie</label>

                        <select style="width: 100%!important;" class="select-category-edit col-sm-12 select2-hidden-accessible" id="category-edit" name="categories[]" multiple="multiple">
                            
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="category">Marque</label>

                        <select style="width: 100%!important;" class="brands-select-edit col-sm-12 select2-hidden-accessible" id="marque" name="brands[]" multiple="multiple">
                            
                            @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name_fr}}</option>
                            @endforeach

                        </select>
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