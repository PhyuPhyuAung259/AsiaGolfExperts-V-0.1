<section id="feature-property" class="feature-property mt80 pb50">
    @if(empty($hide_scroll_down))
    <div class="mouse_scroll">
        <a href="#feature-property">
            <div class="icon">
                <h4>{{__('Scroll Down')}}</h4>
                <p>{{__('to discover more')}}</p>
            </div>
            <div class="thumb">
                <img src="{{asset('themes/findhouse/images/resource/mouse.png')}}" alt="mouse.png">
            </div>
        </a>
    </div>
    @endif
    <div class="container-fluid ovh">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title mb40">
                    @if($title)
                        <h2>{{$title}}</h2>
                    @endif
                        <p>
                    @if($desc)
                        {{$desc}}
                    @endif
                   <a class="float-right" href="{{route('property.search')}}">{{__('View All')}} <span class="flaticon-next"></span></a></p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="feature_property_home3_slider">
                    @foreach($rows as $row)
                        @include('Property::frontend.layouts.search.loop-gird-bg-image',
                        ['img_bg_class'=>'feature_property_bg_image_st2'])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
