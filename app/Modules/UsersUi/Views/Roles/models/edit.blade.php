<div class="modal fade" id="modals-edit-role" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="add-new-record modal-content pt-0" id="form-edit-role" action=""
                  method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')


                <div class="modal-header">
                    <h4 class="modal-title">Modifier un rôle</h4>
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
                                                id="name_edit"
                                                name="name"
                                                placeholder="supervisor"
                                                aria-label="supervisor"
                                                required
                                            />
                                        </div>


                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <h5>Permissions <b class="text-danger">*</b> :</h5>

                                    <select required style="width: 100%!important;" class="js-example-basic-single_perms col-sm-12 select2-hidden-accessible form-control" id="permission_edit" name="permissions[]" multiple="multiple">

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
                    <button type="button" class="btn btn-default waves-effect" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light ">Sauvegarder les
                        modifications
                    </button>
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
