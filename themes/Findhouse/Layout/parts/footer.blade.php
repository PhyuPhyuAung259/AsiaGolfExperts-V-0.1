
<!-- Our Footer --><section class="footer_one">
    <div class="container">
        <div class="row">
            @if($list_widget_footers = setting_item_with_lang("list_widget_footer"))
                <?php $list_widget_footers = json_decode($list_widget_footers); ?>
                @foreach($list_widget_footers as $key=>$item)
                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                        <div class="footer_about_widget">
                            <h4>{{$item->title}}</h4>
                            {!! $item->content  !!}
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

<!-- Our Footer Bottom Area -->
<section class="footer_middle_area pt40 pb40">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-xl-6">
                <div class="footer_menu_widget">
                    <ul>
                        <?php generate_menu('footer') ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-xl-6">
                <div class="copyright-widget text-right">
                    <p>
                        {!! setting_item_with_lang("footer_text_left") ?? ''  !!}
                        <div class="f-visa">
                            {!! setting_item_with_lang("footer_text_right") ?? ''  !!}
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<a class="scrollToHome" href="#"><i class="flaticon-arrows"></i></a>

@if(Auth::id())
    @include('Media::browser')
@endif

<script type="text/javascript" src="{{asset('themes/findhouse/libs/jquery-3.5.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/findhouse/libs/jquery-ui.min.js')}}"></script>
<script src="{{ asset('themes/findhouse/libs/vue/vue.js') }}"></script>
<script type="text/javascript" src="{{asset('themes/findhouse/js/jquery-migrate-3.0.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/findhouse/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/findhouse/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/findhouse/js/jquery.mmenu.all.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/findhouse/js/ace-responsive-menu.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/findhouse/js/bootstrap-select.min.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/findhouse/js/isotop.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/findhouse/js/snackbar.min.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/findhouse/js/simplebar.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/findhouse/js/parallax.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/findhouse/js/scrollto.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/findhouse/js/jquery-scrolltofixed-min.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/findhouse/js/jquery.counterup.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/findhouse/js/wow.min.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/findhouse/js/slider.js')}}"></script>
<script type="text/javascript" src="{{asset('themes/findhouse/js/timepicker.js')}}"></script>
{!! App\Helpers\MapEngine::scripts() !!}

<!-- Custom script for all pages -->
<script type="text/javascript" src="{{asset('themes/findhouse/js/script.js')}}"></script>
@if(Auth::id())
    <script src="{{ asset('module/media/js/browser.js?_ver='.config('app.asset_version')) }}"></script>
@endif
@if(setting_item('cookie_agreement_enable')==1 and request()->cookie('booking_cookie_agreement_enable') !=1 and !is_api()  and !isset($_COOKIE['booking_cookie_agreement_enable']))
    <div class="booking_cookie_agreement p-3 d-flex fixed-bottom">
        <div class="content-cookie">{!! clean(setting_item_with_lang('cookie_agreement_content')) !!}</div>
        <button class="btn save-cookie">{!! clean(setting_item_with_lang('cookie_agreement_button_text')) !!}</button>
    </div>
    <script>
        var save_cookie_url = '{{route('core.cookie.check')}}';
    </script>
    <script src="{{ asset('themes/findhouse/js/cookie.js?_ver='.config('app.version')) }}"></script>
@endif

{{-- home.js --}}
<script src="{{ asset('themes/findhouse/js/functions.js') }}"></script>
<script src="{{ asset('themes/findhouse/js/home.js') }}"></script>

@include('Layout::parts.login-register-modal')

{!! \App\Helpers\Assets::js(true) !!}
@php \App\Helpers\ReCaptchaEngine::scripts() @endphp
@stack('js')
