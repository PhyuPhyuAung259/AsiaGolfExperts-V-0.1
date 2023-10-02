<form action="{{ route('login') }}" class="bravo-form-login" method="POST">
    <input type="hidden" name="redirect" value="{{request()->query('redirect')}}">
    @csrf
    <div class="heading">
        <h4>{{ __('Login') }}</h4>
    </div>
    @if(setting_item('facebook_enable') or setting_item('google_enable') or setting_item('twitter_enable'))
        <div class="row mt25">
            @if(setting_item('facebook_enable'))
                <div class="col-lg-12">
                    <a href="{{url('/social-login/facebook')}}" data-channel="facebook">
                        <button type="button" class="btn btn-fb btn-block"><i class="fa fa-facebook float-left mt5"></i> {{ __('Login with Facebook') }}</button>
                    </a>

                </div>
            @endif
            @if(setting_item('google_enable'))
                <div class="col-lg-12">
                    <a href="{{url('social-login/google')}}" data-channel="google">
                        <button type="button" class="btn btn-googl btn-block"><i class="fa fa-google float-left mt5"></i> {{ __('Login with Google') }}</button>
                    </a>
                </div>
            @endif
            @if(setting_item('twitter_enable'))
                <div class="col-lg-12">
                    <a href="{{url('social-login/twitter')}}" data-channel="twitter">
                        <button type="button" class="btn btn-tw btn-block"><i class="fa fa-twitter float-left mt5"></i> {{ __('Login with Twitter') }}</button>
                    </a>
                </div>
            @endif
        </div>
        <hr>
    @endif
    <div class="input-group mb-2 mr-sm-2">
        <input type="text" class="form-control" id="inlineFormInputGroupUsername2" name="email" autocomplete="off" placeholder="{{ __('Email') }}">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="flaticon-user"></i></div>
        </div>
        <span class="invalid-feedback error error-email"></span>
    </div>
    <div class="input-group form-group">
        <input type="password" class="form-control" id="exampleInputPassword1" name="password" autocomplete="off"  placeholder="{{__('Password')}}">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="flaticon-password"></i></div>
        </div>
        <span class="invalid-feedback error error-password"></span>
    </div>
    <div class="form-group">
        <label class="custom-control custom-checkbox">
            <input type="checkbox" name="remember" class="custom-control-input" id="remember-me" value="1">
            <span class="custom-control-label" for="exampleCheck1">{{ __('Remember me') }}</span>
        </label>

        <a class="btn-fpswd float-right" href="{{ route("password.request") }}">{{ __('Lost your password?') }}</a>
    </div>
    @if(setting_item("user_enable_login_recaptcha"))
        <div class="form-group">
            {{recaptcha_field($captcha_action ?? 'login')}}
        </div>
    @endif
    <div class="error message-error invalid-feedback"></div>
    <button type="submit" class="btn btn-log btn-block btn-thm">{{ __('Log In') }}</button>
    @if(is_enable_registration())
        <p class="text-center">{{ __('Do not have an account?') }} <a class="text-thm" href="javascript:void(0)" data-target="#register" data-toggle="modal">{{ __('Register') }}</a></p>
    @endif
</form>
