
<a href="{{route('admin.users.detail',['user'=>$id])}}"
   data-bs-toggle="tooltip"
   data-bs-placement="top"
   title="Detail"
>
    <i class="icon feather icon-eye f-w-600 f-16 m-r-15  text-c-blue"></i>
</a>

<a href="javascript:void(0)" data-bs-toggle="modal"
   data-bs-toggle="tooltip"
   data-bs-placement="top"
   title="Modifier"
   data-bs-target="#modals-edit-user" onclick="userEdit({{$id}})">
    <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i>
</a>

@if(!$deleted_at)
    <a href="javascript:void(0)" data-bs-toggle="modal"
       data-bs-target="#archive-user" onclick="archiveUser({{$id}})">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive f-16 text-c-red"><polyline points="21 8 21 21 3 21 3 8"></polyline><rect x="1" y="3" width="22" height="5"></rect><line x1="10" y1="12" x2="14" y2="12"></line></svg>

    </a>
@else
    <a href="javascript:void(0)" data-bs-toggle="modal"
       data-bs-toggle="tooltip"
       data-bs-placement="top"
       title="Dearchiver"
       data-bs-target="#unarchive-user" onclick="unarchiveUser({{$id}})"><i
            class="feather icon-rotate-ccw f-w-600 f-16 text-c-blue"></i>
    </a>
@endif


@if(!$blocked_at)

    <a href="javascript:void(0)" style="margin-left: 15px" data-bs-toggle="modal"
       data-bs-toggle="tooltip"
       data-bs-placement="top"
       title="Blocker"
       data-bs-target="#modals-block-user" onclick="blockUser({{$id}})">
        <i class="icon feather icon-lock f-w-600 f-16 m-r-15 text-c-red"></i>
    </a>
@else
    <a href="javascript:void(0)" style="margin-left: 15px" data-bs-toggle="modal"
       data-bs-toggle="tooltip"
       data-bs-placement="top"
       title="Deblocker"
       data-bs-target="#modals-unblock-user" onclick="unblockUser({{$id}})">
        <i class="icon feather icon-unlock f-w-600 f-16 m-r-15 text-c-blue"></i>
    </a>
@endif


{{--<a href="javascript:void(0)" data-bs-toggle="modal"--}}
{{--   data-bs-target="#delete-user" onclick="deleteUser({{$id}})"><i--}}
{{--        class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i>--}}
{{--</a>--}}
