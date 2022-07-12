<div class="modal fade" id="modals-delete-address-{{$item->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form  action="{{route('client.delete.address',['client_address'=>$item->id])}}" method="POST">
                @csrf
                @method('delete')

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>

                <div class="modal-header">
                    @if(app()->getLocale()=='ar')
                        <h4 class="modal-title">احذف العنوان</h4>

                    @else
                        <h4 class="modal-title">Supprimer une adresse</h4>

                    @endif

                </div>
                @if(app()->getLocale()=='ar')
                    هل أنت متأكد أنك تريد حذف هذا العنوان؟
                @else
                <p>êtes-vous sûr de supprimer cette adress ?</p>
                @endif
            </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal"
                            aria-label="Close" class="btn btn-google-plus " data-bs-dismiss="modal">{{app()->getLocale()=='ar'?'اغلاق ':'Fermer'}}</button>
                    <button type="submit" class="btn btn-color ">{{app()->getLocale()=='ar'?'حذف ':'Supprimer'}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
