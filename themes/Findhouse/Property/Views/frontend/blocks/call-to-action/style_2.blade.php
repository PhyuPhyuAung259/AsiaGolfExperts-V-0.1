

<section id="property-search" class="property-search bg-img4" style="background-image: url({{$bg_image_url}}); ">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto ">
                <div class="{{ $org_style == 'style_2' ? 'search_smart_property text-center' : 'modern_apertment mt30' }} " style="{{ $org_style == 'style_3' ? 'background-color:'.$bg_color : '' }}">
                    <h2 class="title">{{ clean($title) }}</h2>
                    <h4 class="subtitle">{{ clean($sub_title)}}</h4>
                    @if(isset($desc) && $desc!='')
                        <p>{{ clean($desc) }}</p>
                    @endif
                    @if($link_title)
                    <a class="{{ $org_style == 'style_2' ? 'btn ssp_btn' : 'btn booking_btn btn-thm' }} " href="{{$link_more}}">{{ clean($link_title)  }}</a>
                        @endif
                </div>
            </div>
        </div>
    </div>
</section>
