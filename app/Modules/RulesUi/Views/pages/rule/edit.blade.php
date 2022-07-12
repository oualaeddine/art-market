@extends('layouts.master')


@push('css')


@endpush

@section('content')

    @include('partials.error.error')

    <div class="card">

        <form class="pt-0" action="{{route('admin.coupons.rules.update',$rule->id)}}" method="POST">
                @csrf
                @method('put')
            <div class="card-block">

                <div class="row">

                    <div class="form-group col-6">

                        <label class="form-label" for="min">Min <b class="text-danger">*</b></label>
                        <input
                            type="number"
                            class="form-control"
                            id="min"
                            name="min"
                            value="{{$rule->min}}"
                            required
                        />
                    </div>

                    <div class="form-group col-6">
                        <label class="form-label" for="max">Max <b class="text-danger">*</b></label>
                        <input
                            type="number"
                            class="form-control"
                            id="max"
                            value="{{$rule->max}}"

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
                            value="{{$rule->points}}"

                            name="points"
                            required
                        />
                    </div>


                </div>

            </div>

            <div class="card-footer text-end">
        <button type="submit" class="btn btn-primary">Modifier</button>
        <a href="{{route('admin.coupons.rules.index')}}" type="button" class="btn btn-secondary">Annuler</a>

    </div>

    </form>

    </div>

    {{--
    </div> --}}

    @push('js')



    @endpush



@endsection

