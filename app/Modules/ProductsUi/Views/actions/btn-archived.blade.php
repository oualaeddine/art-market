

{{--<a href="javascript:;" class="item-edit text-info waves-effect" data-bs-placement="top" title="Images" data-bs-toggle="modal"--}}
{{--data-bs-target="#images-product" onclick="ShowImages({{$id}})">--}}
{{-- <i class="feather icon-image f-w-600 f-20 -mt-1 text-c-green"></i>--}}
{{--</a>--}}


{{--<a href="{{route('admin.products.edit',$id)}}" class="item-edit text-info waves-effect" data-bs-placement="top" title="Modifier"><i--}}
{{--        class="feather icon-edit f-w-600 f-20 -mt-1 text-c-blue"></i>--}}
{{--</a>--}}

<a  href="javascript:;" class="item-edit text-danger waves-effect"  data-bs-placement="top" title="Restaurer" data-bs-toggle="modal"
    data-bs-target="#restore-product" onclick="RestoreProduct({{$id}})"><i
        class="feather icon-rotate-ccw f-w-600 f-20 -mt-1 text-c-green"></i>
</a>
