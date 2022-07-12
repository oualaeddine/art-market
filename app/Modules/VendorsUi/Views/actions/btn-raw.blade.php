


<a href="javascript:void(0);">
    <i
        data-bs-toggle="modal"
        onclick="getRawDetailDataVendor({{$id}})"
        data-bs-target="#modals-order_raw_detail"
        data-bs-toggle="tooltip" data-bs-placement="top" title="Détail" class="feather icon-eye f-w-600 f-26 text-c-blue"></i>
</a>

<a href="javascript:void(0);">
    <i
        data-bs-toggle="modal"
        data-status="{{$status}}"
        onclick="orderRawEdit({{$id}})"
        data-bs-target="#modals-slide-in-product-edit-raw"
        data-bs-toggle="tooltip" data-bs-placement="top" title="Modifier" class="feather icon-check-circle f-w-600 f-26 text-c-green"></i>
</a>


       <a href="javascript:;" class="item-edit text-danger waves-effect" data-bs-placement="top" title="supprimer"  data-bs-toggle="modal"
       data-bs-target="#archive-order_raw"  onclick="archiveRawOrder({{$id}})">
       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
          viewBox="0 0 24 24" fill="none" stroke="currentColor"
          stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round"
          class="feather feather-archive font-small-4 mr-50">
         <polyline points="21 8 21 21 3 21 3 8"></polyline>
         <rect x="1" y="3" width="22" height="5"></rect>
         <line x1="10" y1="12" x2="14" y2="12"></line>
       </svg>

       </a>

