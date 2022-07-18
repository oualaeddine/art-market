<div class="modal fade" id="modals-add-user" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="add-new-record modal-content pt-0" action="{{route('admin.users.store')}}"
                  method="POST" id="product-form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter un utilisateur</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                <div class="row">
                    <div class="card-block mt-1">
                        <div class="row">

                            <div class="form-group col-sm-12 col-md-6">
                                <label class="form-label" for="name_fr">Email</label> <b class="text-danger">*</b>
                                <input
                                    type="email"
                                    class="form-control "
                                    id="email"
                                    name="email"
                                    placeholder="example@gmail.com"
                                    aria-label="example@gmail.com"
                                    required
                                />
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label class="form-label" for="name_fr">Nom</label> <b class="text-danger">*</b>
                                <input
                                    type="text"
                                    class="form-control "
                                    id="name"
                                    name="name"
                                    placeholder="Nom"
                                    aria-label="Nom"
                                    required
                                />
                            </div>

                        </div>

                    </div>

                </div>

                <div class="row">
                    <div class="card-block mt-1">
                        <div class="row">

                            <div class="form-group col-sm-12 col-md-6">
                                <label class="form-label" for="name_fr">Mot de passe</label> <b class="text-danger">*</b>
                                <input
                                    type="password"
                                    class="form-control "
                                    id="password"
                                    name="password"
                                    placeholder="******"
                                    aria-label="******"
                                    required
                                />
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label class="form-label" for="name_fr">Confirmation de mot de passe</label> <b class="text-danger">*</b>
                                <input
                                    type="password"
                                    class="form-control "
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    placeholder="******"
                                    aria-label="******"
                                    required
                                />
                            </div>

                        </div>

                    </div>


                </div>



                    <div class="row">

                        <div class="form-group">
                            <label for="category">Rôle</label> <b class="text-danger">*</b>

                            <select required style="width: 100%!important;"
                                    class="js-example-basic-single col-sm-12 select2-hidden-accessible" id="category"
                                    name="roles[]" multiple="multiple">

                                @foreach($roles as  $roles)
                                    <option value="{{$roles->id}}">{{$roles->ref}}</option>
                                @endforeach

                            </select>
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
