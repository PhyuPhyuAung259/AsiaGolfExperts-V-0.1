<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{$html_class ?? ''}}">
<head>
    <meta charset="utf-8">
    {{-- <base href="{{asset('findhouse')}}/"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php($favicon = setting_item('site_favicon'))
    <link rel="icon" type="image/png" href="{{!empty($favicon)?get_file_url($favicon,'full'):url('images/favicon.png')}}" />
    @include('Layout::parts.seo-meta')
    <link href="{{ asset('libs/flags/css/flag-icon.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/icofont/icofont.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('themes/findhouse/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/findhouse/css/dashbord_navitaion.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/findhouse/css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/daterange/daterangepicker.css") }}" >
    <link rel="stylesheet" href="{{ asset('themes/findhouse/dist/frontend/module/user/css/user.css') }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel='stylesheet' id='google-font-css-css'  href='https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600' type='text/css' media='all' />
    @include('Layout::parts.global-script')
    <script>
        var image_editer = {
            language: '{{ app()->getLocale() }}',
            translations: {
                {{ app()->getLocale() }}: {
                    'header.image_editor_title': '{{ __('Image Editor') }}',
                    'header.toggle_fullscreen': '{{ __('Toggle fullscreen') }}',
                    'header.close': '{{ __('Close') }}',
                    'header.close_modal': '{{ __('Close window') }}',
                    'toolbar.download': '{{ __('Save Change') }}',
                    'toolbar.save': '{{ __('Save') }}',
                    'toolbar.apply': '{{ __('Apply') }}',
                    'toolbar.saveAsNewImage': '{{ __('Save As New Image') }}',
                    'toolbar.cancel': '{{ __('Cancel') }}',
                    'toolbar.go_back': '{{ __('Go Back') }}',
                    'toolbar.adjust': '{{ __('Adjust') }}',
                    'toolbar.effects': '{{ __('Effects') }}',
                    'toolbar.filters': '{{ __('Filters') }}',
                    'toolbar.orientation': '{{ __('Orientation') }}',
                    'toolbar.crop': '{{ __('Crop') }}',
                    'toolbar.resize': '{{ __('Resize') }}',
                    'toolbar.watermark': '{{ __('Watermark') }}',
                    'toolbar.focus_point': '{{ __('Focus point') }}',
                    'toolbar.shapes': '{{ __('Shapes') }}',
                    'toolbar.image': '{{ __('Image') }}',
                    'toolbar.text': '{{ __('Text') }}',
                    'adjust.brightness': '{{ __('Brightness') }}',
                    'adjust.contrast': '{{ __('Contrast') }}',
                    'adjust.exposure': '{{ __('Exposure') }}',
                    'adjust.saturation': '{{ __('Saturation') }}',
                    'orientation.rotate_l': '{{ __('Rotate Left') }}',
                    'orientation.rotate_r': '{{ __('Rotate Right') }}',
                    'orientation.flip_h': '{{ __('Flip Horizontally') }}',
                    'orientation.flip_v': '{{ __('Flip Vertically') }}',
                    'pre_resize.title': '{{ __('Would you like to reduce resolution before editing the image?') }}',
                    'pre_resize.keep_original_resolution': '{{ __('Keep original resolution') }}',
                    'pre_resize.resize_n_continue': '{{ __('Resize & Continue') }}',
                    'footer.reset': '{{ __('Reset') }}',
                    'footer.undo': '{{ __('Undo') }}',
                    'footer.redo': '{{ __('Redo') }}',
                    'spinner.label': '{{ __('Processing...') }}',
                    'warning.too_big_resolution': '{{ __('The resolution of the image is too big for the web. It can cause problems with Image Editor performance.') }}',
                    'common.x': '{{ __('x') }}',
                    'common.y': '{{ __('y') }}',
                    'common.width': '{{ __('width') }}',
                    'common.height': '{{ __('height') }}',
                    'common.custom': '{{ __('custom') }}',
                    'common.original': '{{ __('original') }}',
                    'common.square': '{{ __('square') }}',
                    'common.opacity': '{{ __('Opacity') }}',
                    'common.apply_watermark': '{{ __('Apply watermark') }}',
                    'common.url': '{{ __('URL') }}',
                    'common.upload': '{{ __('Upload') }}',
                    'common.gallery': '{{ __('Gallery') }}',
                    'common.text': '{{ __('Text') }}',
                }
            }
        };
    </script>
    <!-- Styles -->
    @stack('css')

    {{--Custom Style--}}
    <link href="{{ route('core.style.customCss') }}" rel="stylesheet">
    <link href="{{ asset('libs/carousel-2/owl.carousel.css') }}" rel="stylesheet">
    @if(setting_item_with_lang('enable_rtl'))
        <link href="{{ asset('themes/findhouse/dist/frontend/css/rtl.css') }}" rel="stylesheet">
    @endif
</head>
<body class="user-page bgc-f7 {{$body_class ?? ''}} @if(setting_item_with_lang('enable_rtl')) is-rtl @endif">
    {!! setting_item('body_scripts') !!}
    <div class="wrapper bravo_wrap">
        @include('Layout::parts.header')
        <div class="d-block d-sm-flex justify-content-start bravo_user_profile">
            <div class="dashboard_sidebar_menu dn-992">
                @include('User::frontend.layouts.sidebar')
            </div>
            <section class="our-dashbord dashbord bgc-f7">
                <div class="@if(empty($container)) container-fluid @else container @endif">
                    <div class="row">
                        <div class="col-sm-12 maxw100flex-992">
                            @include('Layout::parts.user.mobile-sidebar')
                            <div class="mb10">
                                @if(!empty($breadcrumbs))
                                <div class="breadcrumb_content style2">
                                    <h3>
                                        <a href="{{url('/')}}">{{__("Home")}}</a> &#187;
                                        @foreach($breadcrumbs as $key => $breadcrumb)
                                            @if(!empty($breadcrumb['url']))
                                                <a href="{{url($breadcrumb['url'])}}">{{$breadcrumb['name']}}</a>
                                            @else
                                                {{$breadcrumb['name']}}
                                            @endif
                                            @if(isset($breadcrumbs[$key + 1]))
                                                &#187;
                                            @endif
                                        @endforeach
                                    </h3>
                                </div>
                                @endif
                                @include('admin.message')
                            </div>
                            <div class="my-content">
                                @yield('content')
                            </div>
                            <div class="row mt10 d-none">
                                <div class="col-lg-12">
                                    <div class="copyright-widget text-center">
                                        <p>{{ __('© 2020 Find House. Made with love.') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>



    </div>
    @if(Auth::id())
        @include('Media::browser')
    @endif
    {!! setting_item('footer_scripts') !!}
    <script type="text/javascript" src="{{asset('themes/findhouse/libs/jquery-3.5.1.min.js')}}"></script>
    <script src="{{ asset('themes/findhouse/libs/vue/vue.js') }}"></script>
    <script type="text/javascript" src="{{asset('themes/findhouse/js/jquery-migrate-3.0.0.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('themes/findhouse/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/findhouse/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/findhouse/js/jquery.mmenu.all.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/findhouse/js/ace-responsive-menu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/findhouse/js/bootstrap-select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/findhouse/js/snackbar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/findhouse/js/simplebar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/findhouse/js/parallax.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/findhouse/js/scrollto.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/findhouse/js/jquery-scrolltofixed-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/findhouse/js/jquery.counterup.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/findhouse/js/wow.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/findhouse/js/progressbar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/findhouse/js/slider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/findhouse/js/timepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/findhouse/js/wow.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/findhouse/js/dashboard-script.js') }}"></script>
    <script type="text/javascript" src="{{ asset('libs/tinymce/js/tinymce/tinymce.min.js') }}" ></script>
    <!-- Custom script for all pages -->
    <script type="text/javascript" src="{{asset('themes/findhouse/js/script.js')}}"></script>
    @if(Auth::id())
        <script src="{{ asset('module/media/js/browser.js?_ver='.config('app.asset_version')) }}"></script>
    @endif
    <script src="{{ asset('js/functions.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/findhouse/module/user/js/user.js') }}"></script>

    <script src="{{ asset('libs/filerobot-image-editor/filerobot-image-editor.min.js?_ver='.config('app.asset_version')) }}"></script>@if(setting_item('user_enable_2fa'))
    @include('auth.confirm-password-modal')
        <script src="{{asset('/module/user/js/2fa.js')}}"></script>
    @endif
    @stack('js')
</body>
</html>
