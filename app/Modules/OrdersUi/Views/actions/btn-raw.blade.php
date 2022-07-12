


<a href="javascript:void(0);"  data-bs-toggle="modal"
   onclick="getDetailData({{$id}})"
   data-bs-target="#modals-order_raw_detail"
   data-bs-toggle="tooltip" data-bs-placement="top" title="Détail">
    <i
        class="feather icon-eye f-w-600 f-20 text-c-blue"></i>
</a>

<a href="javascript:void(0);" data-bs-toggle="modal"
   data-status="{{$status}}"
   onclick="orderEdit({{$id}})"
   data-bs-target="#modals-slide-in-product-edit"
   data-bs-toggle="tooltip" data-bs-placement="top" title="Modifier">
    <i
         class="feather icon-check-circle f-w-600 f-20 text-c-green"></i>
</a>

<a href="javascript:;"  data-bs-placement="top" title="Archiver"  data-bs-toggle="modal"
   data-bs-target="#archive-order_raw"  onclick="archiveOrder({{$id}})">
    <i
         class="fa fa-archive f-w-600 f-20 text-c-red"></i>
</a>


