<div class="modal fade" id="modals-add-role" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="add-new-record modal-content pt-0" action="{{route('admin.roles.store')}}"
                  method="POST" id="product-form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter un rôle</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="card">

                        <div class="card-header">

                            <div class="row">
                                <h5>Nom de rôle <b class="text-danger">*</b> :</h5>
                                <div class="card-block mt-1">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <input
                                                type="text"
                                                class="form-control "
                                                id="name"
                                                name="name"


                                                required
                                            />
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <h5>Permissions <b class="text-danger">*</b> :</h5>
                                    <a  href="javascript:void(0)"  onclick="selectAll()"  class="float-end"><strong>selectionner tous </strong> </a>
                                    <select required style="width: 100%!important;" class="js-example-basic-single_perms col-sm-12 select2-hidden-accessible form-control" id="permission" name="permissions[]" multiple="multiple">

                                        @foreach($permissions as $permission)
                                            <option value="{{$permission->id}}">{{$permission->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light ">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .card .card-header h5:after {

        display: none !important;

    }
</style>
<style>
    b, strong {
        font-weight: 700;
    }

    .card .card-header h5:after {

        display: none !important;

    }
</style>
<style>

    .select2-selection__choice {
        background-color: #5897fb !important;
        border: none !important;
    }

    .select2-selection__choice__remove {
        color: white !important;
    }

    .select2-selection__choice__remove:hover {
        background: darkblue !important;
    }

    /*   .select2-container--default .select2-results__option--highlighted[aria-selected] {
      background-color: #5897fb !important;
      color: black;
      } */


    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        display: inline-flex;
        align-items: center;
    }

</style>

<script>
    function selectAll(){
        $('.js-example-basic-single_perms option').prop('selected', true);

        $('.js-example-basic-single_perms').trigger('change');

    }
</script>
@push('js')

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single_perms').select2({
                placeholder: "Sélectionnez les permissions",
                allowClear: true
            });
        });
    </script>
@endpush
