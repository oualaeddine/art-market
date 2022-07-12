@if(auth()->guard('vendor')->id()!=$id)
<a  href="{{route('vendor.users.edit',['user'=>$id])}}"

><i
        title="Modifier"    data-bs-placement="top"   data-bs-toggle="tooltip"

        class="feather icon-edit f-w-600 f-20 text-c-blue"></i>
</a>
@endif

@if($roles[0]['id']!=2)
<a    href="javascript:void(0)"
      data-bs-toggle="modal"
      data-bs-target="#toggle-user"
      onclick="ToggleUser({{$id}})"
><i
        data-bs-toggle="tooltip"
        data-bs-placement="top"
        title="Activer/Déactiver"
        class="feather icon-toggle-right f-w-600 f-20 text-c-lite-green"></i>
</a>


<a
    href="javascript:void(0)"
    data-bs-toggle="modal"
    data-bs-target="#delete-vendor-user"
    onclick="DeleteUser({{$id}})"><i

        data-bs-toggle="tooltip"
        data-bs-placement="top"
        title="Archivé"
        class="feather icon-trash f-w-600 f-20 text-c-red"></i>
</a>


@endif
