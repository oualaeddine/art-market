@extends('layouts.master')


@push('css')


@endpush

@section('content')

    @include('partials.error.error')

    <div class="card">

        <form class="pt-0" action="{{route('admin.coupons.rules.store')}}" method="POST">
                @csrf
            <div class="card-block">

                <div class="row">

                    <div class="form-group col-6">

                        <label class="form-label" for="min">Min <b class="text-danger">*</b></label>
                        <input
                               type="number"
                               class="form-control"
                               id="min"
                               name="min"
                               required
                        />
                    </div>

                    <div class="form-group col-6">
                        <label class="form-label" for="max">Max <b class="text-danger">*</b></label>
                        <input
                            type="number"
                            class="form-control"
                            id="max"
                            name="max"
                            required
                        />
                    </div>

                    <div class="form-group col-6">
                        <label class="form-label" for="point">Points <b class="text-danger">*</b></label>
                        <input
                            type="number"
                            class="form-control "
                            id="point"
                            name="points"
                            required
                        />
                    </div>


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


    @endpush



@endsection

