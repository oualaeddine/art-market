
{{--@include('ClientsUi::modals.file.edit')--}}


    <div class="{{-- card-block --}} table-border-style">
        @if($client_coupons->isEmpty())
            <div class="row text-center">

                <span>Aucun coupon n'a été trouvé</span>
            </div>
        @else
            <table class="table table-inverse" id="coupons_list">
                <thead>
                <tr>
                    <th></th>
                    <th>Code</th>
                    <th>Valuer </th>
                    <th>Action </th>
                </tr>
                </thead>
                <tbody>

                @foreach ($client_coupons as $coupon)
                    <tr>
                        <td></td>
                        <td>{{$coupon->coupon}}</td>
                        <td>{{$coupon->value .' DA'}}</td>
                        <td><a
                                href="javascript:void(0)"
                                data-bs-toggle="modal"
                                data-bs-target="#modals-restore-client-coupon{{$coupon->id}}">
                                <i data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="Archivé"
                                class="feather icon-rotate-ccw f-w-600 f-20 text-c-green"></i>
                            </a>
                        </td>
                    </tr>

                    @include('ClientsUi::modals.coupon.unarchive_coupon')

                @endforeach

                </tbody>

            </table>

        @endif
    </div>

    <div class="card-footer text-end">

    </div>

{{-- </div> --}}
