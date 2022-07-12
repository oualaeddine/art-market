
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
                                data-bs-target="#modals-delete-client-coupon{{$coupon->id}}">
                                <i data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="Archivé"
                                class="fa fa-archive f-w-600 f-20 text-c-red"></i>
                            </a>
                        </td>
                    </tr>

                    @include('ClientsUi::modals.coupon.delete')

                @endforeach

                </tbody>

            </table>

        @endif
    </div>
<div class="card-footer text-start">
    <a href="{{route('admin.clients.archived.coupons',['client'=>$client->id])}}" class="btn btn-danger waves-effect mb-2"> Coupons archivés
    </a>
</div>

{{-- </div> --}}
