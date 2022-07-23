<div class="col-md-9">

    <div class="page__header d-flex justify-content-between align-items-center">
        <h5 class="user__page__titles">{{__("Edit password")}}</h5>
    </div>


    <div class="row justify-content-start">


        <div class="col-md-8">
            @include('partials.error.error')
            <form action="{{route('client.update.password')}}" method="POST">
                @csrf
                @method('PUT')
                <div class="details__list mt-5">
                    <div class="details__item">
                        <div class="details__fieldset">

                            <div class="field field__style__one">
                                <div class="field__label">{{__("Current Password")}}</div>
                                <div class="field__wrap">
                                    <input class="field__input" type="password" name="current_password" value=""
                                           required="">
                                </div>
                            </div>

                            <div class="row justify-content-start mb-8">
                                <div class="col-md-6">
                                    <div class="field field__style__one">
                                        <div class="field__label">{{__("Password")}}</div>
                                        <div class="field__wrap">
                                            <input class="field__input" type="password" name="password">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="field field__style__one ">
                                        <div class="field__label">{{__("Password confirmation")}}</div>
                                        <div class="field__wrap">
                                            <input class="field__input" type="password" name="password_confirmation">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="details__btns">
                    <button class="button details__button btn-phone-send">{{__("Edit password")}}</button>
                </div>
            </form>
        </div>


    </div>
</div>


