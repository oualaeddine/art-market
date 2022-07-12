<a    href="javascript:void(0)"
      data-bs-toggle="modal"
      data-bs-target="#toggle-vendor"
      onclick="ToggleVendor({{$id}})"
><i
        data-bs-toggle="tooltip"
        data-bs-placement="top"
        title="Activer/Déactiver"
        class="feather icon-toggle-right f-w-600 f-20 text-c-lite-green"></i>
</a>

<a href="{{route('admin.vendors.detail',['vendor'=>$id,'type'=>'all'])}}"><i
        data-bs-toggle="tooltip"
        data-bs-placement="top"
        title="Détail"
        class="feather icon-eye f-w-600 f-20 text-c-blue"></i>
</a>

<a
    href="javascript:void(0)"
    data-bs-toggle="modal"
    data-bs-target="#delete-vendor"
    onclick="DeleteVendor({{$id}})"><i

        data-bs-toggle="tooltip"
        data-bs-placement="top"
        title="Archivé"
        class="fa fa-archive f-w-600 f-20 text-c-red"></i>
</a>
