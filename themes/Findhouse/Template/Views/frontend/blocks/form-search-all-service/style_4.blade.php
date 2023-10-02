<section class="home-three bg-img3" style="background-image: url('{{$bg_image_url}}');">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="home3_home_content">
                    @if(!empty($title))
                        <h1>{{$title}}</h1>
                    @endif
                    @if(!empty($sub_title))
                        <h4>{{$sub_title}}</h4>
                    @endif

                </div>
            </div>
            <div class="col-lg-4">
                <div class="home3_home_content">
                    @if(!empty($video_url))
                    <a class="popup_video_btn popup-iframe popup-youtube" href="{{$video_url}}"><i class="flaticon-play"></i></a>
                        @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @include("Template::frontend.blocks.form-search-all-service.form-search",['class_form'=>"home3"])

            </div>
        </div>
    </div>
</section>

