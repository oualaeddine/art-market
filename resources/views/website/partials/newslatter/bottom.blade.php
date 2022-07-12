<section>
    <div class="newsletter">
      <div class="container">
        <div class="newsletter-inner center-sm">
          <div class="row justify-content-center align-items-center">
            <div class=" col-xl-10 col-md-12">
              <div class="newsletter-bg">
                <div class="row  align-items-center">
                  <div class="col-xl-6 col-lg-6">
                    <div class="d-lg-flex align-items-center">
                      <div class="newsletter-icon">
                          <img alt="image-name" src="/website/assets/images/icons8-customer-service-66.png">
                      </div>
                      <div class="newsletter-title">
                        <h2 class="main_title">{{__('Laissez-nous vous aider')}}</h2>
                        <div class="sub-title">{{__('Entrez votre numéro de téléphone et nous vous appellerons pour vous aider.')}}</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6">
                      <form action="{{ route('help-phone') }}" method="POST" name="contactform">
                          @csrf

                      <div class="newsletter-box">
                        <input  type="tel" name="phone" class="phone-input border" placeholder="{{__("Numéro de téléphone")}}">
                        <button type="submit" title="Envoyer" class="btn btn-danger btn-phone-send">{{__('Envoyer')}}</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
