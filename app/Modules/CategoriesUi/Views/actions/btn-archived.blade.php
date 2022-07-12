{{--<a href="{{route('admin.categories.edit',$id)}}" class="item-edit text-info waves-effect" data-bs-placement="top" title="modifier"><i--}}
{{--        class="feather icon-edit f-w-600 f-20 -mt-1 text-c-blue"></i>--}}
{{--</a>--}}


<a href="javascript:;" class="item-edit text-danger waves-effect" data-bs-placement="top" title="restaurer" data-bs-toggle="modal"
data-bs-target="#modals-restore-category" onclick="RestoreCategories({{$id}})"><i
        class="feather icon-rotate-ccw f-w-600 f-20 -mt-1 text-c-green"></i>
</a>


