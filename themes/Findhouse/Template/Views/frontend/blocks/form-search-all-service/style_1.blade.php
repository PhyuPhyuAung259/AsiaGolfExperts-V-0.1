<section class="home-one home1-overlay home1_bgi1" style="background-image: url('{{$bg_image_url}}');">
    <div class="container">
        <div class="row posr">
            <div class="col-lg-12">
                <div class="home_content">
                    <div class="home-text text-center">
                        @if(!empty($title))
                            <h2 class="fz55">{{$title}}</h2>
                        @endif
                        @if(!empty($sub_title))
                            <p class="fz18 color-white">{{$sub_title}}</p>
                        @endif
                    </div>
                    @include("Template::frontend.blocks.form-search-all-service.form-search")
                </div>
            </div>
        </div>
    </div>
</section>
