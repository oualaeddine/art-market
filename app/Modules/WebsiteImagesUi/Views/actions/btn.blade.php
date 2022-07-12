

<a    href="javascript:void(0)"
      data-bs-toggle="modal"
      data-bs-target="#toggle-image"
      onclick="ToggleImage({{$id}})"
><i
        data-bs-toggle="tooltip"
        data-bs-placement="top"
        title="Activer/Déactiver"
        class="feather icon-toggle-right f-w-600 f-20 text-c-lite-green"></i>
</a>

<a   href="{{route('admin.website-images.edit',$id)}}"
><i
        data-bs-toggle="tooltip"
        data-bs-placement="top"
        title="Modifier"
        class="feather icon-edit f-w-600 f-20 text-c-blue"></i>
</a>



