<div class="header_top home6 dn-992">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            @include("Template::frontend.blocks.form-search-all-service.form-search-no-tab",['class_form'=>"home10"])
            </div>
        </div>
    </div>
</div>
<div class="home10-mainslider">
    @if(!empty($list_slider))
        <div class="container-fluid p-lg-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-banner-wrapper">
                        <div class="banner-style-one owl-theme owl-carousel">
                            @foreach($list_slider as $item)
                                @php
                                    $img = get_file_url($item['bg_image'],'full');
                                @endphp
                                <div class="slide slide-one" @if(!empty($img)) style="background-image: url({{$img}});height: 620px;" @endif>
                                    <div class="container">
                                        @if(!empty($property = $item['row']))
                                            <?php
                                            $translation = $property->translate();
                                            $detailUrl = $property->getDetailUrl();
                                            ;?>
                                            <div class="row home-content">
                                                <div class="col-lg-12 text-center p0">
                                                    <h2 class="banner_top_title">{{$property->prefix_price}} {{ $property->display_price }}</h2>
                                                    <a @if(!empty($blank)) target="_blank" @endif href="{{$detailUrl}}">
                                                        <h3 class="banner-title">{{$translation->title}}</h3>
                                                    </a>
                                                    <p>{{__('Beds:')}} {{$property->bed}} {{__(', Baths:')}} {{$property->bathroom}} {{__(', Sq:')}} {!! size_unit_format($property->square) !!}</p>
                                                    <div class="btn"><a href="{{$detailUrl}}" class="banner-btn">{{__('Learn More')}}</a></div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="carousel-btn-block banner-carousel-btn">
                            <span class="carousel-btn left-btn"><i class="flaticon-left-arrow-1 left"></i></span>
                            <span class="carousel-btn right-btn"><i class="flaticon-right-arrow right"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
