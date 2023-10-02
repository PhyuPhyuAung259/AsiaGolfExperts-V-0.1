<form action="#" class="form bravo-form-register" method="post">
    @csrf
    @if(setting_item('facebook_enable') or setting_item('google_enable') or setting_item('twitter_enable'))
        <div class="row">
            @if(setting_item('facebook_enable'))
                <div class="col-lg-12">
                    <a href="{{url('/social-login/facebook')}}" class="btn_login_fb_link" data-channel="facebook">
                        <button type="button" class="btn btn-block btn-fb"><i class="fa fa-facebook float-left mt5"></i> {{ __('Login with Facebook') }}</button>
                    </a>
                </div>
            @endif
            @if(setting_item('google_enable'))
                <div class="col-lg-12">
                    <a href="{{url('social-login/google')}}">
                        <button type="button" class="btn btn-block btn-googl"><i class="fa fa-google float-left mt5"></i> {{ __('Login with Google') }}</button>
                    </a>
                </div>
            @endif

            @if(setting_item('twitter_enable'))
                <div class="col-lg-12">
                    <a href="{{url('social-login/twitter')}}">
                        <button type="button" class="btn btn-block btn-tw"><i class="fa fa-twitter float-left mt5"></i> {{ __('Login with Twitter') }}</button>
                    </a>
                </div>
            @endif
        </div>
        <hr>
    @endif
    <div class="form-group input-group">
        <input type="text" class="form-control"  name="first_name" autocomplete="off" placeholder="{{__("First Name")}}">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="flaticon-user"></i></div>
        </div>
        <span class="invalid-feedback error error-first_name"></span>
    </div>
    <div class="form-group input-group">
        <input type="text" class="form-control"  name="last_name" autocomplete="off" placeholder="{{__("Last Name")}}">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="flaticon-user"></i></div>
        </div>
        <span class="invalid-feedback error error-last_name"></span>
    </div>
    <div class="form-group input-group">
        <input type="email" class="form-control"  name="email" autocomplete="off" placeholder="{{__('Email address')}}">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-envelope-o"></i></div>
        </div>
        <span class="invalid-feedback error error-email"></span>
    </div>
    <div class="form-group input-group">
        <input type="text" class="form-control" name="phone" autocomplete="off" placeholder="{{__('Phone')}}">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-phone"></i></div>
        </div>
        <span class="invalid-feedback error error-phone"></span>
    </div>
    <div class="form-group input-group">
        <input type="password" class="form-control" id="exampleInputPassword2" name="password" autocomplete="off" placeholder="{{__('Password')}}">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="flaticon-password"></i></div>
        </div>
        <span class="invalid-feedback error error-password"></span>
    </div>

    <div class="form-group custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" name="term" id="exampleCheck2">
        <label class="custom-control-label" for="exampleCheck2">{{ __('I have read and accept the Terms and Privacy Policy?') }}</label>
        <span class="invalid-feedback error error-term"></span>
    </div>

    @if(setting_item("user_enable_register_recaptcha"))
        <div class="form-group">
            {{recaptcha_field($captcha_action ?? 'register')}}
        </div>
        <div><span class="invalid-feedback error error-g-recaptcha-response"></span></div>
    @endif
    <div class="error message-error invalid-feedback"></div>
    <button type="submit" class="btn btn-log btn-block btn-thm">{{ __('Sign Up') }}</button>
    <p class="text-center">{{ __('Already have an account? ') }}<a class="text-thm" href="javascript:void(0)" data-target="#login" data-toggle="modal">{{ __('Log In') }}</a></p>
</form>
