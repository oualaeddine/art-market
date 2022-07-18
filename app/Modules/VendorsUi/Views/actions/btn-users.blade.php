
<a  href="javascript:void(0)"
    data-bs-toggle="modal"
    data-bs-target="#modals-edit-vendor-user"
    onclick="EditVendorUser({{$id}})"

><i
        title="Modifier"    data-bs-placement="top"   data-bs-toggle="tooltip"

        class="feather icon-edit f-w-600 f-20 text-c-blue"></i>
</a>
@if($roles[0]['id']!=2)


<a
    href="javascript:void(0)"
    data-bs-toggle="modal"
    data-bs-target="#delete-vendor-user"
    onclick="DeleteVendorUser({{$id}})"><i

        data-bs-toggle="tooltip"
        data-bs-placement="top"
        title="Supprimer"
        class="feather icon-trash f-w-600 f-20 text-c-red"></i>
</a>
@endif
