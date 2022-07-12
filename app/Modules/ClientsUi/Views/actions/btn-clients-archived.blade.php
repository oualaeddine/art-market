<a href="javascript:void(0)" data-bs-toggle="modal"
   data-bs-target="#modals-restore-client"
   onclick="RestoreClient({{$id}})"

   data-bs-toggle="tooltip"
   data-bs-placement="top"
   title="Restaurer le client"
><i
        class="feather icon-rotate-ccw f-w-600 f-20 text-c-purple"></i>
</a>

{{--<a href="{{route('admin.clients.special',$id)}}"><i--}}
{{--        data-bs-toggle="tooltip"--}}
{{--        data-bs-placement="top"--}}
{{--        title="Détail du client"--}}
{{--        class="feather icon-eye f-w-600 f-20 text-c-blue"></i>--}}
{{--</a>--}}

<a href="javascript:void(0)"
   data-bs-toggle="modal"
   data-bs-target="#modals-delete-client"
   onclick="DeleteClient({{$id}})"

   data-bs-toggle="tooltip"
   data-bs-placement="top"
   title="Supprimer le client"
><i
        class="feather icon-trash-2 f-w-600 f-20 text-c-red"></i>
</a>


