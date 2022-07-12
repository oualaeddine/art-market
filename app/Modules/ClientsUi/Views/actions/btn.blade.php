<a href="{{route('admin.clients.special',$id)}}"><i
        data-bs-toggle="tooltip"
        data-bs-placement="top"
        title="Détail"
        class="feather icon-eye f-w-600 f-20 text-c-blue"></i>
</a>

<a
    href="javascript:void(0)"
    data-bs-toggle="modal"
    data-bs-target="#modals-archive-client"
    onclick="archiveClient({{$id}})"><i

        data-bs-toggle="tooltip"
        data-bs-placement="top"
        title="Archivé"
        class="feather icon-trash f-w-600 f-20 text-c-red"></i>
</a>





