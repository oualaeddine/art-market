
<a href="{{route('admin.client-file_type.edit',['client_file_type'=>$id])}}"
   data-bs-toggle="tooltip"
   data-bs-placement="top"
   title="Modifier"><i
        class="feather icon-edit f-w-600 f-20 text-c-green"></i>
</a>

<a href="javascript:void(0)" data-bs-toggle="modal"
   data-bs-toggle="tooltip"
   data-bs-placement="top"
   title="Supprimer"
   data-bs-target="#delete-client-file_type" onclick="deleteClientFileType({{$id}})"><i
        class="feather icon-trash-2 f-w-600 f-20 text-c-red"></i>
</a>

