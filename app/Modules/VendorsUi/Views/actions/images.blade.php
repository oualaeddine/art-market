{{-- return '<a href="'.asset($product->image).'" target="_blank">  <img src="'.asset($product->image).'" alt="" class="img img-fluid image-hold" height="100"  width="100"  /></a>'; --}}

<a href="javascript:;" class="item-edit btn btn-info waves-effect" data-bs-placement="top" title="supprimer" data-bs-toggle="modal"
data-bs-target="#images-product" onclick="ShowImages({{$id}})">
Afficher
</a>