@extends('layouts.master')

@push('css')

    @include('layouts.extra.css.select2')

    <style>
        .card .card-header h5:after {
            display: none !important;
        }
    </style>
    <style>
        .select2-selection__choice {
            background-color: #5897fb !important;
            border: none !important;
        }
        .select2-selection__choice__remove {
            color: white !important;
        }
        .select2-selection__choice__remove:hover {
            background: darkblue !important;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            display: inline-flex;
            align-items: center;
        }
    </style>

@endpush

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif


    <div class="row">
        <div class="col-lg-12 col-xl-6">
            <!-- Date card start -->
            <div class="card">
                <div class="card-header">
                    <h5>Rôles</h5>
                    <span>Add class of <code>.date</code> with <code>data-mask</code> attribute</span>
                </div>
                <div class="card-block">
                    <form class="pt-0" action="{{route('admin.users.update-roles',['user'=>$user->id])}}"
                          method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <select required style="width: 100%!important;"
                                    class="js-example-basic-singlex col-sm-12 form-control  select2-hidden-accessible"
                                    id="role" name="roles[]" multiple="multiple">

                                @foreach ($roles as $role)
                                    <option
                                        value="{{$role->id}}" {{ in_array($role->id,$selected_roles)?'selected':''}}> {{$role->name}}</option>
                                @endforeach


                            </select>
                            <div class="row container  mt-4">
                                <button type="submit" class="btn btn-primary btn-sm  waves-effect waves-light ">
                                    Sauvegarder
                                </button>
                            </div>

                        </div>


                    </form>
                </div>
            </div>
            <!-- Date card end -->
        </div>
        <div class="col-lg-12 col-xl-6">
            <!-- Time card start -->
            <div class="card">
                <div class="card-header">
                    <h5>Permissions</h5>
                    <span>Add class of <code>.hour</code> with <code>data-mask</code> attribute</span>
                </div>
                <div class="card-block">
                    <div>
                        @foreach($permissions as $role)
                            <div class="card-header">
                                <h5> Role : {{$role->name}}</h5>
                                <br>
                                <br>
                                <h5> Permissions :</h5>

                            </div>

                            @foreach($role->permissions as $permission)
                                <span class="badge badge-success">{{$permission->name}}</span>
                            @endforeach
                            <hr>
                        @endforeach

                    </div>
                </div>
            </div>
            <!-- Time card end -->
        </div>
    </div>

    </form>

    @push('js')
        @include('layouts.extra.js.select2')

        <script>
            $(document).ready(function () {
                $('.js-example-basic-singlex').select2({
                    placeholder: "Sélectionnez les rôles",
                    allowClear: true
                });
            });
        </script>
    @endpush

@endsection
