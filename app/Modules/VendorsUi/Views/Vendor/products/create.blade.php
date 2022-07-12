@extends('layouts.master')


@push('css')

    @include('layouts.extra.css.select2')

@endpush

@section('content')

    @include('partials.error.error')

    <div class="card">

        <form class="pt-0" action="{{route('vendor.products.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
        <div class="card-block">

            <div class="row">

                <div class="form-group col-6">

                    <label class="form-label" for="name_ar">Nom ar <b class="text-danger">*</b></label>
                    <input dir="rtl"
                            type="text"
                            value="{{old('name_ar')}}"
                            class="form-control "
                            id="name_ar"
                            name="name_ar"
                            placeholder="إسم المنتج"
                            aria-label="إسم المنتج"
                            required
                    />
                </div>

                <div class="form-group col-6">
                    <label class="form-label" for="name_fr">Nom fr <b class="text-danger">*</b></label>
                    <input
                            type="text"
                            class="form-control"
                            value="{{old('name_fr')}}"
                            id="name_fr"
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
                            class="form-control"

                            id="desc_ar"
                            name="desc_ar"
                            placeholder="وصف المنتج"
                            aria-label="وصف منتج"
                            cols="20" rows="3"

                    >{{old('desc_ar')}}</textarea>
                </div>

                <div class="form-group col-6">
                    <label class="form-label" for="desc_fr">Description fr </label>
                    <textarea
                            type="text"
                            class="form-control"

                            id="desc_fr"
                            name="desc_fr"
                            placeholder="Description de produit"
                            aria-label="Description de produit"
                            cols="20" rows="3"

                    >{{old('desc_fr')}}</textarea>
                </div>


            </div>

            <div class="row">

                <div class="form-group col-md-3">
                    <label class="form-label" for="slug">Slug <b class="text-danger">*</b></label>
                    <input
                            type="text"
                            class="form-control"
                            value="{{old('slug')}}"
                            id="slug"
                            name="slug"
                            placeholder="Slug de produit"
                            aria-label="Slug de produit"
                            required
                    />
                </div>

                <div class="form-group col-md-3">
                    <label class="form-label" for="ref">Ref <b class="text-danger">*</b></label>
                    <input
                            type="text"
                            class="form-control"
                            id="ref"
                            value="{{old('ref')}}"
                            name="ref"
                            placeholder="ref de produit"
                            aria-label="ref de produit"
                            required
                    />
                </div>

                <div class="form-group col-md-6">
                    <label for="category">Catégorie</label>

                    <select style="width: 100%!important;" class="js-example-basic-single col-sm-12 select2-hidden-accessible" id="category" name="categories[]" multiple="multiple">

                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name_fr}}</option>
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
                            value="{{old('price')}}"
                            class="form-control"
                            id="price"
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
                            value="{{old('price_old')}}"
                            class="form-control "
                            id="price_old"
                            name="price_old"
                            placeholder=""
                            aria-label=""
                    />
                </div>

                <div class="form-group col-md-6">
                    <label for="category">Marque</label>

                    <select style="width: 100%!important;" class="brands-select col-sm-12 " id="marque" name="brands[]" multiple="multiple">

                        @foreach($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->name_fr}}</option>
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
                            value="{{old('discount')}}"
                            class="form-control "
                            id="discount"
                            name="discount"
                            placeholder="ex : 1"
                            aria-label="ex : 1"
                    />
                </div>

                 <div class="form-group col-md-3">
                     <label class="form-label" for="discount">Transport  <b class="text-danger"></b></label>
                     <input
                         type="number"
                         value="{{old('shipping')}}"
                         class="form-control "
                         id="shipping"
                         name="shipping"

                     />

                 </div>
                <div class="form-group col-md-3">
                    <label class="form-label" for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control ">
                </div>

{{--                 <div class="form-group col-md-3">--}}
{{--                     <label class="form-label" for="family_edit">Actif <b class="text-danger">*</b></label>--}}

{{--                     <select  required style="width: 100%!important;" class="col-sm-12  form-control"  name="is_active">--}}
{{--                         <option value="">Sélectionner un état</option>--}}
{{--                         <option value="0">Non</option>--}}
{{--                         <option value="1">Oui</option>--}}

{{--                     </select>--}}
{{--                 </div>--}}

             </div>




        </div>
    <div class="card-footer text-end">
        <button type="submit" class="btn btn-success">Ajouter</button>
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

