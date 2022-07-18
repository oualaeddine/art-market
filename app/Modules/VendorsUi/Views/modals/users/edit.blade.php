<div class="modal fade" id="modals-edit-vendor-user" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="add-new-record modal-content pt-0" id="form-edit-vendor-user" action=""
                  method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title">Modifier un utilisateur</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-4">
                                <label class="mb-1">Email</label>
                                <input
                                    type="email"

                                    class="form-control mt-1"
                                    id="email_user_edit"
                                    name="email"
                                    aria-label=""
                                    required
                                />
                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label class=" mb-1">Télephone</label>
                                <input
                                    type="tel"
                                    onkeypress="return onlyNumberKey(event)"
                                    class="form-control mt-1 phone-input"
                                    id="phone_user_edit"
                                    name="phone"
                                    placeholder=""
                                    aria-label=""
                                    required
                                />
                            </div>

                            <div class="form-group col-sm-12 col-md-4">
                                <label class=" mb-1">État</label>
                                <select required name="is_active" class="form-control" id="is_active_user_edit">
                                    <option value="1">Actif</option>
                                    <option value="0">Non actif</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label class=" mb-1">Nouveau mot de passe</label>
                                <input
                                    type="password"
                                    class="form-control mt-1"
                                    name="password"
                                    placeholder=""
                                    aria-label=""
                                />
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label class=" mb-1">Confirmation de nouveau mot de passe</label>
                                <input
                                    type="password"
                                    class="form-control mt-1"
                                    name="password_confirmation"
                                    placeholder=""
                                    aria-label=""
                                />
                            </div>

                            <div class="form-group col-sm-12">
                                <label for="category">Rôles</label>

                                <select required style="width: 100%!important;"
                                        class="js-example-basic-single col-sm-12 select2-hidden-accessible"
                                        name="roles[]" multiple="multiple"
                                        id="vendor_user_roles_edit"
                                >

                                    @foreach($roles as  $role)
                                        <option value="{{$role->id}}">{{$role->ref}}</option>
                                    @endforeach

                                </select>
                            </div>


                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light btn-phone-send">Modifier</button>
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


