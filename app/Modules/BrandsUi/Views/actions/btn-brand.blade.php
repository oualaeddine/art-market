
<a    href="javascript:void(0)"
      data-bs-toggle="modal"
      data-bs-target="#toggle-brand"
      onclick="ToggleBrand({{$id}})"
><i
        data-bs-toggle="tooltip"
        data-bs-placement="top"
        title="Activer/Déactiver"
        class="feather icon-toggle-right f-w-600 f-20 text-c-lite-green"></i>
</a>


<a href="javascript:;"  data-bs-placement="top" title="modifier" data-bs-toggle="modal"
data-bs-target="#modals-edit-brand" onclick="BrandEdit({{$id}})"><i
        class="feather icon-edit f-w-600 f-20 text-c-blue"></i>
</a>

<a href="javascript:;"  data-bs-placement="top" title="supprimer" data-bs-toggle="modal"
   data-bs-target="#delete-brand" onclick="deleteBrand({{$id}})"><i
        class="fa fa-archive f-w-600 f-20 text-c-red"></i>
</a>


