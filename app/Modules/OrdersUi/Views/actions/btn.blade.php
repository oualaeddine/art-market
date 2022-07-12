<a href="javascript:void(0);" data-bs-toggle="modal"
   onclick="getDetailData({{$id}})"
   data-bs-target="#modals-order_detail"
   data-bs-toggle="tooltip" data-bs-placement="top" title="Détail">
    <i
        class="feather icon-eye f-w-600 f-20 text-c-green"></i>
</a>

@if($status!=='completed')
<a  href="javascript:;"  id="edit-order{{$id}}" data-bs-toggle="modal"
    data-bs-target="#modals-slide-in-product-edit" data-status="{{$status}}" onclick="orderEdit({{$id}})" data-bs-placement="top" title="Modifier">
    <i class="feather icon-edit text-c-blue  f-w-600 f-20 "></i>
</a>
@endif
<a  href="javascript:;" data-bs-placement="top" title="Archiver"  data-bs-toggle="modal"
    data-bs-target="#archive-order"  onclick="archiveOrder({{$id}})">
    <i class="fa fa-archive text-c-red  f-w-600 f-20"></i>
</a>
