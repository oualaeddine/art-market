<div {{-- id="onload-popup"  --}}class="modal fade subscribe-popup" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="newsletter-popup">
            <div class="nl-popup-main">
              <div class="nl-popup-inner">
                <div class="newsletter-inner">
                  <div class="row no-gutters">
                    <div class="col-md-5 d-none d-md-block">
                      <div class="newslatter-popup-img h-100">
                        <img src="/Help.jpg" alt="Medizee">
                      </div>
                    </div>
                    <div class="col-md-7 col-12">
                      <div class="d-flex align-items-center h-100">
                        <div class="newslatter-popup-detail text-center w-100">
                          <h2 class="main_title">{{__('Laissez-nous vous aider')}}</h2>
                         {{--  <div class="newsletter-subtitle">Enter your phone number and we will call you for help </div> --}}
                          <p class="text-muted">{{__('Entrez votre numéro de téléphone et nous vous appellerons pour vous aider.')}}</p>
                          <form class="main-form">
                            <input type="tel" class="input_num_modal" name="phone" placeholder="{{__('Numéro de téléphone')}}">
                            {{-- <button class="btn btn-color" title="Subscribe">Save</button> --}}
                          </form>
                          <div class="check-box mt-20">
                            <span>
                              <input id="no_show" type="checkbox" name="remember_me" class="checkbox">
                              <label class="text-muted" for="no_show">{{__('Ne plus afficher ce popup !')}}</label>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
