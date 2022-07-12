@extends('layouts.master')

@push('css')

    @include('layouts.extra.css.select2')

@endpush


@section('content')

    @include('partials.error.error')

    <div class="card">
        <form action="{{route('admin.orders.coupons.store',$order->id)}}" method="POST">
            @csrf
        <div class="card-block table-border-style table-responsive">
                @csrf

                <div class="row mt-4 mb-4">

                    <div class="col-12">
                        <label class="form-control-label">Famille de coupon</label>
                        <select class="form-select form-control" name="family_id" id="family_id">
                            <option value=""  selected>Sélectionner un famille</option>

                            @foreach ($families as $item)
                                <option value="{{$item->id}}">{{$item->name.' | '.$item->value .' DA'}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
        </div>
            <div class="card-footer text-end">

                <button type="submit" class="btn waves-effect waves-light btn-success">Validez</button>

            </div>
        </form>
    </div>


    @push('js')
        @include('layouts.extra.js.select2')
    @endpush

@endsection
