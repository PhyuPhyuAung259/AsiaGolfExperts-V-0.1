<!-- 4th Home Slider -->
<div class="home-four">
    @if(!empty($list_slider))
        <div class="container-fluid p0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-banner-wrapper">
                        <div class="banner-style-one owl-theme owl-carousel">
                            @foreach($list_slider as $item)
                                @php $img = get_file_url($item['bg_image'],'full') @endphp
                                <div class="slide slide-one" style="background-image: url({{$img}});height: 800px;"></div>
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
    <div class="container home_iconbox_container">
        <div class="row posr">
            <div class="col-lg-12">
                <div class="home_content home4">
                    <div class="home-text text-center">
                        <h2 class="fz55">{{$title}}</h2>
                        <p class="fz18 color-white">{{$sub_title}}</p>
                    </div>
                    @include("Template::frontend.blocks.form-search-all-service.form-search",['class_form'=>"home4"])
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h4 class="text-center color-white fw600 mb25 mb0-520">What are you looking for?</h4>
                <ul class="home4_iconbox mb0">
                    <li class="list-inline-item"><div class="icon"><span class="flaticon-house"></span><p>Modern Villa</p></div></li>
                    <li class="list-inline-item"><div class="icon"><span class="flaticon-house-1"></span><p>Family House</p></div></li>
                    <li class="list-inline-item"><div class="icon"><span class="flaticon-house-2"></span><p>Town House</p></div></li>
                    <li class="list-inline-item"><div class="icon"><span class="flaticon-building"></span><p>Apartment</p></div></li>
                </ul>
            </div>
        </div>
    </div>
</div>