

@if(!$accepted_at)
    <a href="javascript:void(0)" data-bs-toggle="modal"
       data-bs-target="#modals-accept-client-file"

       data-bs-toggle="tooltip"
       data-bs-placement="left"
       title="Accepté "

       onclick="AcceptClientFile({{$id}})"><i
            class="feather icon-thumbs-up f-w-600 f-20 text-c-blue"></i>
    </a>

@endif
@if(!$approved_at)
    <a href="javascript:void(0)"
       data-bs-toggle="modal"
       data-bs-target="#modals-approve-client-file"

       data-bs-toggle="tooltip"
       data-bs-placement="left"
       title="Approuvé"
       onclick="ApproveClientFile({{$id}})"><i
            class="feather icon-check-square f-w-600 f-20 text-c-blue"></i>
    </a>
@endif

    <a href="{{asset($url)}}" target="_blank"
       data-bs-toggle="tooltip"
       data-bs-placement="top"
       title="Voir"><i
            class="feather icon-eye f-w-600 f-20 text-c-green"></i>
    </a>

    <a href="{{route('admin.clients.download-file',['client_file'=>$id])}}"
       data-bs-toggle="tooltip"
       data-bs-placement="top"
       title="Télécharger"><i
            class="feather icon-download f-w-600 f-20 text-c-green"></i>
    </a>

    <a href="{{route('admin.clients.edit-file',['client_file'=>$id])}}"
       data-bs-toggle="tooltip"
       data-bs-placement="top"
       title="Modifier"><i
            class="feather icon-edit f-w-600 f-20 text-c-purple"></i>
    </a>

    <a href="javascript:void(0)" data-bs-toggle="modal"
       data-bs-toggle="tooltip"
       data-bs-placement="top"
       title="Supprimer"
       data-bs-target="#modals-delete-client-file" onclick="DeleteClientFile({{$id}})"><i
            class="feather icon-trash-2 f-w-600 f-20 text-c-red"></i>
    </a>
