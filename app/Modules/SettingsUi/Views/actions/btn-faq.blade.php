<a    href="javascript:void(0)"
      data-bs-toggle="modal"
      data-bs-target="#toggle-faq"
      onclick="ToggleFaq({{$id}})"
><i
        data-bs-toggle="tooltip"
        data-bs-placement="top"
        title="Activer/Déactiver"
        class="feather icon-toggle-right f-w-600 f-20 text-c-lite-green"></i>
</a>

<a href="javascript:void(0)"
   data-bs-toggle="modal"
   data-bs-target="#modals-edit-faq"
   onclick="EditFaq({{$id}})">
    <i class="feather icon-edit f-w-600 f-20 text-c-blue"></i>
</a>

<a href="javascript:void(0)"
   data-bs-toggle="modal"
   data-bs-target="#modals-delete-faq"
   onclick="DeleteFaq({{$id}})">
    <i class="feather icon-trash f-w-600 f-20 text-c-red"></i>
</a>
