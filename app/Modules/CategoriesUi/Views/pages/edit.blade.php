@extends('layouts.master')


@section('content')

    @include('partials.error.error')

    <div class="card">

        <form class="pt-0" action="{{route('admin.categories.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
            <div class="card-header">
                <h4 class="modal-title">Modifier une catégorie</h4>

            </div>
                <div class="card-block">

                    <div class="row">

                        <div class="form-group col-sm-12 col-md-4">
                            <label class=" mb-1">Nom en français</label> <b class="text-danger">*</b>
                            <input
                                type="text"
                                class="form-control mt-1"
                                id="name_fr"
                                name="name_fr"
                                placeholder=""
                                aria-label=""
                                value="{{$category->name_fr}}"
                                required
                            />
                        </div>


                        <div class="form-group col-sm-12 col-md-4">
                            <label class=" mb-1">Nom en arabe</label> <b class="text-danger">*</b>
                            <input
                                dir="rtl"
                                type="text"
                                class="form-control mt-1"
                                id="name_ar"
                                name="name_ar"
                                placeholder=""
                                aria-label=""
                                value="{{$category->name_ar}}"
                                required
                            />
                        </div>

                        <div class="form-group col-md-4">
                            <label class="form-label" for="icon">Icon</label>
                            <input type="file" name="icon" id="icon" class="form-control ">
                        </div>

                    </div>


                    <div class="row">
                        <div class="form-group col-sm-12 col-md-6">
                            <label class="mb-1">Actif</label> <b class="text-danger">*</b>
                            <select name="is_active" id="is_active" class="form-control" required>

                               <option value="1" @if (1 == $category->is_active) selected @endif>Oui</option>
                               <option value="0" @if (0 == $category->is_active) selected @endif>Non</option>

                            </select>
                        </div>

                        <div class="form-group col-sm-12 col-md-6">
                            <label class="mb-1">Catégorie principale</label>
                            <select name="parent_id" id="parent_id" class="form-control">
                            <option value="" disabled="" selected >Choisir une catégorie</option>
                               @foreach ($categories as $item)
                               <option value="{{$item->id}}" @if ($item->id == $category->parent_id) selected @endif>{{$item->name_fr}}</option>
                               @endforeach
                            </select>
                        </div>

                    </div>


            </div>


    <div class="card-footer text-end">
        <button type="submit" class="btn btn-success">Modifier</button>
    </div>

    </form>

    </div>

    {{--
    </div> --}}


@endsection

