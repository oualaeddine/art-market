
<a    href="javascript:void(0)"
      data-bs-toggle="modal"
      data-bs-target="#toggle-product"
      onclick="ToggleProduct({{$id}})"
><i
        data-bs-toggle="tooltip"
        data-bs-placement="top"
        title="Activer/Déactiver"
        class="feather icon-toggle-right f-w-600 f-20 text-c-purple"></i>
</a>

<a href="javascript:;"  data-bs-placement="top" title="Images" data-bs-toggle="modal"
   data-bs-target="#images-product" onclick="ShowImages({{$id}})">
    <i class="feather icon-image f-w-600 f-20 -mt-1 text-c-green"></i>
</a>


<a href="{{route('admin.products.edit',$id)}}"  data-bs-placement="top" title="Modifier"><i
        class="feather icon-edit f-w-600 f-20 -mt-1 text-c-blue"></i>
</a>
<a  href="javascript:;" class="item-edit text-danger waves-effect" data-bs-placement="top" title="Archiver" data-bs-toggle="modal"
    data-bs-target="#delete-product" onclick="deleteProduct({{$id}})"><i
        class="fa fa-archive f-w-600 f-20 -mt-1 text-c-red"></i>
</a>
