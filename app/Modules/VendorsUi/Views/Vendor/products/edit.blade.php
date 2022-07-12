@extends('layouts.master')


@push('css')

    @include('layouts.extra.css.select2')

@endpush

@section('content')

    @include('partials.error.error')

    <div class="card">

        <form class="pt-0" action="{{route('vendor.products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
        <div class="card-block">

            <div class="row">

                <div class="form-group col-6">

                    <label class="form-label" for="name_ar">Nom ar <b class="text-danger">*</b></label>
                    <input dir="rtl"
                            type="text"
                            class="form-control "
                            id="name_ar"
                            name="name_ar"
                            value="{{$product->name_ar}}"
                            placeholder="إسم المنتج"
                            aria-label="إسم المنتج"
                            required
                    />
                </div>

                <div class="form-group col-6">
                    <label class="form-label" for="name_fr">Nom fr <b class="text-danger">*</b></label>
                    <input
                            type="text"
                            class="form-control "
                            id="name_fr"
                            value="{{$product->name_fr}}"
                            name="name_fr"
                            placeholder="Nom de produit"
                            aria-label="Nom de produit"
                            required
                    />
                </div>


            </div>



            <div class="row">

                <div class="form-group col-6">
                    <label class="form-label" for="desc_ar">Description ar </label>
                    <textarea dir="rtl"
                            type="text"
                            class="form-control "
                            id="desc_ar"
                            name="desc_ar"

                            placeholder="وصف المنتج"
                            aria-label="وصف منتج"
                            cols="20" rows="3"

                    >{{$product->desc_ar}}</textarea>
                </div>

                <div class="form-group col-6">
                    <label class="form-label" for="desc_fr">Description fr </label>
                    <textarea
                            type="text"
                            class="form-control "
                            id="desc_fr"
                            name="desc_fr"
                            placeholder="Description de produit"
                            aria-label="Description de produit"
                            cols="20" rows="3"

                    >{{$product->desc_fr}}</textarea>
                </div>


            </div>




            <div class="row">

                <div class="form-group col-md-3">
                    <label class="form-label" for="slug">Slug <b class="text-danger">*</b></label>
                    <input
                            type="text"
                            class="form-control "
                            id="slug"
                            name="slug"
                            value="{{$product->slug}}"
                            placeholder="Slug de produit"
                            aria-label="Slug de produit"
                            required
                    />
                </div>

                <div class="form-group col-md-3">
                    <label class="form-label" for="ref">Ref <b class="text-danger">*</b></label>
                    <input
                            type="text"
                            class="form-control "
                            id="ref"
                            name="ref"
                            value="{{$product->ref}}"
                            placeholder="ref de produit"
                            aria-label="ref de produit"
                            required
                    />
                </div>

                <div class="form-group col-md-6">
                    <label for="category">Catégorie</label>

                    <select style="width: 100%!important;" class="js-example-basic-single col-sm-12 select2-hidden-accessible" id="category" name="categories[]" multiple="multiple">

                        @foreach($categories as $category)
                            <option value="{{$category->id}}" @if (in_array($category->id,$selected_categories)) selected @endif >{{$category->name_fr}}</option>
                        @endforeach

                    </select>
                </div>

            </div>

            <div class="row">

                <div class="form-group col-md-3">
                    <label class="form-label" for="price">prix <b class="text-danger">*</b></label>
                    <input
                            min="0"
                            required
                            type="number"
                            class="form-control"
                            id="price"
                            value="{{$product->price}}"
                            name="price"
                            placeholder=""
                            aria-label=""
                    />
                </div>

                <div class="form-group col-md-3">
                    <label class="form-label" for="price_old">Ancien prix </label>
                    <input
                            min="0"

                            type="number"
                            class="form-control "
                            id="price_old"
                            value="{{$product->price_old}}"
                            name="price_old"
                            placeholder=""
                            aria-label=""
                    />
                </div>

                <div class="form-group col-md-6">
                    <label for="category">Marque</label>

                    <select style="width: 100%!important;" class="brands-select col-sm-12 " id="marque" name="brands[]" multiple="multiple">

                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}" @if (in_array($brand->id,$selected_brands)) selected @endif >{{$brand->name_fr}}</option>
                        @endforeach

                    </select>
                </div>

            </div>


             <div class="row">
                 <div class="form-group col-md-3">
                     <label class="form-label" for="discount">Remise </label>
                     <input

                         min="0"
                         max="100"
                         type="number"
                         class="form-control "
                         id="discount"
                         value="{{$product->discount}}"
                         name="discount"
                         placeholder="ex : 1"
                         aria-label="ex : 1"
                     />
                 </div>

                 <div class="form-group col-md-3">
                     <label class="form-label" for="discount">Transport  <b class="text-danger"></b></label>
                     <input
                         type="number"
                         value="{{$product->shipping}}"
                         class="form-control "
                         id="shipping"
                         name="shipping"
                     />

                 </div>
                <div class="form-group col-md-3">
                    <label class="form-label" for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control ">
                </div>




                 <div class="form-group col-md-3">
                     <label class="form-label" for="family_edit">Actif <b class="text-danger">*</b></label>

                     <select  required style="width: 100%!important;" class="col-sm-12  form-control"  name="is_active">
                         <option value="0" @if(!$product->is_active) selected @endif>Non</option>
                         <option value="1" @if($product->is_active) selected @endif>Oui</option>

                     </select>
                 </div>

             </div>




        </div>
    <div class="card-footer text-end">
        <button type="submit" class="btn btn-primary">Modifier</button>
        <a href="{{route('admin.products.index')}}" type="button" class="btn btn-secondary">Annuler</a>

    </div>

    </form>

    </div>

    {{--
    </div> --}}

    @push('js')

    @include('layouts.extra.js.select2')

    <script>
        $(document).ready(function() {

                        $('.js-example-basic-single').select2({
                            placeholder: "Sélectionnez les catégories",
                            allowClear: true
                        });

                        $('.brands-select').select2({
                            placeholder: "Sélectionnez les marques",
                            allowClear: true
                        });

                        $('#name_fr').on('input',function(){
                            var name = $(this).val();

                            var Text = name.toLowerCase();
                                Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');

                                $('#slug').val(Text);
                        });

        });
    </script>

    @endpush



@endsection

