
       <div class="modal fade" id="modals-edit-profile" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                   @php
                   $user=\Illuminate\Support\Facades\Auth::user();
                   @endphp
                <form class="add-new-record modal-content pt-0" action="{{route('admin.profile.edit')}}"
                 method="POST" id="product-form">
                 @csrf
                    @method("PUT")
                   <div class="modal-header">
                       <h4 class="modal-title">Gestion de profil</h4>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                       <div class="card">
                           <div class="card-header">
                               <h5>Informations personnelles</h5>
                           </div>

                           <div class="card-body">
                               <div class="form-group">
                                   <label class="form-label" for="name">Nom</label>
                                   <input
                                       type="text"
                                       class="form-control "
                                       readonly
                                       value="{{$user->name}}"

                                   />
                               </div>

                               <div class="form-group">
                                   <label class="form-label" for="name_fr">Email</label>
                                   <input
                                       type="text"
                                       class="form-control "
                                       readonly
                                       value="{{$user->email}}"

                                   />
                               </div>
                           </div>


                       </div>
                   </div>


                       <div class="card">
                           <div class="card-header">
                               <h5>Mot de passe</h5>
                           </div>
                           <div class="card-body">
                               <div class="row justify-content-center">
                                   <div class="col-sm-12 col-xl-4 m-b-30">
                                       <h4 class="sub-title">ancien mot de passe</h4>
                                       <input type="password" name="current_password" class="form-control" placeholder="ancien mot de passe">
                                   </div>

                                   <div class="col-sm-12 col-xl-4 m-b-30">
                                       <h4 class="sub-title">nouveau mot de passe</h4>
                                       <input type="password"  name="new_password" class="form-control" placeholder="nouveau mot de passe">
                                   </div>
                                   <div class="col-sm-12 col-xl-4 m-b-30">
                                       <h4 class="sub-title">confirmation de mot de passe</h4>
                                       <input type="password" name="new_confirm_password" class="form-control" placeholder="confirmation de mot de passe">
                                   </div>
                               </div>

                           </div>
                       </div>

                   <div class="modal-footer">
                       <button type="button" class="btn btn-default waves-effect " data-bs-dismiss="modal">Fermer</button>
                       <button type="submit" class="btn btn-primary waves-effect waves-light ">modifier</button>
                   </div>
                </form>
               </div>
           </div>
       </div>
