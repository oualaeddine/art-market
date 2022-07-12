


<a    href="javascript:void(0)"
      data-bs-toggle="modal"
      data-bs-target="#toggle-product"
      onclick="ToggleProduct({{$id}})"
><i
        data-bs-toggle="tooltip"
        data-bs-placement="top"
        title="Activer/Déactiver"
        class="feather icon-toggle-right f-w-600 f-20 text-c-green"></i>
</a>



<a href="javascript:;"  data-bs-placement="top" title="Images" data-bs-toggle="modal"
   data-bs-target="#images-product-vendor" onclick="ShowImagesVendor({{$id}})">
    <i class="fa fa-images f-w-600 f-20  "></i>
</a>

<br>
<a href="{{route('vendor.products.edit',$id)}}"  data-bs-placement="top" title="Modifier"><i
        class="feather icon-edit f-w-600 f-20 -mt-1 text-c-blue"></i>
</a>
<a  href="javascript:;"  data-bs-placement="top" title="Supprimer" data-bs-toggle="modal"
    data-bs-target="#delete-product-vendor" onclick="deleteProductVendor({{$id}})"><i
        class="fa fa-trash f-w-600 f-20 -mt-1 text-c-red"></i>
</a>


