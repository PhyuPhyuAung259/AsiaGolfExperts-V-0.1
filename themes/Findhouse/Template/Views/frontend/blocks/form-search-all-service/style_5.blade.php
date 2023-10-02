
<section class="home-six home6-overlay" style="background-image: url('{{$bg_image_url}}');">
    <div class="container">
        <div class="row posr">
            <div class="col-lg-12">
                <div class="home_content home6">
                    <div class="home-text home6 text-center">
                        @if(!empty($title))
                        <h2 class="fz55">{{$title}}</h2>
                        @endif
                            @if(!empty($sub_title))
                            <p class="fz18">{{$sub_title}}</p>
                            @endif
                    </div>
                    @include("Template::frontend.blocks.form-search-all-service.form-search",['class_form'=>"home6"])
                </div>
            </div>
        </div>
    </div>
</section>
