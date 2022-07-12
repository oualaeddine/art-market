<div class="modal fade" id="modals-edit-user" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="add-new-record modal-content pt-0" id="form-edit-user" action=""
                  method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')


                <div class="modal-header">
                    <h4 class="modal-title">Modifier un utilisateur</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="card">

                        <div class="card-header">

                            <div class="row">
                                <h5>Informations personnelles :</h5>
                                <div class="card-block mt-1">
                                    <div class="row">

                                        <div class="form-group col-sm-12 col-md-6">
                                            <label class="form-label" for="name_fr">Email</label>
                                            <input
                                                type="email"
                                                class="form-control "
                                                id="email_edit"
                                                name="email"
                                                placeholder="example@gmail.com"
                                                aria-label="example@gmail.com"
                                                required
                                            />
                                        </div>

                                        <div class="form-group col-sm-12 col-md-6">
                                            <label class="form-label" for="name_fr">Nom</label>
                                            <input
                                                type="text"
                                                class="form-control "
                                                id="name_edit"
                                                name="name"
                                                placeholder="isslem"
                                                aria-label="isslem"
                                                required
                                            />
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <h5>Mot de passe :</h5>
                                <div class="card-block mt-1">
                                    <div class="row">

                                        <div class="form-group col-sm-12 col-md-6">
                                            <label class="form-label" for="name_fr">Mot de passe</label>
                                            <input
                                                type="password"
                                                class="form-control "
                                                id="password"
                                                name="password"
                                                placeholder="******"
                                                aria-label="******"

                                            />
                                        </div>

                                        <div class="form-group col-sm-12 col-md-6">
                                            <label class="form-label" for="name_fr">Confirmation de mot de passe</label>
                                            <input
                                                type="password"
                                                class="form-control "
                                                id="password_confirmation"
                                                name="password_confirmation"
                                                placeholder="******"
                                                aria-label="******"
                                            />
                                        </div>

                                    </div>

                                </div>


                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="form-group">
                            <label for="role">Role</label>

                            <select style="width: 100%!important;"
                                    required
                                    class="roles_select_edit col-sm-12 select2-hidden-accessible" id="role"
                                    name="roles[]" multiple="multiple">

                                @foreach($roles as  $roles)
                                    <option value="{{$roles->id}}">{{$roles->name}}</option>
                                @endforeach

                            </select>
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
