

    <a href="{{route('admin.coupons.rules.edit',$id)}}" class="item-edit text-info waves-effect" data-bs-placement="top" title="modifier">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
             viewBox="0 0 24 24" fill="none" stroke="currentColor"
             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
             class="feather feather-edit font-small-4">
            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
            </path>
            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
            </path>
        </svg>
       </a>

       <a href="javascript:;" class="item-edit text-danger waves-effect" data-bs-placement="top" title="supprimer" data-bs-toggle="modal"
       data-bs-target="#delete-rule" onclick="deleteRule({{$id}})">
       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
          viewBox="0 0 24 24" fill="none" stroke="currentColor"
          stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round"
          class="feather feather-archive font-small-4 mr-50">
         <polyline points="21 8 21 21 3 21 3 8"></polyline>
         <rect x="1" y="3" width="22" height="5"></rect>
         <line x1="10" y1="12" x2="14" y2="12"></line>
       </svg>

       </a>

