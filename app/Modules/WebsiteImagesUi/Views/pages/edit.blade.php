@extends('layouts.master')

@push('css')

@include('layouts.extra.css.select2')

@endpush


@section('content')

    @include('partials.error.error')

    <div class="card">

        <form class="pt-0" action="{{route('admin.website-images.update',$images->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
            <div class="card-header">
                <h4 class="modal-title">Modifier une image</h4>

            </div>
                <div class="card-block">

                    <div class="row">

                        <div class="form-group col-sm-12 col-md-4">
                            <label class=" mb-1">Nom</label>
                            <input
                                type="text"
                                class="form-control mt-1"
                                id="name"
                                name="name"
                                placeholder=""
                                aria-label=""
                                readonly
                                value="{{$images->name}}"
                                required
                            />
                        </div>


                            <div class="form-group col-sm-12 col-md-4">
                                <label class=" mb-1">Titre</label> <b class="text-danger">*</b>
                                <input
                                    type="text"
                                    class="form-control mt-1"
                                    id="title"
                                    name="title"
                                    placeholder=""
                                    aria-label=""
                                    value="{{$images->title}}"
                                    required
                                />
                            </div>


                        <div class="form-group col-sm-12 col-md-4">
                            <label class=" mb-1">Titre principal</label> <b class="text-danger">*</b>
                            <input
                                type="text"
                                class="form-control mt-1"
                                id="main_title"
                                name="main_title"
                                placeholder=""
                                aria-label=""
                                value="{{$images->main_title}}"
                                required
                            />
                        </div>


                            <div class="form-group col-sm-12 col-md-4">
                                <label class=" mb-1">Sous-Titre</label> <b class="text-danger">*</b>
                                <input
                                    type="text"
                                    class="form-control mt-1"
                                    id="sub_title"
                                    name="sub_title"
                                    placeholder=""
                                    aria-label=""
                                    value="{{$images->sub_title}}"
                                    required
                                />
                            </div>


                        <div class="form-group col-sm-12 col-md-4">
                            <label class="mb-1">Langue</label>
{{--                             <select name="lang" id="lang" aria-readonly="true" class="form-control" required>

                               <option value="fr" @if ('fr' == $images->lang) selected @endif>fr</option>
                               <option value="ar" @if ('ar' == $images->lang) selected @endif>ar</option>

                            </select> --}}
                            <input type="text" readonly name="lang" value="{{$images->lang}}" class="form-control mt-1" id="">
                        </div>


                            <div class="form-group col-sm-12 col-md-4">
                                <label class="mb-1">Actif</label> <b class="text-danger">*</b>
                                <select name="is_active" id="is_active" class="form-control" required>

                                <option value="1" @if (1 == $images->is_active) selected @endif>Oui</option>
                                <option value="0" @if (0 == $images->is_active) selected @endif>Non</option>

                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="form-label" for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control ">
                            </div>

                        <div class="form-group col-sm-12 col-md-4 link_input">
                            <label class="mb-1">Lien</label> <b class="text-danger">*</b>
                            <input  type="text" class="form-control" name="link" value="{{$images->link}}">
                        </div>

                    </div>




                        <div class="row">


{{--                            <div class="form-group col-sm-12 col-md-4">--}}
{{--                                <label class="mb-1">Type</label> <b class="text-danger">*</b>--}}
{{--                                <select name="type" id="type" required class="form-control">--}}
{{--                                        <option value="product" @if ('product' == $images->type) selected @endif>produit</option>--}}
{{--                                        <option value="category" @if ('category' == $images->type) selected @endif>Catégorie</option>--}}
{{--                                        <option value="link" @if ('link' == $images->type) selected @endif>Lien</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}

{{--                            @if ($images->type == 'product')--}}

{{--                                <div class="form-group col-sm-12 col-md-4  select_inputs">--}}
{{--                                    <label class="mb-1">Lien</label> <b class="text-danger">*</b>--}}
{{--                                    <select name="product_id" id="product_id" class="form-control">--}}
{{--                                        @foreach ($products as $p)--}}
{{--                                            <option value="{{$p->slug}}" @if ($p->slug == $images->product_id) selected @endif>{{$p->slug}}</option>--}}
{{--                                        @endforeach--}}

{{--                                    </select>--}}
{{--                                </div>--}}

{{--                            @endif--}}


{{--                            @if ($images->type == 'category')--}}

{{--                                <div class="form-group col-sm-12 col-md-4 select_inputs">--}}
{{--                                    <label class="mb-1">Lien</label> <b class="text-danger">*</b>--}}
{{--                                    <select name="product_id" id="product_id" class="form-control">--}}
{{--                                        @foreach ($categories as $p)--}}
{{--                                        <option value="{{$p->name_fr}}" @if ($p->name_fr == $images->product_id) selected @endif>{{$p->name_fr}}</option>--}}
{{--                                        @endforeach--}}

{{--                                    </select>--}}
{{--                                </div>--}}

{{--                            @endif--}}

{{--                            @if ($images->type == 'link')--}}



{{--                            @endif--}}






                        </div>





            </div>


    <div class="card-footer text-end">
        <button type="submit" class="btn btn-success">Modifier</button>
    </div>

    </form>

    </div>

    {{--
    </div> --}}

    @push('js')

      @include('layouts.extra.js.select2')

    <script>

            $('#type').on('change', function () {



                var id = $(this).find('option:selected').val();
                if(id==='link'){
                    $('.select_inputs').addClass('d-none')
                    $('.link_input').removeClass('d-none')


                }else {
                    $('.select_inputs').removeClass('d-none')
                    $('.link_input').addClass('d-none')

                    $('#product_id').val(null).trigger('change');
                    var url_coumne = '{{ route("admin.website-images.get_link",":id") }}';

                    url_coumne = url_coumne.replace(':id', id);

                    $('#product_id').select2({
                        /* placeholder: "Start typing ...", */
                        theme: 'bootstrap4',
                        ajax: {
                            url: url_coumne,
                            dataType: 'json',
                            // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                            processResults: function (data) {
                                return {
                                    results: data
                                };
                            },

                        }
                    });
                }


            });
    </script>

    @endpush


@endsection

