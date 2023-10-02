<!-- Inner Page Breadcrumb -->
@php
    $bg = get_file_url(setting_item("page_contact_image"),"full");
    $style = '';
    if($bg){
        $style = 'background-image: url('.$bg.')';
    }
@endphp

<section class="inner_page_breadcrumb" style="{{$style}}">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                @if(!empty($breadcrumbs))
                    <div class="breadcrumb_content">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url("/") }}">{{ __('Home')}}</a></li>
                            @foreach($breadcrumbs as $breadcrumb)
                                <li class="breadcrumb-item text-thm {{$breadcrumb['class'] ?? ''}}" aria-current="page">
                                    @if(!empty($breadcrumb['url']))
                                        <a href="{{url($breadcrumb['url'])}}">{{ $breadcrumb['name'] }}</a>
                                    @else
                                        {{$breadcrumb['name']}}
                                    @endif
                                </li>
                            @endforeach
                        </ol>
                        <h2 class="breadcrumb_title">{{__('Contact')}}</h2>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Our Contact -->
<section class="our-contact pb0 bgc-f7">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-xl-8">
                <div class="form_grid">
                    <h4 class="mb5">{{ setting_item_with_lang("page_contact_title") }}</h4>
                    <p>{{ setting_item_with_lang("page_contact_sub_title") }}</p>
                    <form method="post" action="{{ route("contact.store") }}"  class="contact_form bravo-contact-block-form" id="contact_form" name="contact_form" novalidate="novalidate">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="form_name" name="name" class="form-control" required="required" type="text" placeholder="{{ __('Name') }} ">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="form_email" name="email" class="form-control required email" required="required" type="email" placeholder="{{ __('Email') }} ">
                                </div>
                            </div>
                            <div class="form-group">
                                {{recaptcha_field('contact')}}
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea id="form_message" name="message" class="form-control required" rows="8" required="required" placeholder="{{ __('Your Message') }}"></textarea>
                                </div>
                                <div class="form-group mb0">
                                    <button class="btn btn-lg btn-thm" type="submit">{{ __('Send Message') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="contact_localtion">
                    <div class="sub">
                        <p>{!! setting_item_with_lang("page_contact_desc") !!}</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p0 mt50">
        <div class="row">
            <div class="col-lg-12">
                {!! ( setting_item("page_contact_iframe_google_map")) !!}
            </div>
        </div>
    </div>
</section>

<!-- Start Partners -->
<section class="start-partners bgc-thm pt50 pb50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="start_partner tac-smd">
                    <h2>{{ __('Become a Real Estate Agent') }}</h2>
                    <p>{{ __('We only work with the best companies around the globe') }}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="parner_reg_btn text-right tac-smd">
                    <a class="btn btn-thm2" href="{{ route("auth.register") }}">{{ __('Register Now') }}</a>
                </div>
            </div>
        </div>
    </div>
</section>
